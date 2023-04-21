<x-template-dashboard active="bus-type" title="Editar tipo de bus">
    <div class="w-full p-3">
        <form action="/bus-type/update" method="POST" enctype="multipart/form-data">
            <x-alert/>

            <input type="hidden" required name="id" value="{{ $type->id }}">

            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="type">Tipo</label>
                        <input type="text" required name="type" class="form-control" value="{{ $type->type }}">
                    </div>

                    <div class="form-group">
                        <label for="design">Diseño</label>
                        <select name="design" class="form-control" required>
                            <option {{ $type->design == '2-2' ? 'selected' : '' }} value="2-2">2-2</option>
                            <option {{ $type->design == '1-1' ? 'selected' : '' }} value="1-1">1-1</option>
                            <option {{ $type->design == '2-1' ? 'selected' : '' }} value="2-1">2-1</option>
                            <option {{ $type->design == '1-2' ? 'selected' : '' }} value="1-2">1-2</option>
                            <option {{ $type->design == '3-2' ? 'selected' : '' }} value="3-2">3-2</option>
                            <option {{ $type->design == '2-3' ? 'selected' : '' }} value="2-3">2-3</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="total_seats">Total de asientos</label>
                        <input type="text" required name="total_seats" class="form-control" value="{{ $type->total_seats }}">
                    </div>

                    <div class="form-group">
                        <label for="seats_number">Número de asientos</label>
                        <textarea name="seats_number" required class="form-control">{{ $type->seats_number }}</textarea>
                        <label class="text-danger">Valores separados por coma</label>
                    </div>

                    <div class="form-group">
                        <label for="status">Estado</label>

                        <div>
                            <input {{ $type->status == 'active' ? 'checked' : '' }} type="radio" name="status" value="active"> Activo
                            <input {{ $type->status == 'inactive' ? 'checked' : '' }} type="radio" name="status" value="inactive"> Inactivo
                        </div>
                    </div>

                    <button class="btn btn-primary">Registrar</button>

                    <a href="/bus-type" class="btn btn-danger">Volver a atrás</a>
                </div>
            </div>
        </form>
    </div>
</x-template-dashboard>
