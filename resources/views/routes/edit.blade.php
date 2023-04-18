<x-template-dashboard active="cities" title="Editar ciudad">
    <div class="w-full p-3">
        <form action="/cities/update" method="POST" enctype="multipart/form-data">
            <x-alert/>

            <input type="hidden" name="id" value="{{ $route->id }}">

            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">Nombre</label>
                        <input type="text" readonly name="name" class="form-control" value="{{ $route->origin . ' x ' . $route->destination }}">
                    </div>

                    <div class="form-group">
                        <label for="origin">Origen</label>
                        <select name="origin" class="form-control" required>
                            <option value=""></option>

                            @foreach($cities as $city)
                                <option {{ $route->origin == $city->name ? 'selected' : '' }} value="{{ $city->name }}">{{ $city->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="destination">Destino</label>
                        <select name="destination" class="form-control" required>
                            <option value=""></option>

                            @foreach($cities as $city)
                                <option {{ $route->destination == $city->name ? 'selected' : '' }} value="{{ $city->name }}">{{ $city->name }}</option>
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
