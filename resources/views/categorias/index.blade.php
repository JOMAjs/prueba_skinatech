@php
    $contador = 0;
    use App\Enums\EEstado;
@endphp

@extends('layouts.navegation')

@section('contenido')

<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Administrar Categorias
        </h1>
        <ol class="breadcrumb">
            <li>
                <a href="inicio"><i class="fa fa-dashboard"></i> 
                    Inicio
                </a>
            </li>
      
            <li class="active">
                Administrar Categorias
            </li>
        </ol>
    </section>

    <section class="content">
        <div class="box">
            <div class="box-header with-border">
                @can('create')
                    <button class="btn btn-success btn-sm btn-abrir-categorias" >
                        Agregar Categoria 
                    </button>
                @endcan
            </div>
            <div class="box-body" id="contenedor-categorias">
                <table class="table table-bordered table-striped dt-responsive">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nombre Categorias</th>
                            <th>Sub Categorias</th>
                            <th>Productos</th>
                            <th>Estado</th>
                            <th>Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($listCategorias as $id => $categorias)

                        <tr>
                            <td>{{$contador++}}</td>
                            <td>{{$categorias->nombre_ct}}</td>
                            <td>{{$categorias->nombre_subct}}</td>
                            <td>{{$categorias->nombre_pr}}</td>
                            <td>{!!  EEstado::result($categorias->estado)->getDescription() !!} </td>
                            <td>
                                @can('create')
                                    <button data-categorias_id="{{$categorias->cat}}" class="btn btn-success btn-sm btn-abrir-categorias">
                                        <i class="fa fa-edit"></i>
                                    </button>
                                    <button data-categorias_id="{{$categorias->cat}}" class="btn btn-danger btn-sm btn-eliminar-categorias">
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
<div id="modal_categorias" class="modal" role="dialog" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true" style="display: none;"  data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content" >
            <div class="modal-header bg-success">
                <h5 class="modal-title">Administrar Categorias</h5>
            </div>
            <div class="modal-body" id="formulario-categorias"></div>
        </div>
    </div>
</div>
@endsection


@section('scripts')

<script>

    $(document).on("click",".btn-abrir-categorias",function(){
        var codcategorias = $(this).data("categorias_id");
        console.log(codcategorias)
        url = "{{ route('categorias.abrir-formulario') }}"
        $.ajax({
            method: "POST",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: url,
            data: {
                codcategorias: codcategorias, 
            },
            success: function(res){
                $("#formulario-categorias").html(res.formulario_categorias);
                $("#modal_categorias").modal('show');
            }
        })
    });

    $(document).on("click", ".btn-eliminar-categorias", function(){
            var codcategorias = $(this).data("categorias_id");
            var confirmacion = window.confirm('¿Desea eliminar la subcategorias ?');
            if(confirmacion){
                $.ajax({
                    method: "POST",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: "{{route('categorias.eliminar-formulario')}}",
                    data: {
                        codcategorias: codcategorias,
                    },
                    success: function(respuesta) {
                        $("#contenedor-categorias").html(respuesta.tabla_categorias);

                        $.toast({
                            heading: 'Mensaje del sistema',
                            text: 'Sea Eliminado la categoria',
                            position: 'bottom-right',
                            stack: false,
                            icon: 'success'
                        })
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