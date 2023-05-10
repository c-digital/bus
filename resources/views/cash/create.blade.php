<div class="modal" id="create" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="/cash/store" method="POST">
                <div class="modal-header">
                    <h5 class="modal-title">Agregar movimiento</h5>
                    
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
            
                <div class="modal-body">
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
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>