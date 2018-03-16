@extends('layouts.app')
@section('title', 'Accesorios')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Accesorios') }}</div>
                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                @endif
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> Hay algunos problemas con los campos.<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="card-body">
                    <form action="{{ route('productos.store') }}" enctype="multipart/form-data" method="POST">
                        @csrf

                        <div class="form-group row">
                            <label for="sku" class="col-md-4 col-form-label text-md-right">SKU</label>
                            <div class="col-md-6">
                                <input type="number" class="form-control{{ $errors->has('sku') ? ' is-invalid' : '' }}" name="sku" value="{{ old('sku') }}" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="descripcion" class="col-md-4 col-form-label text-md-right">Descripción</label>
                            <div class="col-md-6">
                              <textarea style="width:100%;" name="descripcion" rows="4">{{ old('descripcion') }}</textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="pais_origen" class="col-md-4 col-form-label text-md-right">País de origen</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control{{ $errors->has('pais_origen') ? ' is-invalid' : '' }}" name="pais_origen" value="{{ old('pais_origen') }}" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="fabricante" class="col-md-4 col-form-label text-md-right">Fabricante</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control{{ $errors->has('fabricante') ? ' is-invalid' : '' }}" name="fabricante" value="{{ old('fabricante') }}" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="fabricante" class="col-md-4 col-form-label text-md-right">Categoría de accesorio</label>
                            <div class="col-md-6">
                                <select name="categoria_id">
                                    @foreach ($categorias as $categoria)
                                      <option value="{{$categoria->id}}">{{$categoria->nombre}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="documentos[]" class="col-md-4 col-form-label text-md-right">Imágenes/Documentos</label>
                            <div class="col-md-3">
                                <label for="documentos[]" class="btn btn-primary btn-block btn-outlined">Examinar</label>
                            </div>
                            <input type="file" onchange="muestraNombre(this)" name="documentos[]" id="documentos[]" style="display:none;" multiple>
                            <input class="col-md-3" disabled="true" type="text" id="name_document" style="display: none"/>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <a class="btn btn-outline-primary" href="{{ route('productos.index') }}">Regresar</a>
                                <button type="submit" class="btn btn-success">
                                    {{ __('Guardar') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
    <script>
      function muestraNombre(input_file,element){
        files = input_file.files;
        nombre = "";
        for (var i = 0; i < files.length; i++){
          nombre += files[i].name+'  ';
        }
        element = document.getElementById('name_document');
        element.value = nombre;
        element.title = nombre;
        element.style.display = '';
      }
    </script>
@stop
