<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} - Prueba Backend ktc</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="{{ asset('js/jquery.js') }}"></script>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
        </nav>

        <main class="py-4">
            <div class="container">
                <div class="row justify-content-center">
                    @foreach($productos as $producto)
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header">{{$producto->fabricante}} - {{$producto->pais_origen}}</div>
                            <div class="card-body">
                                <p><b>SKU: </b>{{$producto->sku}}</p>
                                <p><b>Descripción: </b>{{$producto->descripcion}}</p>
                                <p><b>País de origen: </b>{{$producto->pais_origen}}</p>
                                <p><b>Fabricante: </b>{{$producto->fabricante}}</p>
                                <p><b>Categoría: </b>{{$producto->categoria->nombre}}</p>
                                <p><b>Archivos (imagenes/documentos): </b>
                                    @include('productos.showdocs',["docs"=>$producto->documentos])
                                </p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </main>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
