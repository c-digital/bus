<x-template-dashboard active="vehicle" title="Crear vehículo">
    <div class="w-full p-3">
        <form action="/vehicle/store" method="POST" enctype="multipart/form-data">
            <x-alert/>

            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="internal_number">Número interno</label>
                        <input type="text" required name="internal_number" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="type">Tipo</label>
                        <select name="type" class="form-control" required>
                            @foreach($types as $type)
                                <option value="{{ $type->id }}">{{ $type->type }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="plate">Placa</label>
                        <input type="text" required name="plate" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="year">Año</label>
                        <input type="text" required name="year" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="model">Modelo</label>
                        <input type="text" required name="model" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="chasis_number">Número de chasis</label>
                        <input type="text" required name="chasis_number" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="owner">Propietario</label>
                        <input type="text" required name="owner" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="owner_phone">Teléfono del propietario</label>
                        <input type="text" required name="owner_phone" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="status">Estado</label>

                        <div>
                            <input type="radio" name="status" value="active"> Activo
                            <input type="radio" name="status" value="inactive"> Inactivo
                        </div>
                    </div>

                    <button class="btn btn-primary">Registrar</button>

                    <a href="/vehicle" class="btn btn-danger">Volver a atrás</a>
                </div>
            </div>
        </form>
    </div>
</x-template-dashboard>
