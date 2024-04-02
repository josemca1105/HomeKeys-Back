<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Casa;
use Illuminate\Support\Facades\File;

class CasaController extends Controller
{
    // Obtener casas
    public function index()
    {
        $casas = Casa::all();
        return response()->json($casas, 200);
    }

    // Obtener casa por ID
    public function show($id)
    {
        $casa = Casa::find($id);
        if ($casa) {
            return response()->json([
                'status' => 200,
                'message' => $casa->codigo,
            ]);
        }
    }

    // Ingresar casas
    public function store(Request $request)
    {

    }
}
