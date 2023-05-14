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
			<th colspan="4">Viaje</th>
		</tr>

		<tr>
			<th>Origen</th>
			<th>Destino</th>
			<th>Fecha</th>
			<th>Hora</th>
		</tr>
	</thead>

	<tbody>
		<tr>
			<td>{{ $travel->route->origin }}</td>
			<td>{{ $travel->route->destination }}</td>
			<td>{{ get('date') }}</td>
			<td>{{ $travel->time }}</td>
		</tr>
	</tbody>
</table>

<table>
	<thead>
		<tr>
			<th colspan="3">Conductor</th>
		</tr>

		<tr>
			<th>Nombre</th>
			<th>Número de licencia</th>
			<th>Teléfono</th>
		</tr>
	</thead>

	<tbody>
		<tr>
			<td>{{ $driver->name }}</td>
			<td>{{ $driver->driver_license }}</td>
			<td>{{ $driver->phone }}</td>
		</tr>
	</tbody>
</table>

<table>
	<thead>
		<tr>
			<th colspan="4">Vehículo</th>
		</tr>

		<tr>
			<th>Placa</th>
			<th>Modelo</th>
			<th>Chasis</th>
			<th>Año</th>
		</tr>
	</thead>

	<tbody>
		<tr>
			<td>{{ $vehicle->plate }}</td>
			<td>{{ $vehicle->model }}</td>
			<td>{{ $vehicle->chasis_number }}</td>
			<td>{{ $vehicle->year }}</td>
		</tr>
	</tbody>
</table>

<table>
	<thead>
		<tr>
			<th colspan="6">Pasajeros</th>
		</tr>

		<tr>
			<th>Nombre</th>
			<th>C.I.</th>
			<th>Fecha de nacimiento</th>
			<th>Edad</th>
			<th>Teléfono</th>
			<th>Dirección</th>
		</tr>
	</thead>

	<tbody>
		@foreach($tickets as $ticket)
			<tr>
				<td>{{ $ticket->customer->name }}</td>
				<td>{{ $ticket->customer->ci }}</td>
				<td>{{ $ticket->customer->date_birth }}</td>
				<td>{{ $ticket->customer->age }}</td>
				<td>{{ $ticket->customer->phone }}</td>
				<td>{{ $ticket->customer->address }}</td>
			</tr>
		@endforeach
	</tbody>
</table>