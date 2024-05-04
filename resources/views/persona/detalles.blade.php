@extends ('layout.plantilla')
@section ('contenido')

<div class="container d-flex justify-content-center mt-5 ">
    <h1>Detalles de <?= $persona->first()->nombre_completo ?></h1>
</div>

<div class="container pt-5 d-flex justify-content-between ">
    <div class="w-50 pe-5">
        <form action="{{ route('detallesUpdate', $persona->first()->id_persona) }}" method="post">
            {{ csrf_field() }}

            
            <div>
                <span>Nombre Completo:</span>
                <input type="text" class="form-control border-2 border-black rounded-4" value="<?= $persona->first()->nombre_completo ?>" name="nombre" id="nombre">
            </div>
            <div class="mt-2">
                <span>Dirección:</span>
                <textarea class="form-control border-2 border-black rounded-4 " style="height: 7vw;" name="direccion" id="direccion"><?= $persona->first()->direccion ?>
                </textarea>
            </div>
            <div class="mt-2">
                <span>Fecha de Nacimiento:</span>
                <input type="date" class="form-control border-2 border-black rounded-4" value="<?= $persona->first()->fecha_nacimiento ?>" name="fecha" id="fecha">
            </div>

            <div class="d-flex mt-2">
                <div class="me-2 w-50 ">
                    <span>Edad:</span>
                    <input type="number" class="form-control border-2 border-black rounded-4" value="<?= $persona->first()->edad ?>" name="edad" id="edad">
                </div>
                <div class="ms-2 w-50 ">
                    <span>Estado:</span>
                    <select class="form-control border-2 border-black rounded-4" name="estado" id="estado">
                        <option value="<?= $persona->first()->id_estado ?>" selected><?= $persona->first()->nombre_estado ?></option>
                        @foreach ($estado as $item)
                            <option value="<?= $item->id_estado ?>"><?= $item->nombre ?></option>
                    @endforeach
                    </select>
                </div>
            </div>

            <div class="mt-2">
                <span>Rol:</span>
                <select class="form-control border-2 border-black rounded-4" name="rol" id="rol">
                    <option value="<?= $persona->first()->id_rol ?>" selected><?= $persona->first()->nombre_rol ?></option>
                    @foreach ($rol as $item)
                            <option value="<?= $item->id_rol ?>"><?= $item->nombre ?></option>
                    @endforeach
                </select>
            </div>

            <div class="mt-4 d-flex justify-content-center ">
                <input type="submit" class="btn btn-success w-25 " value="Actualizar">
                <a href="{{route('detallesDestroy', $persona->first()->id_persona )}}" class="btn btn-danger w-25 ms-5 ">Eliminar</a>
            </div>
        </form>
    </div>
</div>