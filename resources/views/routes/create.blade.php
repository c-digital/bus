<x-template-dashboard active="cities" title="Crear ciudad">
    <div class="w-full p-3">
        <form action="/cities/store" method="POST" enctype="multipart/form-data">
            <x-alert/>

            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">Nombre</label>
                        <input type="text" readonly name="name" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="origin">Origen</label>
                        <select name="origin" class="form-control" required>
                            <option value=""></option>

                            @foreach($cities as $city)
                                <option value="{{ $city->name }}">{{ $city->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="destination">Destino</label>
                        <select name="destination" class="form-control" required>
                            <option value=""></option>

                            @foreach($cities as $city)
                                <option value="{{ $city->name }}">{{ $city->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <button class="btn btn-primary">Registrar</button>

                    <a href="/roles" class="btn btn-danger">Volver a atrás</a>
                </div>
            </div>
        </form>
    </div>
</x-template-dashboard>
