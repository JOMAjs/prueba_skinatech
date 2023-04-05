@php
     use App\Enums\EEstado;
@endphp

<form id="form-productos">

    <div class="modal-body">

        <input type="hidden" name="producto_id" id="producto_id" value="{{ $productos->id }}">

        <h6 class="text-primary font-weight-bold">
            {{!blank($productos->id) ? 'Editar Productos' : 'Creación de Productos' }}
        </h6>
        
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fa fa-product-hunt"></i></span>
            </div>
            <input placeholder="Digite una categoria" type="text" name="nombre_pr" id="nombre_pr" class="form-control" value="{{ $productos->nombre_pr }}">
        </div>
        
        @if (!blank($productos->estado))
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa fa-list"></i></span>
                </div>
                
                <select name="estado" id="estado" class="form-control">
                    <option value="">Seleccione estado</option>
                    @foreach (EEstado::data() as $item)
                        <option value="{{$item->getId()}}" {{$item->getId() == $productos->estado ? 'selected' : ''}} >{!! $item->getDescription() !!}</option>
                    @endforeach
                </select>
            </div>
        @endif

    </div>
    
    <button type="submit" class="btn  btn-success float-right btn-sm">
        {{ !blank($productos->id) ? 'EDITAR' : 'CREAR' }}
    </button>

    <button type="button" class="btn btn-danger float-left btn-sm" data-dismiss="modal">
        SALIR
    </button>

</form>

</div>

<script>
    $("#form-productos").validate({
      
        submitHandler: function() {
            
            $.ajax({
                method: "POST",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url:  "{{ route('productos.crear-formulario') }}",
                data:  $("#form-productos").serialize(),
                success: function (result) {
                    
                    $("#contenedor-productos").html(result.tabla_productos);
                    $("#modal_productos").modal('hide');
               
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
                        text: 'Se registro completamete',
                        position: 'bottom-right',
                        stack: false,
                        icon: 'DANGER'
                    })

                }
            });
            //form.submit();
            return false;
        },
        rules: {
            nombre_pr: {
                required: true,
                //minlength: 5,
            }
        },
        messages: {

            nombre_pr: {
                required:  "Por favor, introduzca el producto asignado",
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