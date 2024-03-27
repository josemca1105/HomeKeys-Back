<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
class UserController extends Controller
{
    //
    public function index()
    {
        $usuarios = User::all();
        return response()->json($usuarios, 200);
    }

    public function show($id)
    {
        $usuario = User::find($id);
        if($usuario){
            return response()->json($usuario, 200);
        }else{
            return response()->json(['error' => 'Usuario no encontrado'], 404);
        }
    }

    public function store(Request $request)
    {
        $usuario = new User();
        $usuario->name = $request->name;
        $usuario->email = $request->email;
        $usuario->password = bcrypt($request->password);
        $usuario->save();
        return response()->json($usuario, 201);
    }
}
