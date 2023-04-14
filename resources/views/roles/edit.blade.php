<x-template-dashboard active="roles" title="Editar role">
    <div class="w-full p-3">
        <form action="/roles/update" method="POST" enctype="multipart/form-data">
            <x-alert/>

            <input type="hidden" name="id" value="{{ $role->id }}">

            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">Nombre</label>
                        <input type="text" required class="form-control" value="{{ $role->name }}" name="name">
                    </div>               

                    <div class="form-group">
                        <label for="description">Descripción</label>
                        <input type="text" required class="form-control" value="{{ $role->description }}" name="description">
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
                                    <td><input {{ hasPermission($role->id, permission_id($module->module, 'index')) ? 'checked' : '' }} type="checkbox" name="permissions[]" value="{{ permission_id($module->module, 'index') }}"></td>
                                    <td><input {{ hasPermission($role->id, permission_id($module->module, 'create')) ? 'checked' : '' }} type="checkbox" name="permissions[]" value="{{ permission_id($module->module, 'create') }}"></td>
                                    <td><input {{ hasPermission($role->id, permission_id($module->module, 'edit')) ? 'checked' : '' }} type="checkbox" name="permissions[]" value="{{ permission_id($module->module, 'edit') }}"></td>
                                    <td><input {{ hasPermission($role->id, permission_id($module->module, 'delete')) ? 'checked' : '' }} type="checkbox" name="permissions[]" value="{{ permission_id($module->module, 'delete') }}"></td>
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
