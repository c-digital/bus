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

<button type="button" onclick="window.print()">Imprimir</button>

<br><br>

<table>
	<thead>
		<tr>
			<th colspan="2">
				<img width="100px" src="/resources/assets/img/{{ $cash[0]->company->logo }}" alt="">
			</th>

			<th colspan="3">{{ $cash[0]->company->name }}</th>
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
			<td>{{ $cash[0]->company->address }}</td>
			<td>{{ $cash[0]->company->nit }}</td>
			<td>{{ $cash[0]->company->email }}</td>
			<td>{{ $cash[0]->company->phone }}</td>
		</tr>
	</tbody>
</table>

<br>

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