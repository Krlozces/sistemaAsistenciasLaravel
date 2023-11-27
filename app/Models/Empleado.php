<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    use HasFactory;

    protected $primaryKey = 'dni';

    protected $fillable = [
        'dni',
        'nombre',
        'apellidos',
        'id_cargo',
        'telefono',
    ];

    public function asistencias(){
        return $this->hasMany(Asistencia::class);
    }

    public function cargo(){
        return $this->belongsTo(Cargo::class);
    }
}
