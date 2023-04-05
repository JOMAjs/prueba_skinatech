@php
    $contador = 0;
    use App\Enums\EEstado;
@endphp
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
             
                <button data-subcategorias_id="{{$subcategorias->subct}}" class="btn btn-success btn-sm btn-abrir-subcategorias">
                    <i class="fa fa-edit"></i>
                </button>
                <button data-subcategorias_id="{{$subcategorias->subct}}" class="btn btn-danger btn-sm btn-eliminar-subcategorias">
                    <i class="fa fa-remove"></i>
                </button>
            
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<script src="{{asset('js/datatables.js') }}"></script>