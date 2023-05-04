<div class="modal" id="payment" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Registrar pago</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form action="/payments/store" method="POST">
                <input type="hidden" name="id_sale" value="{{ get('ticket') }}">

                <div class="modal-body">
                    <div class="form-group">
                        <label for="amount">Monto</label>
                        <input type="text" class="form-control" name="amount" required>
                    </div>

                    <div class="form-group">
                        <label for="method">Método de pago</label>
                        <select name="method" required class="form-control">
                            <option value=""></option>

                            @foreach($methods as $method)
                                <option value="{{ $method->name }}">{{ $method->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>