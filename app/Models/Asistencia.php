<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asistencia extends Model
{
    use HasFactory;

    protected $primaryKey = 'dni';

    protected $fillable = [
        'dni',
        'entrada',
        'salida',
    ];

    public function empleado(){
        return $this->belongsTo(Empleado::class);
    }
}
