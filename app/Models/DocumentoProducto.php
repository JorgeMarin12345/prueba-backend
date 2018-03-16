<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DocumentoProducto extends Model
{
    protected $table = 'documentos_productos';
    protected $fillable = ['producto_id','imagen','ruta'];

    public function producto(){
        return $this->belongsTo('App\Models\Producto','producto_id');
    }
}
