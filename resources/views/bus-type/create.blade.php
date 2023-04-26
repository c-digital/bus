<x-template-dashboard active="bus-type" title="Crear tipo de bus">
    <div class="w-full p-3">
        <form action="/bus-type/store" method="POST" enctype="multipart/form-data">
            <x-alert/>

            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="type">Tipo</label>
                                <input type="text" required name="type" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="design">Diseño</label>
                                <select name="design" class="form-control" required>
                                    <option value="2-2">2-2</option>
                                    <option value="1-1">1-1</option>
                                    <option value="2-1">2-1</option>
                                    <option value="1-2">1-2</option>
                                    <option value="3-2">3-2</option>
                                    <option value="2-3">2-3</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="total_seats">Total de asientos</label>
                                <input type="text" required name="total_seats" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="seats_number">Número de asientos</label>
                                <textarea name="seats_number" required class="form-control"></textarea>
                                <label class="text-danger">Valores separados por coma</label>
                            </div>

                            <div class="form-group">
                                <label for="status">Estado</label>

                                <div>
                                    <input type="radio" name="status" value="active"> Activo
                                    <input type="radio" name="status" value="inactive"> Inactivo
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 ml-5 design"></div>
                    </div>

                    <button class="btn btn-primary">Registrar</button>

                    <a href="/bus-type" class="btn btn-danger">Volver a atrás</a>
                </div>
            </div>
        </form>
    </div>
</x-template-dashboard>
