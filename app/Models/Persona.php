<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    use HasFactory;

    protected $table='persona';

    protected $primaryKey='id_persona';

    public $timestamps=false;

    protected $fillable=[
        'id_rol',
        'id_estado',
        'nombre_completo',
        'direccion',
        'fecha_nacimiento',
        'edad'
    ];
}
