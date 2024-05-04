<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Persona;
use App\Models\Rol;
use App\Models\Estado;

class CreateController extends Controller
{
    public function index()
    {
        $persona = Persona::select('persona.id_persona', 'persona.nombre_completo', 'rol.nombre as rol')
        ->join('rol', 'persona.id_rol', '=', 'rol.id_rol')
        ->get();

        $rol = Rol::all();

        $estado = Estado::all();

        return View('persona.create', compact('persona', 'rol', 'estado'));
    }

    public function store(Request $request)
    {
        $persona = new Persona();
        $persona->id_rol = $request->rol;
        $persona->id_estado = $request->estado;
        $persona->nombre_completo = $request->nombre;
        $persona->direccion = $request->direccion;
        $persona->fecha_nacimiento = $request->fecha;
        $persona->edad = $request->edad;

        $persona->save();

        return redirect()->action([CreateController::class, 'index']);
    }
}
