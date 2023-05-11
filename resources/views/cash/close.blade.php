<style>
	table,
	thead,
	tr,
	th,
	tbody,
	td {
		border: 1px solid black;
		border-collapse: collapse;
	}
</style>

<table>
	<thead>
		<tr>
			<th colspan="4">Movimientos</th>
		</tr>

		<tr>
			<th>Fecha</th>
			<th>Descripción</th>
			<th>Método de pago</th>
			<th>Monto</th>
		</tr>
	</thead>

	<tbody>
		@foreach($cash as $item)
			<tr>
				<td>{{ $item->date }}</td>
				<td>{{ $item->description }}</td>
				<td>{{ $item->method }}</td>
				<td>{{ $item->amount }}</td>
			</tr>
		@endforeach
	</tbody>
</table>

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
				<td>{{ number_format($cash->where('method', $method->name)->where('type', 'Entrada')->sum('amount'), 2) }}</td>
			</tr>
		@endforeach
	</tbody>
</table>

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
				<td>{{ number_format($cash->where('method', $method->name)->where('type', 'Salida')->sum('amount'), 2) }}</td>
			</tr>
		@endforeach
	</tbody>
</table>