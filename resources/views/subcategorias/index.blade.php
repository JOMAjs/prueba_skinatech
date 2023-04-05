@php
    $contador = 0;
    use App\Enums\EEstado;
@endphp

@extends('layouts.navegation')

@section('contenido')

<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Administrar Subcategorias
        </h1>
        <ol class="breadcrumb">
            <li>
                <a href="inicio"><i class="fa fa-dashboard"></i> 
                    Inicio
                </a>
            </li>
      
            <li class="active">
                Administrar Subcategorias
            </li>
        </ol>
    </section>

    <section class="content">
        <div class="box">
            <div class="box-header with-border">
                @can('create',new App\Models\User)
                    <button class="btn btn-success btn-sm btn-abrir-subcategorias" >
                        Agregar Subcategorias 
                    </button>
               @endcan
            </div>
            <div class="box-body" id="contenedor-subcategorias">
                <table class="table table-bordered table-striped dt-responsive">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Productos</th>
                            <th>Sub Categorias</th>
                            <th>Cantidad</th>
                            <th>Estado</th>
                            <th>Optiones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($listSubcategorias as $id => $subcategorias)
                        <tr>
                            <td>{{$contador++}}</td>
                            <td>{{$subcategorias->nombre_pr}}</td>
                            <td>{{$subcategorias->nombre_subct}}</td>
                            <td>{{$subcategorias->cantidad}}</td>
                            <td>{!! EEstado::result($subcategorias->subestado)->getDescription() !!} </td>
                             <td>
                                @can('create', $users)
                                    <button data-subcategorias_id="{{$subcategorias->subct}}" class="btn btn-success btn-sm btn-abrir-subcategorias">
                                        <i class="fa fa-edit"></i>
                                    </button>
                                    <button data-subcategorias_id="{{$subcategorias->subct}}" class="btn btn-danger btn-sm btn-eliminar-subcategorias">
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
<div id="modal_subcategorias" class="modal" role="dialog" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true" style="display: none;"  data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content" >
            <div class="modal-header bg-success">
                <h5 class="modal-title">Administrar Sub Categorias</h5>
            </div>
            <div class="modal-body" id="formulario-subcategorias"></div>
        </div>
    </div>
</div>
@endsection


@section('scripts')

<script>

    $(document).on("click",".btn-abrir-subcategorias",function(){
        var codsubcategorias = $(this).data("subcategorias_id");
        $.ajax({
            method: "POST",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url:  "{{ route('subcategorias.abrir-formulario') }}",
            data: {
                codsubcategorias: codsubcategorias, 
            },
            success: function(res){
                $("#formulario-subcategorias").html(res.formulario_subcategorias);
                $("#modal_subcategorias").modal('show');
            }
        })
    });

        $(document).on("click", ".btn-eliminar-subcategorias", function(){
            var codsubcategorias = $(this).data("subcategorias_id");
            var confirmacion = window.confirm('¿Desea eliminar la subcategorias ?');
            if(confirmacion){
                $.ajax({
                    method: "POST",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: "{{route('subcategorias.eliminar-formulario')}}",
                    data: {
                        codsubcategorias: codsubcategorias,
                    },
                    success: function(respuesta) {
                        $("#contenedor-subcategorias").html(respuesta.tabla_subcategorias);
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