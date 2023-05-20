<x-template-dashboard active="merchandise.index" title="Listado de mercadería">
	<a href="/merchandise/create" class="btn btn-primary btn-sm">Crear mercadería</a>

	<x-alert></x-alert>

	<div class="card">
		<div class="card-body">
			<table class="table table-hover">
				<thead>
					<tr>
						<th>ID</th>
						<th>Mensajero</th>
						<th>Origen</th>
						<th>Destino</th>
						<th>Recibe</th>
						<th>Teléfono recibe</th>
						<th>Facturación</th>
						<th>Total</th>
						<th>Estado</th>
						<th></th>
					</tr>
				</thead>

				<tbody>
					@foreach($merchandise as $item)
						<tr>
							<td>{{ $item->id }}</td>
							<td>{{ json($item->messenger)->name }}</td>
							<td>{{ $item->origin }}</td>
							<td>{{ $item->destination }}</td>
							<td>{{ json($item->receipt)->name }}</td>
							<td>{{ json($item->receipt)->phone }}</td>
							<td>{{ $item->billing }}</td>
							<td>{{ $item->total }}</td>
							<td>{{ $item->status }}</td>
							<td>
								<a target="_blank" href="{{ '/merchandise/show/' . $item->id }}" class="btn btn-info btn-sm">Imprimir</a>

								@if($item->status == 'Abierto')
									<a href="" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="{{ '#assign' . $item->id }}">Asignar a viaje</a>
								@endif

								@if($item->status == 'Asignado')
									<form action="/merchandise/update" method="POST">
										<input type="hidden" name="id" value="{{ $item->id }}">
										<input type="hidden" name="delivered" value="1">

										<input type="submit" class="btn btn-success btn-sm" value="Marcar como entregado">
									</form>
								@endif

								<a onclick="confirmDelete(event, this)" href="{{ '/merchandise/delete/' . $item->id }}" class="btn btn-danger btn-sm">Eliminar</a>
							</td>
						</tr>

						@include('merchandise.assign')
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</x-template-dashboard>