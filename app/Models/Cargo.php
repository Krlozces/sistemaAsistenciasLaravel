<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cargo extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_cargo';
    public $incrementing = false;
    
    protected $fillable = [
        'id_cargo',
        'descripcion',
    ];

    public function empleado(){
        return $this->hasMany(Empleado::class);
    }
}
