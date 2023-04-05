<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Enums\EEstado;
use App\Models\Categoria;
use App\Models\Productos;
use Illuminate\Http\Request;
use App\Models\Subcategorias;
use App\Http\Requests\createCategoriaRequest;

class CategoriaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $res = Categoria::join('subcategorias','subcategorias.id','=','categorias.subcategoria_id')
                        ->join('productos','productos.id','=','categorias.producto_id')
        ->select('categorias.id as cat','productos.*','subcategorias.*','categorias.*')->get();

        $listCategorias = [];
        foreach ($res as $categorias) {
            # code...
            $listCategorias[$categorias->id] = $categorias;
        }

        return view('categorias.index', [
            'listCategorias' => $listCategorias,
            'users' => new User
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(createCategoriaRequest $request )
    {

        if (!blank($request->codcategorias)) {
            # code...
            $categorias = Categoria::find($request->codcategorias);

            $prodctos       = Productos::find($request->producto_id);
            $subcategoria   = Subcategorias::find($request->subcategoria_id);

            $categorias->update([
                'nombre_ct' => $request->nombre_ct,
                'subcategoria_id' => $request->subcategoria_id,
                'producto_id' => $request->producto_id,
                'estado' => $request->estado
            ]);

            $prodctos->update([
                'estado' => $request->estado
            ]);

            $subcategoria->update([
                'estado' => $request->estado
            ]);


        } else {
            # code...

            Categoria::create([
                'nombre_ct' => $request->nombre_ct,
                'subcategoria_id' => $request->subcategoria_id,
                'producto_id' => $request->producto_id,
                'estado' => EEstado::index(EEstado::ACTIVO)->getId()
            ]);

        }


        $res = Categoria::join('subcategorias','subcategorias.id','=','categorias.subcategoria_id')
                        ->join('productos','productos.id','=','categorias.producto_id')
                      ->select('categorias.id as cat','productos.*','subcategorias.*','categorias.*')->get();

        $listCategorias = [];
        foreach ($res as $categorias) {
            # code...
            $listCategorias[$categorias->id] = $categorias;
        }

        return response()->json([
            '0' => $request->all(),
            'tabla_categorias' => view('categorias.partials.tabla-categorias',[
                'listCategorias' => $listCategorias
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
        $categorias = blank($request->codcategorias) ? new Categoria() : Categoria::find($request->codcategorias);
        return response()->json([
            'formulario_categorias' => view('categorias.form-categorias',[
               'categorias' => $categorias,
              // 'listsubcategorias' => new Subcategorias(),
            ])->render(),
        ]);
    }

    public function update(Request $request, Categoria $categoria)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        
        Categoria::destroy($request->codcategorias);
       

        $res = Categoria::join('subcategorias','subcategorias.id','=','categorias.subcategoria_id')
        ->join('productos','productos.id','=','categorias.producto_id')
      ->select('categorias.id as cat','productos.*','subcategorias.*','categorias.*')->get();
      
      $listCategorias = [];
      foreach ($res as $categorias) {
        # code...
        $listCategorias[$categorias->id] = $categorias;
    }

        return response()->json([
            'tabla_categorias' => view('categorias.partials.tabla-categorias',[
                'listCategorias' => $listCategorias
            ])->render(),
            
        ]);

    }

}
