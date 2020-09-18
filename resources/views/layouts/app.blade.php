<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap-select.min.css')}}">

    <title>{{ config('app.name', 'Laravel') }}</title>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="#">Teste PHP</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item @if(request()->is('/*')) active @endif">
                        <a class="nav-link" href="{{route('home')}}">Início</a>
                    </li>
                    <li class="nav-item @if(request()->is('students*')) active @endif">
                        <a class="nav-link" href="{{route('students.index')}}">Alunos</a>
                    </li>
                    <li class="nav-item @if( request()->is('courses*')) active @endif">
                        <a class="nav-link" href="{{route('courses.index')}}">Cursos</a>
                    </li>
                </ul>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <script src="{{asset('js/app.js')}}"></script>
    <script src="{{asset('js/bootstrap-select.min.js')}}"></script>
    <script src="{{ asset('js/sweetalert.js') }}"></script>
    <script>
        $('.delete-registro').on('click', function(e){
            e.preventDefault()
            Swal.fire({
                title: 'Confirmação',
                text: "Confirma remoção?",
                icon: 'error',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                reverseButtons: 'true',
                confirmButtonText: 'Remover',
                cancelButtonText: 'Cancelar'
                }).then((result) => {
                if (result.value) {
                    $('.form-delete').submit()
                }
            })
        })
    </script>
</body>
</html>
