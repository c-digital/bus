<x-template-dashboard active="routes" title="Crear ruta">
    <div class="w-full p-3">
        <form action="/routes/store" method="POST" enctype="multipart/form-data">
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

                    <div class="form-group">
                        <label for="status">Estado</label>

                        <div>
                            <input type="radio" name="status" value="active"> Activo
                            <input type="radio" name="status" value="inactive"> Inactivo
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="time">Tiempo de viaje en horas</label>
                        <input type="text" name="time" required class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="distance">Distancia en km</label>
                        <input type="text" name="distance" required class="form-control">
                    </div>

                    <button class="btn btn-primary">Registrar</button>

                    <a href="/roles" class="btn btn-danger">Volver a atrás</a>
                </div>
            </div>
        </form>
    </div>
</x-template-dashboard>
