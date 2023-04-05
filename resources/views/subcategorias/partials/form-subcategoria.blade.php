@php
    use App\Enums\EEstado;
    use App\Models\Productos;
@endphp

    <form  id="form-subcategorias">
        <div class="modal-body">

            <h6 class="text-primary font-weight-bold">
                {{!blank($subcategorias->id) ? 'Editar Sub Categoria' : 'Creación de Sub Categoria' }}
            </h6>

            <input type="hidden" name="codsubcategorias" id="codsubcategorias" value="{{$subcategorias->id}}">

            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa fa-product-hunt"></i></span>
                </div>
                <input value="{{$subcategorias->nombre_subct}}" placeholder="Digite el nombre del producto" type="text" name="nombre_subct" id="nombre_subct" class="form-control">
            </div>

            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa fa-product-hunt"></i></span>
                </div>
                <input value="{{$subcategorias->cantidad}}" placeholder="Digite la cantidad" type="number" name="cantidad" id="cantidad" class="form-control">
            </div>
            
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa fa-product-hunt"></i></span>
                </div>
                <select data-placeholder="Seleccione o busqueda" name="producto_id" id="producto_id" class="form-control">
                    <option value="">Seleccione o busqueda de productos</option>
                    @foreach(Productos::all() as $producto)
                        <option value="{{ $producto->id }}"  {{ $producto->id == $subcategorias->producto_id ? 'selected' : '' }}>{{ $producto->nombre_pr }}</option>
                    @endforeach
                </select>
            </div>

            @if(!blank($subcategorias->estado))
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa fa-list"></i></span>
                </div>
                <select data-placeholder="Seleccione o busqueda" name="estado" id="estado" class="form-control">
                    <option value="">Seleccione o busqueda</option>
                    @foreach (EEstado::data() as $estado)
                    <option value="{{ $estado->getId() }}" {{ $estado->getId() == $subcategorias->estado ? 'selected' : '' }}>{{ $estado->getDescription() }}</option>
                    @endforeach 
                </select>
            </div>
            @endif
            
            <button type="submit" class="btn  btn-success float-right btn-sm">
                {{ !blank($subcategorias->id) ? 'EDITAR' : 'CREAR' }}
            </button>

            <button type="button" class="btn btn-danger float-left btn-sm" data-dismiss="modal">
                Salir
            </button>

        </div>
    </form>
<script>
    $("#form-subcategorias").find('select').chosen(); 
    $("#form-subcategorias").validate({
      
        submitHandler: function() {
            
            $.ajax({
                method: "POST",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url:  "{{ route('subcategorias.crear-formulario') }}",
                data:  $("#form-subcategorias").serialize(),
                success: function (result) {
                    $("#contenedor-subcategorias").html(result.tabla_subcategorias);
                    $("#modal_subcategorias").modal('hide');

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
                        text: 'Falla de registro ',
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

            nombre_subct: {
                required: true,
                //minlength: 5,
            },

            producto_id: {
                required: true,
                //minlength: 5,
            },

            categoria_id: {
                required: true,
                //minlength: 5,
            }


        },
        messages: {

            nombre_subct: {
                required:  "Por favor, introduzca el sub categorias",
                //minlength: 5,
            },

            producto_id: {
                required:  "Por favor, introduzca un producto",
                //minlength: 5,categoria_id
            },

            categoria_id: {
                required:  "Por favor, introduzca una categoria",
                //minlength: 5,
            }


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