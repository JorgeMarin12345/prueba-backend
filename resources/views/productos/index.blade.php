@extends('layouts.app')
@section('title', 'Accesorios')
@section('content')
    <div class="header">
        <h1>Accesorios</h1>
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-right">
                    <a class="btn btn-success" href="{{ route('productos.create') }}"> Nuevo accesorio</a>
                </div>
            </div>
        </div>
        <br>
        <table width="80%" class="table table-striped">
        <tr>
            <th>SKU</th>
            <th>Descripción</th>
            <th>País de origen</th>
            <th>Fabricante</th>
            <th>Categoría</th>
            <th></th><th></th>
        </tr>
        @foreach ($productos as $producto)
          <tr>
            <td>{{$producto->sku}}</td>
            <td>{{$producto->descripcion}}</td>

            <td>{{$producto->pais_origen}}</td>
            <td>{{$producto->fabricante}}</td>
            <td>{{$producto->categoria->nombre}}</td>
            <td><a class="btn btn-primary btn-sm" href="{{ route('productos.edit',$producto->id) }}">Editar</a></td>
            <td>
                <form action="{{ route('productos.destroy',$producto->id) }}" onsubmit="return confirm('¿Seguro que desea eliminar el accesorio?');" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-danger" type="submit" class="btn btn-danger">Eliminar</button>
                  </form>
            </td>
          </tr>
        @endforeach
        </table>
    </div>
@stop
