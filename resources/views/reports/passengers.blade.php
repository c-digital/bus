<x-template-dashboard active="reports.passengers" title="Reporte de pasajeros">
	<div class="card mt-3">
		<div class="card-body">
			<form target="_blank" action="/reports/print">
				<div class="form-group">
					<label for="travel">Viaje</label>

					<select required name="travel" class="form-control">
						<option value=""></option>

						@foreach($travels as $travel)
							<option value="{{ $travel->id }}">{{ $travel->name }}</option>
						@endforeach
					</select>
				</div>

				<div class="form-group">
					<label for="date">Fecha</label>
					<input required type="date" name="date" class="form-control">
				</div>

				<input type="hidden" name="report" value="passengers">

				<div class="form-group">
					<button type="submit" class="btn btn-primary">Generar reporte</button>
				</div>
			</form>
		</div>
	</div>
</x-template-dashboard>