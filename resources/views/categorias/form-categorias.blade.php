@php
    use App\Enums\EEstado;
    use App\Models\Subcategorias;
    use App\Models\Productos;
@endphp

    <form id="form-categorias">

        <div class="modal-body">

            <input type="hidden" name="codcategorias" id="codcategorias" value="{{ $categorias->id }}">
    
            <h6 class="text-primary font-weight-bold">
                {{!blank($categorias->id) ? 'Editar Categoria' : 'Creación de Categoria' }}
            </h6>
            
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa fa-product-hunt"></i></span>
                </div>
                <input placeholder="Digite una categoria" type="text" name="nombre_ct" id="nombre_ct" class="form-control" value="{{ $categorias->nombre_ct }}">
            </div>
            
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa fa-list"></i></span>
                </div>
                
                <select name="producto_id" id="producto_id" class="form-control">
                    <option value="">Seleccione un Producto</option>
                    @foreach (Productos::all() as $item)
                        <option value="{{$item->id}}" {{$item->id == $categorias->producto_id ? 'selected' : ''}} >{{ $item->nombre_pr }}</option>
                    @endforeach
                </select>
            </div>
            
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa fa-list"></i></span>
                </div>
                
                <select name="subcategoria_id" id="subcategoria_id" class="form-control">
                    <option value="">Seleccione una Subcategorias</option>
                    @foreach (Subcategorias::all() as $item)
                        <option value="{{$item->id}}" {{$item->id == $categorias->subcategoria_id ? 'selected' : ''}} >{{ $item->nombre_subct }}</option>
                    @endforeach
                </select>
            </div>
            
            @if (!blank($categorias->estado))
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa fa-list"></i></span>
                    </div>
                    
                    <select name="estado" id="estado" class="form-control">
                        <option value="">Seleccione estado</option>
                        @foreach (EEstado::data() as $item)
                            <option value="{{$item->getId()}}" {{$item->getId() == $categorias->estado ? 'selected' : ''}} >{!! $item->getDescription() !!}</option>
                        @endforeach
                    </select>
                </div>
            @endif
    
        </div>
        
        <button type="submit" class="btn  btn-success float-right btn-sm">
            {{ !blank($categorias->id) ? 'EDITAR' : 'CREAR' }}
        </button>
    
        <button type="button" class="btn btn-danger float-left btn-sm" data-dismiss="modal">
            SALIR
        </button>

    </form>

<script>
    $("#form-categorias").find('select').chosen(); 
    $("#form-categorias").validate({
      
        submitHandler: function() {
            
            $.ajax({
                method: "POST",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url:  "{{ route('categorias.crear-formulario') }}",
                data:  $("#form-categorias").serialize(),
                success: function (result) {
                    $("#contenedor-categorias").html(result.tabla_categorias);
                    $("#modal_categorias").modal('hide');

                    $.toast({
                        heading: 'Mensaje del sistema',
                        text: 'Se registro completamete',
                        position: 'bottom-right',
                        stack: false,
                        icon: 'success'
                    })
                },
                error: function(obj, typeError, text, data) {

                    $.toast({
                        heading: 'Mensaje del sistema',
                        text: 'Se cancelo completamete',
                        position: 'bottom-right',
                        stack: false,
                        icon: 'danger'
                    })

                }
            });
            //form.submit();
            return false;
        },
        rules: {
            nombre_ct: {
                required: true,
                //minlength: 5,
            },
            subcategoria_id: {
                required: true,
            },

            producto_id: {
                required: true,
            },

        },
        messages: {
            nombre_ct: {
                required: "Por favor, introduzca una categoria asignado",
                //minlength: 5,
            },
            subcategoria_id: {
                required: "Por favor, introduzca una sub categoria asignado",
            },

            producto_id: {
                required: "Por favor, introduzca el producto asignado",
            },
        },
        highlight: function (element, errorClass) {
            $(element).parent().addClass('has-feedback has-error');
            $(element).parent().removeClass('has-feedback has-success');
        },
        unhighlight: function (element, errorClass) {
            $(element).parent().removeClass('has-feedback has-error');
            $(element).parent().addClass('has-feedback has-success');
        },
        errorPlacement: function(error, element) {
            if(element.hasClass("no-label")){

            } else if(element.parents('.input-group').length > 0) {
                error.insertAfter(element.parents('.input-group'));
            } else if(element.parents('.form-group').find('.chosen-container').length > 0){

            } else if(element.parents('.radio').find('.chosen-container').length > 0){
                error.insertAfter(element.parents('.radio').find('.chosen-container'));
            } else {
                error.insertAfter(element);
            }
        }
    });
</script>


