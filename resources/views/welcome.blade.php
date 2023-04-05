@extends('layouts.navegation')

@section('contenido')
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Administrador
        </h1>
        <ol class="breadcrumb">
            <li>
                <a href="inicio"><i class="fa fa-dashboard"></i> 
                    Inicio
                </a>
            </li>
      
            <li class="active">
                Administrador
            </li>
        </ol>
    </section>

    <section class="content">
        <div class="box">
            <div class="box-header with-border">
                <h1 class="text-danger">Prueba Programación</h1>
            </div>
            <div class="box-body" id="tablaArea">

               <span>BASE DE DATOS </span><br>
               <img src="./vistas/img/db_konecta_developer.png" alt="" srcset="">
                
               <div class="list-group mb-3">
                    <a href="#" class="list-group-item active">
                       La solución debe permitir:
                    </a>
                    <a href="#" class="list-group-item">Realizada con LARAVEL v7 MVC</a>
                    <a href="#" class="list-group-item">Base de Datos llamada db_skinatech_developers</a>
                    <a href="#" class="list-group-item">Diseño con Bootstrap css</a>
                    <a href="#" class="list-group-item">validacion jquery-validator,Ajax </a>
                </div>

            </div>
           

        </div>
    
    </section>
</div>

@endsection

