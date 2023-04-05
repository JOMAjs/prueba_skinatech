<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Enums\EEstado;
use App\Models\Productos;
use Illuminate\Http\Request;
use App\Models\Subcategorias;
use App\Http\Requests\createSubcategoriasRequest;

class SubcategoriasController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    


    public function index()
    {
        $res = Subcategorias::join('productos','productos.id','=','subcategorias.producto_id')
                          ->select('productos.*','subcategorias.id as subct','subcategorias.*','subcategorias.estado as subestado')->get();

        $listSubcategorias = [];
        foreach ($res as $subcategorias) {
            # code...
            $listSubcategorias[$subcategorias->id] = $subcategorias;
        }

        return view('subcategorias.index', [
            'listSubcategorias' => $listSubcategorias,
            'users' => new User
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(createSubcategoriasRequest $request )
    {

        if (!blank($request->codsubcategorias)) {
            # code...
            $subcategorias       = Subcategorias::find($request->codsubcategorias);
            $prodctos            = Productos::find($request->producto_id);

            $subcategorias->update([
                'nombre_subct' => $request->nombre_subct,
                'cantidad' => $request->cantidad,
                'producto_id' => $request->producto_id,
                'estado' => $request->estado
            ]);

            $prodctos->update([
                'estado' => $request->estado
            ]);

        } else {
            # code...

            Subcategorias::create([
                'nombre_subct' => $request->nombre_subct,
                'cantidad' => $request->cantidad,
                'producto_id' => $request->producto_id,
                'estado' => EEstado::index(EEstado::ACTIVO)->getId()
            ]);

        }


        $res = Subcategorias::join('productos','productos.id','=','subcategorias.producto_id')
                          ->select('productos.*','subcategorias.id as subct','subcategorias.*','subcategorias.estado as subestado')->get();

        $listSubcategorias = [];
        foreach ($res as $subcategorias) {
            # code...
            $listSubcategorias[$subcategorias->id] = $subcategorias;
        }
        return response()->json([
            '0' => $request->all(),
            'tabla_subcategorias' => view('subcategorias.partials.tabla-subcategorias',[
                'listSubcategorias' => $listSubcategorias
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
        $subcategoria = blank($request->codsubcategorias) ? new Subcategorias() : Subcategorias::find($request->codsubcategorias);
        return response()->json([
            'formulario_subcategorias' => view('subcategorias.partials.form-subcategoria',[
               'subcategorias' => $subcategoria,

            ])->render(),
        ]);
    }


    public function destroy(Request $request)
    {
        
        Subcategorias::destroy($request->codsubcategorias);

        $res =  Subcategorias::join('productos','productos.id','=','subcategorias.producto_id')
        ->select('productos.*','subcategorias.id as subct','subcategorias.*','subcategorias.estado as subestado')->get();


        $listSubcategorias = [];
        foreach ($res as $subcategorias) {
            # code...
            $listSubcategorias[$subcategorias->id] = $subcategorias;
        }
        return response()->json([
            '0' => $request->all(),
            'tabla_subcategorias' => view('subcategorias.partials.tabla-subcategorias',[
                'listSubcategorias' => $listSubcategorias
            ])->render()
        ]);

    }

}
