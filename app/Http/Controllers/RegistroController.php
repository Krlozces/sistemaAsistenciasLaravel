<?php

namespace App\Http\Controllers;

use App\Models\Cargo;
use App\Models\Empleado;
use Illuminate\Http\Request;

class RegistroController extends Controller
{
    public function registrarTrabajador(Request $request){
        $incomingFields = $request-> validate([
            'dni' => ['required', 'min:8', 'max:8', 'regex:/^[0-9]{8}$/'],
            'nombre' => ['required', 'regex:/^[a-zA-Z\s]+$/'],
            'apellidos' => ['required', 'regex:/^[a-zA-Z\s]+$/'],
            'id_cargo' => ['required'],
            'telefono' => ['required', 'min:9', 'max:9', 'regex:/^[0-9]{9}$/']
        ]);
        Empleado::create($incomingFields);
        return redirect('/trabajadores')->with('success', '¡Registro exitoso!');
    }

    public function registrarCargo(Request $request){
        $incomingFields = $request->validate([
            'id_cargo' => ['required'],
            'descripcion' => ['required', 'regex:/^[a-zA-Z]+$/']
        ]);
        Cargo::create($incomingFields);
        return redirect('/cargos')->with('success','¡Registro exitoso!');
    }
}
