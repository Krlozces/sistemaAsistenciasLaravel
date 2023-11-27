<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Cargo;
use App\Models\Empresa;
use App\Models\Empleado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class EditarController extends Controller
{
    public function editarRegistro(Request $request, $dni){
        $data = $request->validate([
            "dni"=> ["required", 'regex:/^[0-9]{8}$/', 'max:8'],
            "nombre"=> ["required", 'regex:/^[a-zA-Z\s]+$/'],
            "apellidos"=> ["required", 'regex:/^[a-zA-Z\s]+$/'],
            "id_cargo"=> ["required"],
            "telefono"=> ["required", 'max:9']
        ]);

        $empleado = Empleado::where('dni', $dni)->first();

        $empleado->update($data);
        
        /*$empleado->nombre = $data['nombre'];
        $empleado->apellidos = $data['apellidos'];
        $empleado->id_cargo = $data['id_cargo'];
        $empleado->telefono = $data['telefono'];

        $empleado->save();*/
        return redirect()->route('listar-trabajadores')->with('success', 'Personal actualizado con éxito.');
    }

    public function editarCargo(Request $request, $id_cargo){
        $data = $request->validate([
            'id_cargo' => ['required', 'max:7'],
            'descripcion' => ['required', 'regex:/^[a-zA-Z]+$/']
        ]);

        $cargo = Cargo::where('id_cargo', $id_cargo)->first();

        $cargo->update($data);

        return redirect()->route('cargos')->with('success', 'Cargo actualizado con éxito.');
    }

    public function editarInfo(Request $request, $id_empresa){
        $data = $request->validate([
            'ruc'=> ['required', 'max:12'],
            'nombre'=> ['required'],
            'telefono'=> ['required', 'max:9'],
            'ubicacion'=> ['required']
        ]);

        $info = Empresa::where('id_empresa', $id_empresa)->first();

        $info->update($data);

        return redirect()->route('info')->with('success', 'Información actualizada con éxito.');
    }

    //Editar perfil de usuario
    public function editarPerfil(Request $request, $id){
        $data = $request->validate([
            'name' => ['required', 'regex:/^[a-zA-Z\s]+$/'],
            'email' => ['required', 'email']
        ]);

        $info = User::where('id', $id)->first();

        $info->update($data);

        return redirect()->with('success', 'Perfil actualizado con éxito.');
    }

    //Cambiar contraseña
    public function cambiarPassword(Request $request){
        $data = $request->validate([
            'password' => ['required'],
            'new-password' => ['required', 'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@$!%*?&])([A-Za-z\d$@$!%*?&]|[^ ]){8,15}$/'],
            'confirmed-password' => ['required', 'same:new-password']
        ]);

        $user = Auth::user();
        if (!Hash::check($data['password'], $user->password)) {
            return redirect()->back()->with('error', 'La contraseña actual es incorrecta.');
        }

        if ($data['new-password'] !== $data['confirmed-password']) {
            return redirect()->back()->with('error', 'Las contraseñas nuevas no coinciden.');
        }

        $user->password = Hash::make($data['new-password']);
        
        try{
            $user->save();
            return redirect()->back()->with('success', 'Contraseña actualizada con éxito.');
        }catch(\Exception $e){
            Log::error($e->getMessage());
            return redirect()->with('error', 'Hubo un problema actualizando la contraseña.');
        }    
    }
}
