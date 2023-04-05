<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Enums\EEstado;
use App\Models\Productos;
use Illuminate\Http\Request;
use App\Http\Requests\createProductosRequest;

class ProductosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    
    public function index()
    {
        $res = Productos::all();

        $listProductos = [];
        foreach ($res as $categorias) {
            # code...
            $listProductos[$categorias->id] = $categorias;
        }

        return view('productos.index', [
            'listProductos' => $listProductos,
            'users' => new User
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(createProductosRequest $request )
    {

        if (!blank($request->producto_id)) {
            # code...
            $prodctos       = Productos::find($request->producto_id);

            $prodctos->update([
                'nombre_pr' => $request->nombre_pr,
                'estado' => $request->estado
            ]);

        } else {
            # code...

            Productos::create([
                'nombre_pr' => $request->nombre_pr,
                'estado' => EEstado::index(EEstado::ACTIVO)->getId()
            ]);

        }


        $res = Productos::all();

        $listProductos = [];
        foreach ($res as $productos) {
            # code...
            $listProductos[$productos->id] = $productos;
        }
        return response()->json([
            '0' => $request->all(),
            'tabla_productos' => view('productos.partials.tabla-productos',[
                'listProductos' => $listProductos
            ])->render()
        ]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function abrir_formulario(Request $request)
    {
        //
        $productos = blank($request->codproductos) ? new Productos() : Productos::find($request->codproductos);
        return response()->json([
            'formulario_productos' => view('productos.partials.form-productos',[
               'productos' => $productos,

            ])->render(),
        ]);
    }


    public function destroy(Request $request)
    {
        
        Productos::destroy($request->codproductos);

        $res = Productos::all();

        $listProductos = [];
        foreach ($res as $categorias) {
            # code...
            $listProductos[$categorias->id] = $categorias;
        }


        return response()->json([
            'tabla_productos' => view('productos.partials.tabla-productos',[
                'listProductos' => $listProductos
            ])->render(),
            
        ]);

    }

}
