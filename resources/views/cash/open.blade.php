<div class="modal" id="open" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="/cash/store?open=1" method="POST">
                <div class="modal-header">
                    <h5 class="modal-title">Abrir caja</h5>
                    
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
            
                <div class="modal-body">
                    <div class="form-group">
                        <label for="amount">Monto</label>
                        <input type="number" name="amount" class="form-control" required>
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