<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Mercadería</title>

	<style>
		.text-center {
			text-align: center;
		}

		.font-weight-bold {
			font-weight: bold;
		}

		table, tr, th, td {
			border: 1px solid black;
			border-collapse: collapse;
		}

		table {
			margin: 10px auto 10px auto;
		}

		td, th {
			padding: 5px;
		}
	</style>

</head>
<body>
	<div class="text-center">
		<button onclick="window.print()">Imprimir</button>

		<div><span class="font-weight-bold">Mercadería Nro:</span> {{ $merchandise->id }}</div>

		<hr>

		@if(isset($tickets[0]->company->logo))
			<img width="300px" src="{{ '/resources/assets/img/' . $merchandise->company->logo }}" alt="{{ $merchandise->company->name }}">
		@endif

		<div class="font-weight-bold">{{ $merchandise->company->name }}</div>
		<div><span class="font-weight-bold">NIT:</span> {{ $merchandise->company->nit }}</div>
		<div><span class="font-weight-bold">Dirección:</span> {{ $merchandise->company->address }}</div>

		<hr>

		<table>
			<tr>
				<th colspan="3">{{ 'Mensajero' }}:</th>
			</tr>

			<tr>
				<th>{{ 'Nombre' }}</th>
				<th>{{ 'CI' }}</th>
				<th>{{ 'Teléfono' }}</th>
			</tr>

			<tr>
				<td>{{ json($merchandise->messenger)->name }}</td>
				<td>{{ json($merchandise->messenger)->national_identification }}</td>
				<td>{{ json($merchandise->messenger)->phone }}</td>
			</tr>
		</table>

		<table>
			<tr>
				<th colspan="3">{{ 'Paquete' }}:</th>
			</tr>

			<tr>
				<th>{{ 'Origen' }}</th>
				<th>{{ 'Destino' }}</th>
				<th>{{ 'Descripción' }}</th>
				<th>{{ 'Peso' }}</th>
				<th>{{ 'Peso por kg' }}</th>
				<th>{{ 'Precio' }}</th>
			</tr>

			<tr>
				<td>{{ $merchandise->origin }}</td>
				<td>{{ $merchandise->destination }}</td>
				<td>{{ $merchandise->description }}</td>
				<td>{{ $merchandise->weight }}</td>
				<td>{{ $merchandise->kg }}</td>
				<td>{{ $merchandise->price }}</td>
			</tr>
		</table>

		<table>
			<tr>
				<th colspan="3">{{ 'Recibe' }}:</th>
			</tr>

			<tr>
				<th>{{ 'Nombre' }}</th>
				<th>{{ 'CI' }}</th>
				<th>{{ 'Teléfono' }}</th>
			</tr>

			<tr>
				<td>{{ json($merchandise->receipt)->name }}</td>
				<td>{{ json($merchandise->receipt)->email }}</td>
				<td>{{ json($merchandise->receipt)->phone }}</td>
			</tr>
		</table>

		<table>
			<tr>
				<th colspan="3">{{ 'Facturación' }}</th>
			</tr>

			<tr>
				<th>Tipo</th>
				<th>Descuento</th>
				<th>Total</th>

				@if($merchandise->billing == 'Pagado')
					<tr>Método de pago</tr>
				@endif
			</tr>

			<tr>
				<td>{{ $merchandise->billing }}</td>
				<td>{{ $merchandise->discount }}</td>
				<td>{{ $merchandise->total }}</td>

				@if($merchandise->billing == 'Pagado')
					<td>{{ $merchandise->method }}</td>
				@endif
			</tr>
		</table>

		<hr>

		<div><span class="font-weight-bold">{{ 'Fecha' }}:</span> {{ date_format(date_create($merchandise->date_create), 'd/m/Y h:i A') }}</div>
		<div><span class="font-weight-bold">{{ 'Agente' }}:</span> {{ $merchandise->user->name }}</div>
	</div>
</body>
</html>