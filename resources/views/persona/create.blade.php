@extends ('layout.plantilla')
@section ('contenido')

<div class="container d-flex justify-content-center mt-5 ">
    <h1>Registro de Alumnos y Maestros</h1>
</div>

<div class="container pt-5 d-flex justify-content-between ">
    <div class="w-50 pe-5">
        <form action="{{ route('crear', $persona->first()->id_persona ) }}" method="post">
            {{ csrf_field() }}
            <div>
                <span>Nombre Completo:</span>
                <input type="text" class="form-control border-2 border-black rounded-4" name="nombre" id="nombre">
            </div>
            <div class="mt-2">
                <span>Dirección:</span>
                <textarea class="form-control border-2 border-black rounded-4 " style="height: 7vw;" name="direccion" id="direccion"></textarea>
            </div>
            <div class="mt-2">
                <span>Fecha de Nacimiento:</span>
                <input type="date" class="form-control border-2 border-black rounded-4" name="fecha" id="fecha">
            </div>

            <div class="d-flex mt-2">
                <div class="me-2 w-50 ">
                    <span>Edad:</span>
                    <input type="number" class="form-control border-2 border-black rounded-4" name="edad" id="edad">
                </div>
                <div class="ms-2 w-50 ">
                    <span>Estado:</span>
                    <select class="form-control border-2 border-black rounded-4" name="estado" id="estado">
                        <option selected>Seleccione...</option>
                        @foreach ($estado as $item)
                            <option value="<?= $item->id_estado ?>"><?= $item->nombre ?></option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="mt-2">
                <span>Rol:</span>
                <select class="form-control border-2 border-black rounded-4" name="rol" id="rol">
                    <option selected>Seleccione...</option>
                    @foreach ($rol as $item)
                            <option value="<?= $item->id_rol ?>"><?= $item->nombre ?></option>
                    @endforeach
                </select>
            </div>

            <div class="mt-4 d-flex justify-content-center ">
                <input type="submit" class="btn btn-primary  w-25 " value="Crear">
            </div>
        </form>
    </div>

    <div class="w-50 ps-5 overflow-auto" style="height: 32vw;">
        <table class="table table-striped ">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Rol</th>
                    <th scope="col">Acción</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($persona as $item)
                    <tr>
                        <th scope="row"><?= $item->id_persona ?></th>
                        <td><?= $item->nombre_completo ?></td>
                        <td><?= $item->rol ?></td>
                        <td><a href="{{ route('detalles', $item->id_persona)}}" style="text-decoration: none;">Detalles</a></td>
                    </tr>
                @endforeach
                
            </tbody>
        </table>
    </div>
</div>