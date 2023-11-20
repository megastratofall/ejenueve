<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Provincia;
class ProvinciaController extends Controller
{
     // Método para procesar el formulario y crear una provincia
    public function create(Request $request)
        {
            try {
                // Validar los datos del formulario
                $request->validate([
                    'detalle' => 'required|string|min:3|max:75|regex:/^[a-zA-Z\s]+$/',
                ]);

                // Verificar si la provincia ya existe
                $existeProvincia = Provincia::where('detalle', $request->detalle)->first();
                if ($existeProvincia) {
                return response()->json(
                [
                'error' => 'La provincia ya existe en la base de datos.',
                ],
                409,
                [],
                JSON_UNESCAPED_UNICODE
                );}

    
                // Crear una nueva provincia en la base de datos
                $provincia = Provincia::create([
                    'detalle' => $request->detalle,
                ]);
    
                // Devolver una respuesta JSON con la provincia creada
                return response()->json([
                    'message' => 'Provincia creada con éxito',
                    'provincia' => utf8_encode($provincia),
                ], 200, [], JSON_UNESCAPED_UNICODE);                

    
            } catch (\Exception $e) {
                // Manejar el error y devolver un mensaje
                return response()->json([
                    'error' => 'Error al procesar la solicitud. Detalles: ' . utf8_encode($e->getMessage()),
                ], 500, [], JSON_UNESCAPED_UNICODE);                
                
            }
    }
}
