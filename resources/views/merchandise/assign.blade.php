<div class="modal" id="{{ 'assign' . $item->id }}" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="/merchandise/update" method="POST">
                <input required type="hidden" name="id" value="{{ $merchandise->id }}">

                <div class="modal-header">
                    <h5 class="modal-title">Asignar a viaje</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                
                <div class="modal-body">
                    <label for="id_assign">Viaje</label>
                    <select name="id_assign" required class="form-control">
                        <option value=""></option>

                        @foreach($assign as $item)
                            <option value="{{ $item->id }}">
                                {{ $item->date . ' ' . $item->travel->time . ' - ' . $item->travel->route->origin . ' x ' . $item->travel->route->destination }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary">Guardar cambios</button>
                </div>
            </form>
        </div>
    </div>
</div>