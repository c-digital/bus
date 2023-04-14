<x-template-dashboard active="users" title="Editar usuario">
    <div class="w-full p-3">
        <form action="/users/update" method="POST" enctype="multipart/form-data">
            <x-alert/>

            <input type="hidden" name="id" value="{{ $user->id }}">

            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">Nombre</label>
                        <input type="text" required class="form-control" value="{{ $user->name }}" name="name">
                    </div>

                    <div class="form-group">
                        <label for="email">Correo electrónico</label>
                        <input type="email" required class="form-control" value="{{ $user->email }}" name="email">
                    </div>

                    <div class="form-group">
                        <label for="password">Contraseña</label>
                        <input type="password" required class="form-control" value="" name="password">
                    </div>                    

                    <button class="btn btn-primary">Registrar</button>

                    <a href="/users" class="btn btn-danger">Volver a atrás</a>
                </div>
            </div>
        </form>
    </div>
</x-template-dashboard>
