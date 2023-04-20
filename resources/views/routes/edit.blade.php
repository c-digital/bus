<x-template-dashboard active="routes" title="Editar ruta">
    <div class="w-full p-3">
        <form action="/routes/update" method="POST" enctype="multipart/form-data">
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

                    <div class="form-group">
                        <label for="status">Estado</label>

                        <div>
                            <input {{ $route->status == 'active' ? 'checked' : '' }}} type="radio" name="status" value="active"> Activo
                            <input {{ $route->status == 'inactive' ? 'checked' : '' }}} type="radio" name="status" value="inactive"> Inactivo
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="time">Tiempo de viaje en horas</label>
                        <input value="{{ $route->time }}" type="text" name="time" required class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="distance">Distancia en km</label>
                        <input value="{{ $route->distance }}" type="text" name="distance" required class="form-control">
                    </div>

                    <button class="btn btn-primary">Registrar</button>

                    <a href="/roles" class="btn btn-danger">Volver a atrás</a>
                </div>
            </div>
        </form>
    </div>
</x-template-dashboard>
