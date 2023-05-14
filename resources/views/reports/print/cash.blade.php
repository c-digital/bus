<style>
	table,
	thead,
	tr,
	th,
	tbody,
	td {
		border: 1px solid black;
		border-collapse: collapse;
		text-align: center;
	}

	table {
		width: 100%;
		margin-bottom: 30px;
	}

	button {
		margin-bottom: 30px;
	}

	@media print {
		button {
			display: none;
		}
	}

	.col {
		width: 49.8%;
		display: inline-block;
	}

	.row {
    	white-space: nowrap;
	}
</style>

<button onclick="window.print()">Imprimir</button>

<table>
	<thead>
		<tr>
			<th colspan="2">
				<img width="100px" src="/resources/assets/img/{{ $company->logo }}" alt="">
			</th>

			<th colspan="3">{{ $company->name }}</th>
		</tr>

		<tr>
			<th>Dirección</th>
			<th>NIT</th>
			<th>Correo electrónico</th>
			<th>Teléfono</th>
		</tr>
	</thead>

	<tbody>
		<tr>
			<td>{{ $company->address }}</td>
			<td>{{ $company->nit }}</td>
			<td>{{ $company->email }}</td>
			<td>{{ $company->phone }}</td>
		</tr>
	</tbody>
</table>

<table>
	<thead>
		<tr>
			<th>Fecha desde</th>
			<th>Fecha hasta</th>
			<th>Usuario</th>
		</tr>
	</thead>

	<tbody>
		<tr>
			<td>{{ request('start') }}</td>
			<td>{{ request('end') }}</td>
			<td>{{ $user->name }}</td>
		</tr>
	</tbody>
</table>

<table>
	<thead>
		<tr>
			<th colspan="5">Movimientos</th>	
		</tr>

		<tr>
			<th>Fecha</th>
			<th>Método de pago</th>
			<th>Descripción</th>
			<th>Tipo</th>
			<th>Monto</th>
		</tr>
	</thead>

	<tbody>
		@foreach($items as $item)
			<tr>
				<td>{{ $item->date }}</td>
				<td>{{ $item->method }}</td>
				<td>{{ $item->description }}</td>
				<td>{{ $item->type }}</td>
				<td>{{ number_format($item->amount, 2) }}</td>
			</tr>
		@endforeach
	</tbody>
</table>

<div class="row">
	<div class="col">
		<table>
			<thead>
				<tr>
					<th colspan="2">Entradas</th>
				</tr>
			</thead>

			<tbody>
				@foreach($methods as $method)
					<tr>
						<td>{{ $method->name }}</td>
						<td>{{ number_format($items->where('method', $method->name)->where('type', 'Entrada')->sum('amount'), 2) }}</td>
					</tr>
				@endforeach

				<tr>
					<td>Total</td>
					<td>{{ number_format($items->where('type', 'Entrada')->sum('amount'), 2) }}</td>
				</tr>
			</tbody>
		</table>	
	</div>

	<div class="col">
		<table>
			<thead>
				<tr>
					<th colspan="2">Salidas</th>
				</tr>
			</thead>

			<tbody>
				@foreach($methods as $method)
					<tr>
						<td>{{ $method->name }}</td>
						<td>{{ number_format($items->where('method', $method->name)->where('type', 'Salida')->sum('amount'), 2) }}</td>
					</tr>
				@endforeach

				<tr>
					<td>Total</td>
					<td>{{ number_format($items->where('type', 'Salida')->sum('amount'), 2) }}</td>
				</tr>
			</tbody>
		</table>
	</div>
</div>