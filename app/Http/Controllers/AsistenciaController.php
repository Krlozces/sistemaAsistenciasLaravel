<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use App\Models\Asistencia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class AsistenciaController extends Controller
{
    
    public function marcarAsistencia(Request $request) {
        $necesitasGuardarImagen = False;
        $customMessages = [
            'required' => ':attribute requerido.',
        ];
    
        $incomingFields = $request->validate([
            'dni' => ['required', 'min:8', 'max:8'],
            'marcar' => 'required|in:entrada,salida',
        ], $customMessages);
    
        $empleado = Empleado::where('dni', $incomingFields['dni'])->first();
    
        if ($empleado) {
            $hoy = now()->format('Y-m-d');
    
            $registroEntrada = Asistencia::where('dni', $incomingFields['dni'])
                ->whereNotNull('entrada')
                ->whereDate('entrada', $hoy)
                ->first();
    
            if ($incomingFields['marcar'] === 'entrada') {
                if ($registroEntrada) {
                    return back()->with('error', 'Ya has registrado una entrada hoy.');
                } else {
                    $asistencia = new Asistencia();
                    $asistencia->dni = $incomingFields['dni'];
                    // $asistencia->marcar = 'entrada';
                    $asistencia->entrada = now();
                    //$asistencia->save();
                    $necesitasGuardarImagen = True;
                    if ($necesitasGuardarImagen) {
                        try {
                            $imagenBinaria = $request->input('imagen');
                            $imagenData = strpos($imagenBinaria, ',') !== false ? substr($imagenBinaria, strpos($imagenBinaria, ',') + 1) : $imagenBinaria;
                            $imagenData = base64_decode($imagenData);
                        
                            if ($imagenData === false) {
                                throw new \Exception('Base64_decode falló');
                            }
                        
                            $nombreArchivo = uniqid() . '.png';
                            Storage::disk('public')->put('imagenes/' . $nombreArchivo, $imagenData);
                            
                            Log::info('Imagen guardada con éxito: ' . 'imagenes/' . $nombreArchivo);
                            Log::info('Longitud de la cadena Base64 recibida: ' . strlen($request->input('imagen')));

                            $asistencia->ruta_imagen = 'imagenes/' . $nombreArchivo;
                            $asistencia->save();
                        } catch (\Exception $e) {
                            return response()->json(['error' => 'Error al guardar la imagen: ' . $e->getMessage()]);
                        }
                    }
                    return response()->json(['mensaje' => 'Imagen guardada con éxito', 'ruta' => $nombreArchivo]);
                    /*return back()->with([
                        'success', 'Entrada registrada correctamente.',
                        'reload', true,
                        'reloadTimeout' => 5000,
                    ]);*/
                }
            } elseif ($incomingFields['marcar'] === 'salida') {
                if (!$registroEntrada) {
                    return back()->with('error', 'Primero registra una entrada.');
                }
    
                $registroSalida = Asistencia::where('dni', $incomingFields['dni'])
                    ->whereNotNull('salida')
                    ->whereDate('salida', $hoy)
                    ->first();
    
                if ($registroSalida) {
                    return back()->with('error', 'Ya has registrado una salida hoy.');
                } else {
                    // $registroEntrada->marcar = 'salida';
                    $registroEntrada->salida = now();
                    $registroEntrada->save();
                    return back()->with('success', 'Salida registrada correctamente.');
                }
            }
        } else {
            return back()->with('error', 'Ingrese un número de DNI válido.');
        }
    }
}