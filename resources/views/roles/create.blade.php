<x-template-dashboard active="roles" title="Crear rol">
    <div class="w-full p-3">
        <form action="/roles/store" method="POST" enctype="multipart/form-data">
            <x-alert/>

            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">Nombre</label>
                        <input type="text" required class="form-control" value="" name="name">
                    </div>               

                    <div class="form-group">
                        <label for="description">Descripción</label>
                        <input type="text" required class="form-control" value="" name="description">
                    </div>

                    <div class="form-group">
                        <table class="table">
                            <tr>
                                <th colspan="5">Permisos</th>
                            </tr>

                            <tr>
                                <th>Modulo</th>
                                <th>Ver</th>
                                <th>Crear</th>
                                <th>Editar</th>
                                <th>Eliminar</th>
                            </tr>

                            @foreach($modules as $module)
                                <tr>
                                    <td>{{ $module->module }}</td>
                                    <td><input type="checkbox" name="permissions[]" value="{{ permission_id($module->module, 'index') }}"></td>
                                    <td><input type="checkbox" name="permissions[]" value="{{ permission_id($module->module, 'create') }}"></td>
                                    <td><input type="checkbox" name="permissions[]" value="{{ permission_id($module->module, 'edit') }}"></td>
                                    <td><input type="checkbox" name="permissions[]" value="{{ permission_id($module->module, 'delete') }}"></td>
                                </tr>
                            @endforeach
                        </table>
                    </div>

                    <button class="btn btn-primary">Registrar</button>

                    <a href="/roles" class="btn btn-danger">Volver a atrás</a>
                </div>
            </div>
        </form>
    </div>
</x-template-dashboard>
