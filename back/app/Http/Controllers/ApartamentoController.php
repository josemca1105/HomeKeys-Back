<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Apartamento;

class ApartamentoController extends Controller
{
    // Obtener apartamentos
    public function index()
    {
        $apto = Apartamento::all();
        return response()->json($apto);
    }

    // Obtener apartamento por if
    public function show($id)
    {
        $apto = Apartamento::find($id);
        if ($apto) {
            return response()->json([
                'status' => 200,
                'apartamento' => [
                    'id' => $apto->id,
                    'name' => $apto->name,
                    'code' => $apto->code,
                    'floor' => $apto->floor,
                    'p_supply' => $apto->p_supply,
                    'elevator' => $apto->elevator,
                    'address' => $apto->address,
                    'city' => $apto->city,
                    'state' => $apto->state,
                    'description' => $apto->description,
                    'price' => $apto->price,
                    'n_rooms' => $apto->n_rooms,
                    'n_baths' => $apto->n_baths,
                    'n_parking' => $apto->n_parking,
                    'type' => $apto->type,
                    'meters' => $apto->meters,
                    'status' => $apto->status
                ]
            ], 200);
        } else {
            return response()->json(['error' => 'Apartamento no encontrado'], 404);
        }
    }

    // Guardar apartamento
    public function store(Request $request)
    {
        $apto = Apartamento::firstOrCreate(
            ['code' => $request->code],
            [
                'name' => $request->name,
                'floor' => $request->floor,
                'p_supply' => $request->p_supply,
                'elevator' => $request->elevator,
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

        // Comprobar si ya existe el apartamento
        if ($apto->wasRecentlyCreated) {
            return response()->json([
                'status' => 200,
                'message' => 'Apartamento creado correctamente',
                'apartamento' => [
                    'id' => $apto->id,
                    'name' => $apto->name,
                    'code' => $apto->code,
                    'floor' => $apto->floor,
                    'p_supply' => $apto->p_supply,
                    'elevator' => $apto->elevator,
                    'address' => $apto->address,
                    'city' => $apto->city,
                    'state' => $apto->state,
                    'description' => $apto->description,
                    'price' => $apto->price,
                    'n_rooms' => $apto->n_rooms,
                    'n_baths' => $apto->n_baths,
                    'n_parking' => $apto->n_parking,
                    'type' => $apto->type,
                    'meters' => $apto->meters,
                    'status' => $apto->status
                ]
            ], 200);
        } else {
            return response()->json([
                'status' => 409,
                'message' => 'El apartamento ya existe',
            ], 409);
        }
    }

    // Actualizar apartamento
    public function update(Request $request, $id)
    {
        $apto = Apartamento::find($id);
        if (!$apto) {
            return response()->json([
                'status' => 404,
                'message' => 'Apartamento no encontrado'
            ], 404);
        }

        $apto->name = $request->name;
        $apto->code = $request->code;
        $apto->floor = $request->floor;
        $apto->p_supply = $request->p_supply;
        $apto->elevator = $request->elevator;
        $apto->address = $request->address;
        $apto->city = $request->city;
        $apto->state = $request->state;
        $apto->description = $request->description;
        $apto->price = $request->price;
        $apto->n_rooms = $request->n_rooms;
        $apto->n_baths = $request->n_baths;
        $apto->n_parking = $request->n_parking;
        $apto->type = $request->type;
        $apto->meters = $request->meters;
        $apto->status = $request->status;

        $apto->save();

        return response()->json([
            'status' => 200,
            'message' => 'Apartamento actualizado correctamente',
            'apto$apto' => [
                'id' => $apto->id,
                'name' => $apto->name,
                'code' => $apto->code,
                'address' => $apto->address,
                'city' => $apto->city,
                'state' => $apto->state,
                'description' => $apto->description,
                'price' => $apto->price,
                'n_rooms' => $apto->n_rooms,
                'n_baths' => $apto->n_baths,
                'n_parking' => $apto->n_parking,
                'type' => $apto->type,
                'meters' => $apto->meters,
                'status' => $apto->status
            ]
        ], 200);
    }

    // Eliminar apartamento
    public function destroy($id)
    {
        $apto = Apartamento::find($id);
        if ($apto) {
            $apto->delete();
            return response()->json([
                'status' => 200,
                'message' => 'Apartamento eliminado correctamente'
            ], 200);
        } else {
            return response()->json(['error' => 'Apartamento no encontrado'], 404);
        }
    }
}
