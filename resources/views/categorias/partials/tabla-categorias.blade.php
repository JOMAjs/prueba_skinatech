@php
    $contador = 0;
    use App\Enums\EEstado;
@endphp
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
            
                <button data-categorias_id="{{$categorias->cat}}" class="btn btn-success btn-sm btn-abrir-categorias">
                    <i class="fa fa-edit"></i>
                </button>
                <button data-categorias_id="{{$categorias->cat}}" class="btn btn-danger btn-sm btn-eliminar-categorias">
                    <i class="fa fa-remove"></i>
                </button>
           
            </td>
        </tr>

        @endforeach
    </tbody>
</table>

<script src="{{asset('js/datatables.js') }}"></script>