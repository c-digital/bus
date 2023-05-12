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
				<img width="100px" src="/resources/assets/img/{{ $cash->company->logo }}" alt="">
			</th>

			<th colspan="3">{{ $cash->company->name }}</th>
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
			<td>{{ $cash->company->address }}</td>
			<td>{{ $cash->company->nit }}</td>
			<td>{{ $cash->company->email }}</td>
			<td>{{ $cash->company->phone }}</td>
		</tr>
	</tbody>
</table>

<br>

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