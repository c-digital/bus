<x-template-dashboard active="cash" title="Caja">
	<x-alert></x-alert>

	<div class="row">
		<div class="col">
			<div class="card bg-success text-white">
				<div class="card-body">
					<i class="fa fa-arrow-up"></i>

					<div>Entradas: ${{ $income }}</div>
				</div>
			</div>
		</div>

		<div class="col">
			<div class="card bg-danger text-white">
				<div class="card-body">
					<i class="fa fa-arrow-down"></i>

					<div>Salidas: ${{ $out }}</div>
				</div>
			</div>
		</div>

		<div class="col">
			<div class="card bg-info text-white">
				<div class="card-body">
					<i class="fa fa-money-bill"></i>

					<div>Balance: ${{ $balance }}</div>
				</div>
			</div>
		</div>

		<div class="col">
			@if($status == 'Abierta')
				<div class="card bg-info text-white">
					<div class="card-body">
						<i class="fa fa-check"></i>

						<div>Estado de caja: {{ $status }}</div>
					</div>
				</div>
			@else
				<div class="card bg-warning text-white">
					<div class="card-body">
						<i class="fa fa-times"></i>

						<div>Estado de caja: {{ $status }}</div>
					</div>
				</div>
			@endif
		</div>
	</div>

	<div class="text-center mt-3">
		@if($status == 'Cerrada')
			<a href="" data-bs-toggle="modal" data-bs-target="#open" class="btn btn-info">Abrir caja</a>
		@endif

		@if($status == 'Abierta')
			<a href="/cash/create?close=1" class="btn btn-info">Cerrar caja</a>
			<a href="" data-bs-toggle="modal" data-bs-target="#create" class="btn btn-info">Agregar movimiento</a>
		@endif
	</div>

	<div class="card mt-2">
		<div class="card-body">
			<table class="table table-hover">
				<thead>
					<tr>
						<th>ID</th>
						<th>Fecha</th>
						<th>Método de pago</th>
						<th>Monto</th>
						<th>Descripción</th>
						<th></th>
					</tr>
				</thead>

				<tbody>
					@foreach($cash as $item)
						<tr>
							<td>{{ $item->id }}</td>
							<td>{{ $item->date }}</td>
							<td>{{ $item->method }}</td>
							<td>{{ $item->amount }}</td>
							<td>{{ $item->description }}</td>
							<td>
								<a href="{{ '/cash/show/' . $item->id }}" class="btn btn-secondary btn-sm">Ver recibo</a>
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>

	@include('cash.open')
	@include('cash.create')
</x-template-dashboard>