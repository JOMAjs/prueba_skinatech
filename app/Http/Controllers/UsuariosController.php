<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsuariosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listUsuarios = [];

        foreach (User::all() as $usuarios) {
            # code...
            $listUsuarios[$usuarios->id] = $usuarios;
        }

        return view('usuarios.index',[

            'listUsuarios' => $listUsuarios

        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        
        if (!blank($request->codusuarios)) {
            # code...
            $user       = User::where('id',$request->codusuarios);

            $user->update([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => $request->role
            ]);

        } else {
            # code...

            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => $request->role           
            ]);

        }

        
        $listUsuarios = [];
        foreach (User::all() as $usuarios) {
            # code...
            $listUsuarios[$usuarios->id] = $usuarios;
        }

        return response()->json([
            '0' => $request->all(),
            'tabla_usuarios' => view('usuarios.partials.tabla-usuarios',[
                'listUsuarios' => $listUsuarios
            ])->render()
        ]);


    }

    public function abrir_formulario(Request $request){
        $usuarios = blank($request->codusuarios) ? new User() : User::find($request->codusuarios);
        return response()->json([
            'formulario_Usuarios' => view('usuarios.partials.form-usuarios',[
                'usuarios' => $usuarios
            ])->render(),
        ]);
    }

   
    public function destroy(Request $request)
    {
        User::destroy($request->codusuarios);
       
        $listUsuarios = [];
        foreach(User::all() as $usuarios)    {
            $listUsuarios[$usuarios->id] = $usuarios;
        }
 
        return response()->json([
            'tabla_usuarios' => view('usuarios.partials.tabla-usuarios',[
                'listUsuarios' => $listUsuarios
            ])->render(),
        ]);

        //
    }
}
