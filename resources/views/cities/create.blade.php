<x-template-dashboard active="cities" title="Crear ciudad">
    <div class="w-full p-3">
        <form action="/cities/store" method="POST" enctype="multipart/form-data">
            <x-alert/>

            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">Nombre</label>
                        <input type="text" required class="form-control" value="" name="name">
                    </div>

                    <button class="btn btn-primary">Registrar</button>

                    <a href="/roles" class="btn btn-danger">Volver a atrás</a>
                </div>
            </div>
        </form>
    </div>
</x-template-dashboard>
