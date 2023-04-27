<x-template-dashboard active="travels" title="Editar viaje">
    <div class="w-full p-3">
        <form action="/travels/update" method="POST" enctype="multipart/form-data">
            <x-alert/>

            <input type="hidden" name="id" value="{{ $travel->id }}">

            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="time">Hora</label>
                        <input type="text" required value="{{ $travel->time }}" name="time" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="days">Días de la semana</label>
                        <select name="days[]" multiple class="select2 form-control" required>
                            <option {{ in_array('monday', json($travel->days)) ? 'selected' : '' }} value="monday">Lunes</option>
                            <option {{ in_array('tuesday', json($travel->days)) ? 'selected' : '' }} value="tuesday">Martes</option>
                            <option {{ in_array('wednesday', json($travel->days)) ? 'selected' : '' }} value="wednesday">Miércoles</option>
                            <option {{ in_array('thursday', json($travel->days)) ? 'selected' : '' }} value="thursday">Jueves</option>
                            <option {{ in_array('friday', json($travel->days)) ? 'selected' : '' }} value="friday">Viernes</option>
                            <option {{ in_array('saturday', json($travel->days)) ? 'selected' : '' }} value="saturday">Sábado</option>
                            <option {{ in_array('sunday', json($travel->days)) ? 'selected' : '' }} value="sunday">Domingo</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="stops">Paradas</label>
                        <select name="stops" multiple class="select2 form-control" required>
                            @foreach($cities as $city)
                                <option {{ in_array($city->name, json($travel->stops)) ? 'selected' : '' }} value="{{ $city->id }}">{{ $city->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="route">Ruta</label>
                        <select name="route" class="form-control" required>
                            <option value=""></option>

                            @foreach($routes as $route)
                                <option {{ $route->id == $travel->id_route ? 'selected' : '' }} value="{{ $route->id }}">{{ $route->destination . ' x ' . $route->origin }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="status">Estado</label>

                        <div>
                            <input {{ $travel->status == 'active' ? 'checked' : '' }} type="radio" name="status" value="active"> Activo
                            <input {{ $travel->status == 'inactive' ? 'checked' : '' }} type="radio" name="status" value="inactive"> Inactivo
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="price">Precio</label>
                        <input type="text" required name="price" class="form-control" value="{{ $travel->price }}">
                    </div>

                    <button class="btn btn-primary">Registrar</button>

                    <a href="/travels" class="btn btn-danger">Volver a atrás</a>
                </div>
            </div>
        </form>
    </div>
</x-template-dashboard>
