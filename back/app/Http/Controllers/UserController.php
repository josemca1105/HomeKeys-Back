<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\File;

class UserController extends Controller
{
    // Mostrar Usuarios
    public function index()
    {
        $usuarios = User::all();
        return response()->json($usuarios, 200);
    }

    // Mostrar Usuario por ID
    public function show($id)
    {
        $usuario = User::find($id);
        if($usuario){
            return response()->json([
                'status' => 200,
                'user' => [
                    'id' => $usuario->id,
                    'name' => $usuario->name,
                    'lastname' => $usuario->lastname,
                    'email' => $usuario->email,
                    'phone' => $usuario->phone,
                    'image' => $usuario->image,
                    'rango' => $usuario->rango
                ]
            ], 200);
        }else{
            return response()->json(['error' => 'Usuario no encontrado'], 404);
        }
    }

    // Guardar Usuarios
    public function store(Request $request)
    {
        $imageName = 'default.png';

        if ($request->hasFile('image')) {
            try {
                $request->validate([
                    'image' => 'mimes:jpeg,png,jpg', // Validar si la imagen es jpeg, png o jpg
                ]);

                $img = $request->file('image');
                $imageName = time() . '.' . $img->getClientOriginalExtension();
                $img->move(public_path('images'), $imageName);
            } catch (\Illuminate\Validation\ValidationException $e) {
                return response()->json([
                    'message' => 'Formato incorrecto de imagen',
                ], 400);
            }
        }

        $usuario = new User();
        $usuario->name = $request->name;
        $usuario->lastname = $request->lastname;
        $usuario->email = $request->email;
        $usuario->password = bcrypt($request->password);
        $usuario->phone = $request->phone;
        $usuario->image = $imageName;

        $usuario->save();
        return response()->json([
            'status' => 200,
            'message' => 'Usuario creado correctamente',
            'path' => asset('images/'.$imageName),
            'usuario' => [
                'id' => $usuario->id,
                'name' => $usuario->name,
                'lastname' => $usuario->lastname,
                'email' => $usuario->email,
                'phone' => $usuario->phone,
                'rango' => $usuario->rango,
            ]
        ], 200);
    }

    // Obtener Imagen
    public function getImage($id)
    {
        $usuario = User::find($id);

        if (!$usuario) {
            return response()->json([
                'status' => 404,
                'message' => 'Usuario no encontrado'
            ], 404);
        }

        $path = public_path('images/'.$usuario->image);

        if (!File::exists($path)) {
            return response()->json([
                'status' => 404,
                'message' => 'Imagen no encontrada'
            ], 404);
        }

        return response()->file($path);
    }

    // Actualizar Usuario
    public function update(Request $request, $id)
    {
        $usuario = User::find($id);
        if (!$usuario) {
            return response()->json([
                'status' => 404,
                'message' => 'Usuario no encontrado'
            ], 404);
        }

        $imageName = 'default.png';

        if ($request->hasFile('image')) {
            try {
                $request->validate([
                    'image' => 'mimes:jpeg,png,jpg', // Validar si la imagen es jpeg, png o jpg
                ]);

                $img = $request->file('image');
                $imageName = time() . '.' . $img->getClientOriginalExtension();
                $img->move(public_path('images'), $imageName);
            } catch (\Illuminate\Validation\ValidationException $e) {
                return response()->json([
                    'message' => 'Formato incorrecto de imagen',
                ], 400);
            }
        }

        $usuario->name = $request->name;
        $usuario->lastname = $request->lastname;
        $usuario->email = $request->email;
        $usuario->phone = $request->phone;
        $usuario->image = $imageName;

        $usuario->save();

        return response()->json([
            'status' => 200,
            'message' => 'Usuario actualizado correctamente',
            'usuario' => [
                'id' => $usuario->id,
                'name' => $usuario->name,
                'lastname' => $usuario->lastname,
                'email' => $usuario->email,
                'phone' => $usuario->phone,
                'image' => $usuario->image,
            ]
        ], 200);
    }

    // Eliminar Usuario
    public function destroy($id)
    {
        $usuario = User::find($id);
        if (!$usuario) {
            return response()->json([
                'status' => 404,
                'message' => 'usuario no encontrado'
            ], 404);
        }

        $image_path = public_path().'/images/'.$usuario->image;

        if (File::exists($image_path)) {
            File::delete($image_path);
        }

        $usuario->delete();

        return response()->json([
            'status' => 200,
            'message' => 'Usuario eliminado correctamente'
        ], 200);
    }
}
