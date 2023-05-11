<x-template-dashboard active="travels" title="Crear viaje">
    <div class="w-full p-3">
        <form action="/travels/store" method="POST" enctype="multipart/form-data">
            <x-alert/>

            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="time">Hora</label>
                        <input type="time" required name="time" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="days">Días de la semana</label>
                        <select name="days[]" multiple class="select2 form-control" required>
                            <option value="monday">Lunes</option>
                            <option value="tuesday">Martes</option>
                            <option value="wednesday">Miércoles</option>
                            <option value="thursday">Jueves</option>
                            <option value="friday">Viernes</option>
                            <option value="saturday">Sábado</option>
                            <option value="sunday">Domingo</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="stops">Paradas</label>
                        <select name="stops[]" multiple class="select2 form-control" required>
                            @foreach($cities as $city)
                                <option value="{{ $city->name }}">{{ $city->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="route">Ruta</label>
                        <select name="route" class="form-control" required>
                            <option value=""></option>

                            @foreach($routes as $route)
                                <option value="{{ $route->id }}">{{ $route->destination . ' x ' . $route->origin }}</option>
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
                        <label for="price">Precio</label>
                        <input type="text" required name="price" class="form-control">
                    </div>

                    <button class="btn btn-primary">Registrar</button>

                    <a href="/travels" class="btn btn-danger">Volver a atrás</a>
                </div>
            </div>
        </form>
    </div>
</x-template-dashboard>
