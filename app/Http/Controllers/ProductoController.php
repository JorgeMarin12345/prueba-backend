<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Categoria;
use App\Models\DocumentoProducto;
use App\Http\Requests\ProductoRequest;
use Illuminate\Support\Facades\Storage;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $productos = Producto::orderBy('id')->with('categoria')->get();
        return view('productos.index',["productos"=>$productos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        $categorias = Categoria::all();
        return view('productos.create',['categorias'=>$categorias]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\ProductoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductoRequest $request){
        $producto = new Producto;
        $producto->sku = $request->sku;
        $producto->descripcion = $request->descripcion;
        $producto->pais_origen = $request->pais_origen;
        $producto->fabricante = $request->fabricante;
        $producto->categoria_id = $request->categoria_id;
        $producto->save();
        //Guardar las imagenes/documentos que se suben
        $files = $request->file('documentos');
        $this->saveImages($producto->id,$files);
        return redirect()->route('productos.index')->with('success','Accesorio creado con éxito.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
        $producto = Producto::where('id',$id)->with('documentos')->first();
        $categorias = Categoria::all();
        return view('productos.edit',["producto"=>$producto,'categorias'=>$categorias]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\ProductoRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductoRequest $request, $id){
        $producto = Producto::find($id);
        $producto->sku = $request->sku;
        $producto->descripcion = $request->descripcion;
        $producto->pais_origen = $request->pais_origen;
        $producto->fabricante = $request->fabricante;
        $producto->categoria_id = $request->categoria_id;
        $producto->save();
        if(!is_null($request->file('documentos'))){
            foreach($producto->documentos as $documento){
                Storage::delete($documento->ruta);
            }
            $producto->documentos()->delete();
            $files = $request->file('documentos');
            $this->saveImages($producto->id,$files);
        }
        return redirect()->route('productos.index')->with('success','Accesorio actualizado con éxito.');
    }

    private function saveImages($producto_id, $files){
        foreach($files as $file){
          $documento = new DocumentoProducto;
          $documento->producto_id = $producto_id;
          $documento->imagen = false;
          if(substr($file->getMimeType(), 0, 5) == 'image') {
              $documento->imagen = true;
          }
          $document = $file->store('');
          $documento->ruta = $document;
          $documento->save();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        $producto = Producto::find($id);
        $producto->delete();
        return redirect()->route('productos.index')->with('success','Accesorio eliminado con éxito.');
    }

    public function apiproducto(){
        $productos = Producto::orderBy('id')->with('categoria')->get();
        return view('productos.grid',["productos"=>$productos]);
    }
}
