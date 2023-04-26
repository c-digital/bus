<x-template-dashboard active="assign" title="Crear asignación">
    <div class="w-full p-3">
        <form action="/assign/store" method="POST" enctype="multipart/form-data">
            <x-alert/>

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
                                <option value="{{ $driver->id }}">{{ $driver->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="vehicle">Conductor</label>
                        <select name="vehicle" class="form-control">
                            <option value=""></option>
                            @foreach($vehicles as $vehicle)
                                <option value="{{ $vehicle->id }}">{{ $vehicle->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="travel">Conductor</label>
                        <select name="travel" class="form-control">
                            <option value=""></option>
                            @foreach($travels as $travel)
                                <option value="{{ $travel->id }}">{{ $travel->name }}</option>
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
