@php
    $contador = 1;
    use App\Enums\EEstado;
@endphp
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
            
                <button data-codusuarios_id="{{ $Usuarios->id }}" class="btn btn-success btn-sm btn-abrir-Usuarios">
                    <i class="fa fa-edit"></i>
                </button>
                <button data-codusuarios_id="{{$Usuarios->id}}" class="btn btn-danger btn-sm btn-eliminar">
                    <i class="fa fa-remove"></i>
                </button>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<script src="{{asset('js/datatables.js') }}"></script>