@php
    $contador = 0;
    use App\Enums\EEstado;
    use Illuminate\Support\Facades\Auth;
@endphp

@extends('layouts.navegation')

@section('contenido')

<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Administrar Productos
        </h1>
        <ol class="breadcrumb">
            <li>
                <a href="inicio"><i class="fa fa-dashboard"></i> 
                    Inicio
                </a>
            </li>
      
            <li class="active">
                Administrar Productos
            </li>
        </ol>
    </section>

    <section class="content">
        <div class="box">
            <div class="box-header with-border">
                @can('create', $users)
                     <button class="btn btn-success btn-sm btn-abrir-productos" >
                         Agregar productos 
                     </button>
               @endcan
            </div>
            <div class="box-body" id="contenedor-productos">
                <table class="table table-bordered table-striped dt-responsive">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nombre Productos</th>
                            <th>Estado</th>
                            <th>Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($listProductos as $id => $productos)

                        <tr>
                            <td>{{$contador++}}</td>
                            <td>{{$productos->nombre_pr}}</td>
                            <td>{!!  EEstado::result($productos->estado)->getDescription() !!} </td>
                            <td>
                                @can('create', $users)
                                <button data-productos_id="{{$productos->id}}" class="btn btn-success btn-sm btn-abrir-productos">
                                    <i class="fa fa-edit"></i>
                                </button>
                                <button data-productos_id="{{$productos->id}}" class="btn btn-danger btn-sm btn-eliminar-productos">
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
<div id="modal_productos" class="modal" role="dialog" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true" style="display: none;"  data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content" >
            <div class="modal-header bg-success">
                <h5 class="modal-title">Administrar Productos</h5>
            </div>
            <div class="modal-body" id="formulario-productos"></div>
        </div>
    </div>
</div>
@endsection


@section('scripts')

<script>

    $(document).on("click",".btn-abrir-productos",function(){
        var codproductos = $(this).data("productos_id");
        var url =  "{{ route('productos.abrir-formulario') }}";
        $.ajax({
            method: "POST",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            
            url: url,
            data: {
                codproductos: codproductos, 
            },
            success: function(res){
                $("#formulario-productos").html(res.formulario_productos);
                $("#modal_productos").modal('show');
            }
        })
    });


    $(document).on("click", ".btn-eliminar-productos", function(){
        var codproductos = $(this).data("productos_id");
            var confirmacion = window.confirm('¿Desea eliminar el producto ?');
            if(confirmacion){
                $.ajax({
                    method: "POST",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: "{{route('productos.eliminar-formulario')}}",
                    data: {
                        codproductos: codproductos,
                    },
                    success: function(respuesta) {
                        $("#contenedor-productos").html(respuesta.tabla_productos);
                        
                        $.toast({
                            heading: 'Mensaje del sistema',
                            text: 'Sea eliminado Corretamente',
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