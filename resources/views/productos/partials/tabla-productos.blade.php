@php
    $contador = 0;
    use App\Enums\EEstado;
@endphp
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
            <td>{!! EEstado::result($productos->estado)->getDescription() !!} </td>
            <td>
                <button data-productos_id="{{$productos->id}}" class="btn btn-success btn-sm btn-abrir-productos">
                    <i class="fa fa-edit"></i>
                </button>
                
                <button data-productos_id="{{$productos->id}}" class="btn btn-danger btn-sm btn-eliminar-productos">
                    <i class="fa fa-remove"></i>
                </button>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<script src="{{asset('js/datatables.js') }}"></script>