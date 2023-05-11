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
			<th>Fecha</th>
			<th>Descripción</th>
			<th>Método de pago</th>
			<th>Monto</th>
		</tr>
	</thead>

	<tbody>
		<tr>
			<td>{{ $cash->date }}</td>
			<td>{{ $cash->description }}</td>
			<td>{{ $cash->method }}</td>
			<td>{{ $cash->amount }}</td>
		</tr>
	</tbody>
</table>