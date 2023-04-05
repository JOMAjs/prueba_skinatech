@extends('layouts.navegation')

@section('contenido')

<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Administrar
        </h1>
        <ol class="breadcrumb">
            <li>
                <a href="/"><i class="fa fa-dashboard"></i> 
                    Inicio
                </a>
            </li>
      
            <li class="active">
                Administrar Login
            </li>
        </ol>
    </section>

    <section class="content">
        <div class="box">
            <div class="box-header with-border">
               <h5 class="text-success">acceso login admin</h5>
            </div>
            <div class="box-body" id="contenedor-subcategorias">
                <form action="{{ route('login') }}" method="post">
                @csrf
                    <div class="form-group">
                        <label for="">Usuario</label>
                        <div class="input-group mb-3 col-md-8">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-user"></i></span>
                            </div>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        </div>
                    </div>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <div class="form-group">
                        <label for="">Contraseña</label>
                        <div class="input-group mb-3 col-md-8">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-key"></i></span>
                            </div>
                            <input type="password"class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                        </div>
                    </div>
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <button type="submit" class="btn btn-success">{{ __('Login') }}</button>
                  <a href="/register">register</a>
                </form>
                
            </div>
           

        </div>
    
    </section>
</div>
@endsection