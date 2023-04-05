
@php
    use App\Models\User;
@endphp
     
    <form  id="form-usuarios">
        
        <div class="modal-body">
            
            <h6 class="text-primary font-weight-bold">
                {{!blank($usuarios->id) ? 'Editar Usuario' : 'Creación de Usuario' }}
            </h6>

            <input type="hidden" name="codusuarios" id="codusuarios" value="{{ $usuarios->id }}" >

            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa fa-user"></i></span>
                </div>
                <input value="{{$usuarios->name}}" placeholder="Digite el nombre" type="text" name="name" id="name" class="form-control">
            </div>

            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa fa-envelope"></i></span>
                </div>
                <input value="{{$usuarios->email}}" placeholder="Digite el email" type="email" name="email" id="email" class="form-control">
            </div>

            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa fa-key"></i></span>
                </div>
                <input  placeholder="Digite una contraseña" type="password" name="password" id="password" class="form-control">
            </div>

            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa fa-product-hunt"></i></span>
                </div>
                <select data-placeholder="Seleccione o busqueda" name="role" id="role" class="form-control">
                   <option value="">Seleccione  Roles</option>
                    <option value="admin">Administrador</option>
                    <option value="user">Usuario</option>
                </select>
            </div>

            <button type="submit" class="btn  btn-success float-right btn-sm">
                {{ !blank($usuarios->id) ? 'EDITAR' : 'CREAR' }}
            </button>

            <button type="button" class="btn btn-danger float-left btn-sm" data-dismiss="modal">
                Salir
            </button>

        </div>
    </form>

<script>
    $("#form-usuarios").find('select').chosen(); 
    $("#form-usuarios").validate({
      
        submitHandler: function() {
            
            $.ajax({
                method: "POST",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url:  "{{ route('usuarios.crear-formulario') }}",
                data:  $("#form-usuarios").serialize(),
                success: function (result) {
                    $("#contenedor-usuarios").html(result.tabla_usuarios);
                    $("#modal_usuarios").modal('hide');

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
                        text: 'FALLO ALGO',
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

            name: {
                required: true,
                //minlength: 5,
            },

            email: {
                required: true,
                //minlength: 5,
            },

            role: {
                required: true,
                //minlength: 5,
            }


        },
        messages: {

            email: {
                required:  "Por favor, introduzca el email",
                //minlength: 5,
            },

            name: {
                required:  "Por favor, introduzca un nombre de usuario",
                //minlength: 5,categoria_id
            },

            role: {
                required:  "Por favor, introduzca un role", 
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