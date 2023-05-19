<div class="modal" id="{{ 'assignStatus_' . $item->id }}" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="/assign/update/{{ $item->id }}?status=1" method="POST">
                <div class="modal-header">
                    <h5 class="modal-title">Cambiar estado</h5>
                    
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <div class="form-group">
                        <label for="status">Estado</label>
                        <select name="status" class="form-control" required>
                            <option value=""></option>
                            <option {{ $item->status == 'No iniciado' ? 'selected' : '' }} value="No iniciado">No iniciado</option>
                            <option {{ $item->status == 'Iniciado' ? 'selected' : '' }} value="Iniciado">Iniciado</option>
                            <option {{ $item->status == 'Finalizado' ? 'selected' : '' }} value="Finalizado">Finalizado</option>
                            <option {{ $item->status == 'Cancelado' ? 'selected' : '' }} value="Cancelado">Cancelado</option>
                        </select>
                    </div>

                    <div class="form-group start-container">
                        <label for="start">Hora de inicio</label>
                        <input type="time" class="form-control" required name="start">
                    </div>

                    <div class="form-group end-container">
                        <label for="end">Hora de finalización</label>
                        <input type="time" class="form-control" required name="end">
                    </div>

                    <div class="form-group end-container">
                        <label for="amount">Monto</label>
                        <input type="number" class="form-control" required name="amount">
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Guardar cambios</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </div>
            </form>
        </div>
    </div>
</div>