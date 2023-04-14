<x-template-dashboard active="users" title="Crear usuario">
    <div class="w-full p-3">
        <form action="/users/store" method="POST" enctype="multipart/form-data">
            <x-alert/>

            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">Nombre</label>
                        <input type="text" required class="form-control" name="name">
                    </div>

                    <div class="form-group">
                        <label for="email">Correo electrónico</label>
                        <input type="email" required class="form-control" name="email">
                    </div>

                    <div class="form-group">
                        <label for="password">Contraseña</label>
                        <input type="password" required class="form-control" name="password">
                    </div>                    

                    <button class="btn btn-primary">Registrar</button>

                    <a href="/users" class="btn btn-danger">Volver a atrás</a>
                </div>
            </div>
        </form>
    </div>
</x-template-dashboard>
