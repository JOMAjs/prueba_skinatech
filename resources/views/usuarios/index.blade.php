@php
    $contador = 1;
    use App\Enums\EEstado;
@endphp

@extends('layouts.navegation')

@section('contenido')

<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Administrar Usuarios
        </h1>
        <ol class="breadcrumb">
            <li>
                <a href="inicio"><i class="fa fa-dashboard"></i> 
                    Inicio
                </a>
            </li>
      
            <li class="active">
                Administrar Usuarios
            </li>
        </ol>
    </section>

    <section class="content">
        <div class="box">
            <div class="box-header with-border">
            @can('create')
            <button class="btn btn-success btn-sm btn-abrir-Usuarios" >
                Agregar Usuarios 
            </button>
                
            @endcan

            
            </div>
            <div class="box-body" id="contenedor-usuarios">
                <table class="table table-bordered table-striped dt-responsive">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nombre</th>
                            <th>Email</th>
                            <th>Roles</th>
                            <th>Optiones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($listUsuarios as  $Usuarios)
                        <tr>
                            <td>{{$contador++}}</td>
                            <td>{{$Usuarios->name}}</td>
                            <td>{{$Usuarios->email}}</td>
                            <td>{{$Usuarios->role}}</td>
                            
                             <td>
                                @can('update')
                                <button data-codusuarios_id="{{ $Usuarios->id }}" class="btn btn-success btn-sm btn-abrir-Usuarios">
                                    <i class="fa fa-edit"></i>
                                </button>
                                @endcan
                                @can('create')
                                <button data-codusuarios_id="{{$Usuarios->id}}" class="btn btn-danger btn-sm btn-eliminar">
                                    <i class="fa fa-remove"></i>
                                </button>
                                 @endcan
                               
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
           

        </div>
    
    </section>
</div>
@endsection

@section('modals')
<div id="modal_usuarios" class="modal" role="dialog" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true" style="display: none;"  data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content" >
            <div class="modal-header bg-success">
                <h5 class="modal-title">Administrar  Usuarios</h5>
            </div>
            <div class="modal-body" id="formulario-Usuarios"></div>
        </div>
    </div>
</div>
@endsection


@section('scripts')

<script>

    $(document).on("click",".btn-abrir-Usuarios",function(){
        var codusuarios = $(this).data("codusuarios_id");
        $.ajax({
            method: "POST",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url:  "{{ route('usuarios.abrir-formulario') }}",
            data: {
                codusuarios: codusuarios, 
            },
            success: function(res){
                $("#formulario-Usuarios").html(res.formulario_Usuarios);
                $("#modal_usuarios").modal('show');
            }
        })
    });


    $(document).on("click", ".btn-eliminar", function(){
            var codusuarios = $(this).data("codusuarios_id");
            var confirmacion = window.confirm('¿Desea eliminar el usuario ?');
            if(confirmacion){
                $.ajax({
                    method: "POST",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: "{{route('usuarios.eliminar-formulario')}}",
                    data: {
                        codusuarios: codusuarios,
                    },
                    success: function(respuesta) {
                        $("#contenedor-usuarios").html(respuesta.tabla_usuarios);
                        $.toast({
                            heading: 'Mensaje del sistema',
                            text: 'sea eliminado Correctamente',
                            position: 'bottom-right',
                            stack: false,
                            icon: 'success'
                        });
                    },
                });
            }else{
                $.toast({
                    heading: 'Mensaje del sistema',
                    text: 'Operación Cancelada',
                    position: 'bottom-right',
                    stack: false,
                    icon: 'error'
                })
            }
            
        });



</script>

@endsection