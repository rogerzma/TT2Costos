@extends('layouts.appGOB')

@section('content')

<div class="container">
    <ol class="breadcrumb top-buffer">
        <li><a href="http://www.gob.mx"><i class="icon icon-home"></i></a></li>
        <li><a href="http://www.gob.mx/inifap">Instituto Nacional de Investigaciones Forestales, Agrícolas y Pecuarias</a></li>
        <li><a href="http://zacatecas.inifap.gob.mx/">Inifap C.E. Zacatecas</a></li>
        <li><a href="{{ route('inicio') }}">Agrocostos</a></li>
        <li class="active">Iniciar sesión</li>
    </ol>
</div>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">
                    <h2>{{ __('Iniciar sesión') }}</h2>
                    <hr class="red" style="margin-bottom:2em;">
                    </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Correo electrónico') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Contraseña') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Recordar') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Iniciar sesión') }}
                                </button>

                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('¿Olvidaste tu contraseña? Da clic aquí') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-3">

            <!--SECCIÓN MODIFICABLE | MENU CONTEXTUAL -->
            <div class="list-group">
                <a class="list-group-item" style="text-decoration: none;" href="{{ route('inicio') }}"><img src="/images/templatemo_list.png" style="margin-right:10px;">Inicio</a>
                <a class="list-group-item" style="text-decoration: none;" href="{{ route('Calculadora') }}"><img src="/images/templatemo_list.png" style="margin-right:10px;">Calculadora</a>
                <a class="list-group-item" style="text-decoration: none;" href="{{ route('MapaPotencial') }}"><img src="/images/templatemo_list.png" style="margin-right:10px;">Mapa de potencial</a>
                <a class="list-group-item" style="text-decoration: none;" href="{{ route('filtrado') }}"><img src="/images/templatemo_list.png" style="margin-right:10px;">Reportes</a>
            </div>
        </div>

    </div>
</div>
@endsection