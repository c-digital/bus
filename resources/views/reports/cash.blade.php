<x-template-dashboard active="reports.cash" title="Reporte de caja">
	<div class="card mt-3">
		<div class="card-body">
			<form target="_blank" action="/reports/print">
				<div class="form-group">
					<label for="date">Fecha desde</label>
					<input required type="date" name="start" class="form-control">
				</div>

				<div class="form-group">
					<label for="date">Fecha hasta</label>
					<input required type="date" name="end" class="form-control">
				</div>

				<div class="form-group">
					<label for="user">Usuario</label>
					<select name="user" required class="form-control">
						<option value=""></option>
						@foreach($users as $user)
							<option value="{{ $user->id }}">{{ $user->name }}</option>
						@endforeach
					</select>
				</div>

				<input type="hidden" name="report" value="cash">

				<div class="form-group">
					<button type="submit" class="btn btn-primary">Generar reporte</button>
				</div>
			</form>
		</div>
	</div>
</x-template-dashboard>