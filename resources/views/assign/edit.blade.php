<x-template-dashboard active="assign" title="Editar asignación">
    <div class="w-full p-3">
        <form action="/assign/update" method="POST" enctype="multipart/form-data">
            <x-alert/>

            <input type="hidden" name="id" value="{{ $assign->id }}">

            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="date">Fecha</label>
                        <input type="date" required name="date" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="driver">Conductor</label>
                        <select name="driver" class="form-control">
                            <option value=""></option>
                            @foreach($drivers as $driver)
                                <option {{ $driver->id == $assign->driver->id ? 'selected' : '' }} value="{{ $driver->id }}">{{ $driver->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="vehicle">Vehículo</label>
                        <select name="vehicle" class="form-control">
                            <option value=""></option>
                            @foreach($vehicles as $vehicle)
                                <option {{ $vehicle->id == $assign->vehicle->id ? 'selected' : '' }} value="{{ $vehicle->id }}">{{ $vehicle->internal_number . ' - ' . $vehicle->type->type . ' - ' . $vehicle->plate }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="travel">Viaje</label>
                        <select name="travel" class="form-control">
                            <option value=""></option>
                            @foreach($travels as $travel)
                                <option {{ $travel->id == $assign->travel->id ? 'selected' : '' }} value="{{ $travel->id }}">{{ $travel->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <button class="btn btn-primary">Registrar</button>

                    <a href="/assign" class="btn btn-danger">Volver a atrás</a>
                </div>
            </div>
        </form>
    </div>
</x-template-dashboard>
