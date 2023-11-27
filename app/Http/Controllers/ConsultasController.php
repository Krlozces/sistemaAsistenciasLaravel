<?php

namespace App\Http\Controllers;

use App\Models\Cargo;
use App\Models\Empresa;
use App\Models\Empleado;
use App\Models\User;
use Illuminate\Http\Request;

class ConsultasController extends Controller
{
    //Listar cargos
    public function listarCargo(){
        $cargos = Cargo::all();
        return view('cargos', ['cargos' => $cargos]);
    }

    //Listar trabajadores
    public function listarTrabajador(){
        $elementos = Empleado::join('cargos', 'empleados.id_cargo', '=', 'cargos.id_cargo')
        ->select('dni', 'nombre', 'apellidos', 'descripcion', 'telefono')
        ->paginate(10);
        $cargos = Cargo::all();
        return view('trabajadores', ['elementos'=> $elementos, 'cargos'=>$cargos]);
    }

    public function listarAsistencia(){
        $elementos = Empleado::join('asistencias','empleados.dni', '=', 'asistencias.dni')
        ->join('cargos', 'empleados.id_cargo', '=', 'cargos.id_cargo')
        ->select('asistencias.dni', 'apellidos', 'nombre', 'descripcion', 'entrada', 'salida', 'ruta_imagen')
        ->paginate(10);
        return view('home', ['elementos' => $elementos]);
    }

    public function mostrarInfo(){
        $datos = Empresa::all();
        return view('info', ['datos' => $datos]);
    }

    //Listar usuarios
    public function listarUsers(){
        $datos = User::all();
        return view('usuarios', ['datos' => $datos]);
    }

    //filtro búsqueda
    public function search(Request $request){
        $query = $request->input('input');
    
        $results = Empleado::join('asistencias', 'empleados.dni', '=', 'asistencias.dni')
            ->join('cargos', 'empleados.id_cargo', '=', 'cargos.id_cargo')
            ->select('asistencias.dni', 'apellidos', 'nombre', 'descripcion', 'entrada', 'salida')
            ->where(function($q) use ($query) {
                $q->where('empleados.nombre', 'LIKE', "%$query%")
                ->orWhere('empleados.apellidos', 'LIKE', "%$query%")
                ->orWhere('empleados.dni', 'LIKE', "%$query%")
                ->orWhere('cargos.descripcion', 'LIKE', "%$query%")
                ->orWhere('entrada', 'LIKE', "%$query%")
                ->orWhere('salida', 'LIKE', "%$query%");
            })
            ->get();
    
        return response()->json($results);
    }
    
}
