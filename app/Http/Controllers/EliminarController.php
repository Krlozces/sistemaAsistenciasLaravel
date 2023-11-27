<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Cargo;
use App\Models\Empleado;
use App\Models\Asistencia;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class EliminarController extends Controller
{
    public function eliminarRegistro($dni){
        try {
            $registro = Empleado::where('dni', $dni)->first();
    
            if ($registro) {
                $registro->delete();
                return redirect()->route('listar-trabajadores')->with('success', 'Registro eliminado con éxito.');
            } else {
                return redirect()->route('listar-trabajadores')->with('error', 'El registro no se encontró y no se pudo eliminar.');
            }
        } catch (ModelNotFoundException $e) {
            return redirect()->route('listar-trabajadores')->with('error', 'Error al eliminar el registro.');
        }
    }

    public function eliminarCargo($id_cargo){
        try {
            $registro = Cargo::where('id_cargo', $id_cargo)->first();
    
            if ($registro) {
                $registro->delete();
                return redirect()->route('cargos')->with('success', 'Registro eliminado con éxito.');
            } else {
                return redirect()->route('cargos')->with('error', 'El registro no se encontró y no se pudo eliminar.');
            }
        } catch (ModelNotFoundException $e) {
            return redirect()->route('cargos')->with('error', 'Error al eliminar el registro.');
        }
    }

    public function eliminarUser($id){
        try{
            $registro = User::where('id', $id)->first();
    
            if ($registro) {
                $registro->delete();
                return redirect()->route('listar-usuarios')->with('success', 'Registro eliminado con éxito.');
            } else {
                return redirect()->route('listar-usuarios')->with('error', 'El registro no se encontró y no se pudo eliminar.');
            }
        }catch(ModelNotFoundException $e){
            return redirect()->route('listar-usuarios')->with('error', 'Error al eliminar el registro.');
        }
    }

    public function eliminarRegistroAsistencia($dni){
        try {
            $registro = Asistencia::where('dni', $dni)->first();
    
            if ($registro) {
                $registro->delete();
                return redirect()->route('home')->with('success', 'Registro eliminado con éxito.');
            } else {
                return redirect()->route('home')->with('error', 'El registro no se encontró y no se pudo eliminar.');
            }
        } catch (ModelNotFoundException $e) {
            return redirect()->route('home')->with('error', 'Error al eliminar el registro.');
        }
    }
}
