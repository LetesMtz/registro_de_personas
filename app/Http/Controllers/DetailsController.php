<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Persona;
use App\Models\Rol;
use App\Models\Estado;

class DetailsController extends Controller
{
    public function index(int $id)
    {
        $persona = Persona::select('persona.id_persona', 'persona.nombre_completo', 'persona.direccion', 'persona.fecha_nacimiento', 'persona.edad', 
        'estado.id_estado', 'estado.nombre as nombre_estado', 'rol.id_rol', 'rol.nombre as nombre_rol')
        ->join('estado', 'persona.id_estado', '=', 'estado.id_estado')
        ->join('rol', 'persona.id_rol', '=', 'rol.id_rol')
        ->where('persona.id_persona', $id)
        ->get();

        $rol = Rol::all();

        $estado = Estado::all();

        return view('persona.detalles', compact('persona', 'rol', 'estado'));
    }

    public function update(int $id, Request $request)
    {

        $persona = Persona::findOrFail($id);
        $persona->id_rol = $request->rol;
        $persona->id_estado = $request->estado;
        $persona->nombre_completo = $request->nombre;
        $persona->direccion = $request->direccion;
        $persona->fecha_nacimiento = $request->fecha;
        $persona->edad = $request->edad;

        $persona->save();

        return redirect()->action([CreateController::class, 'index']);
    }

    public function destroy(int $id)
    {
        Persona::find($id)->delete();
        
        return redirect()->action([CreateController::class, 'index']);
    }
}
