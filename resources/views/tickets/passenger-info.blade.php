<div class="modal" id="passenger-info" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Info del pasajero</h5>
            </div>

            <div class="modal-body">
                <div class="form-group">
                    <label for="seat">Asiento</label>
                    <input type="text" class="form-control" name="seat" required>
                </div>

                <div class="form-group">
                    <label for="amount">Monto</label>
                    <input type="number" class="form-control" name="amount" required>
                </div>

                <div class="form-group">
                    <label for="ci">C.I.</label>
                    <input type="text" class="form-control" id="passenger-ci" name="ci" required>
                </div>

                <div class="form-group">
                    <label for="name">Nombre</label>
                    <input type="text" class="form-control" name="name" required>
                </div>

                <div class="form-group">
                    <label for="date_birth">Fecha de nacimiento</label>
                    <input type="date" class="form-control" name="date_birth">
                </div>

                <div class="form-group">
                    <label for="age">Edad</label>
                    <input type="text" class="form-control" name="age">
                </div>

                <div class="form-group">
                    <label for="phone">Teléfono</label>
                    <input type="text" class="form-control" name="phone" required>
                </div>

                <div class="form-group">
                    <label for="address">Dirección</label>
                    <input type="text" class="form-control" name="address">
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="save">Guardar cambios</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>