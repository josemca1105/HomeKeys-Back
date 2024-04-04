<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Casa;

class CasaController extends Controller
{

    // Mostrar casas
    public function index()
    {
        $casas = Casa::all();
        return response()->json($casas);
    }

    // Obtener casa por id
    public function show($id)
    {
        $casa = Casa::find($id);
        if ($casa){
            return response()->json([
                'status' => 200,
                'casa' => [
                    'id' => $casa->id,
                    'name' => $casa->name,
                    'code' => $casa->code,
                    'address' => $casa->address,
                    'city' => $casa->city,
                    'state' => $casa->state,
                    'description' => $casa->description,
                    'price' => $casa->price,
                    'n_rooms' => $casa->n_rooms,
                    'n_baths' => $casa->n_baths,
                    'n_parking' => $casa->n_parking,
                    'type' => $casa->type,
                    'meters' => $casa->meters,
                    'status' => $casa->status
                ]
            ], 200);
        } else{
            return response()->json(['error' => 'Casa no encontrada'], 404);
        }
    }

    // Crear casa
    public function store(Request $request)
    {
        $casa = Casa::firstOrCreate(
            ['code' => $request->code],
            [
                'name' => $request->name,
                'address' => $request->address,
                'city' => $request->city,
                'state' => $request->state,
                'description' => $request->description,
                'price' => $request->price,
                'n_rooms' => $request->n_rooms,
                'n_baths' => $request->n_baths,
                'n_parking' => $request->n_parking,
                'type' => $request->type,
                'meters' => $request->meters,
                'status' => $request->status
            ]
        );

        // Comprobar si la casa ya fue creada
        if ($casa->wasRecentlyCreated) {
            return response()->json([
                'status' => 200,
                'message' => 'Casa creada correctamente',
                'casa' => [
                    'id' => $casa->id,
                    'name' => $casa->name,
                    'code' => $casa->code,
                    'address' => $casa->address,
                    'city' => $casa->city,
                    'state' => $casa->state,
                    'description' => $casa->description,
                    'price' => $casa->price,
                    'n_rooms' => $casa->n_rooms,
                    'n_baths' => $casa->n_baths,
                    'n_parking' => $casa->n_parking,
                    'type' => $casa->type,
                    'meters' => $casa->meters,
                    'status' => $casa->status
                ]
            ], 200);
        } else {
            return response()->json([
                'status' => 409,
                'message' => 'Una casa con este codigo ya existe',
            ], 409);
        }
    }

    // Actualizar casa
    public function update(Request $request, $id)
    {
        $casa = Casa::find($id);
        if (!$casa) {
            return response()->json([
                'status' => 404,
                'message' => 'Casa no encontrada'
            ], 404);
        }

        $casa->name = $request->name;
        $casa->code = $request->code;
        $casa->address = $request->address;
        $casa->city = $request->city;
        $casa->state = $request->state;
        $casa->description = $request->description;
        $casa->price = $request->price;
        $casa->n_rooms = $request->n_rooms;
        $casa->n_baths = $request->n_baths;
        $casa->n_parking = $request->n_parking;
        $casa->type = $request->type;
        $casa->meters = $request->meters;
        $casa->status = $request->status;

        $casa->save();

        return response()->json([
            'status' => 200,
            'message' => 'Casa actualizada correctamente',
            'casa' => [
                'id' => $casa->id,
                'name' => $casa->name,
                'code' => $casa->code,
                'address' => $casa->address,
                'city' => $casa->city,
                'state' => $casa->state,
                'description' => $casa->description,
                'price' => $casa->price,
                'n_rooms' => $casa->n_rooms,
                'n_baths' => $casa->n_baths,
                'n_parking' => $casa->n_parking,
                'type' => $casa->type,
                'meters' => $casa->meters,
                'status' => $casa->status
            ]
        ], 200);
    }

    // Eliminar casa
    public function destroy($id)
    {
        $casa = Casa::find($id);
        if ($casa) {
            $casa->delete();
            return response()->json([
                'status' => 200,
                'message' => 'Casa eliminada correctamente'
            ], 200);
        } else {
            return response()->json(['error' => 'Casa no encontrada'], 404);
        }
    }
}
