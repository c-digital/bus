<x-template-dashboard active="cities" title="Editar ciudad">
    <div class="w-full p-3">
        <form action="/cities/update" method="POST" enctype="multipart/form-data">
            <x-alert/>

            <input type="hidden" name="id" value="{{ $city->id }}">

            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">Nombre</label>
                        <input type="text" required class="form-control" value="{{ $city->name }}" name="name">
                    </div>

                    <button class="btn btn-primary">Registrar</button>

                    <a href="/roles" class="btn btn-danger">Volver a atrás</a>
                </div>
            </div>
        </form>
    </div>
</x-template-dashboard>
