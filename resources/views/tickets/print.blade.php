<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Ticket</title>

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
		<div><span class="font-weight-bold">Venta Nro:</span> {{ $tickets[0]->id_sale }}</div>

		<hr>

		@if(isset($tickets[0]->company->logo))
			<img width="300px" src="{{ '/resources/assets/img/' . $tickets[0]->company->logo }}" alt="{{ $tickets[0]->company->name }}">
		@endif

		<div class="font-weight-bold">{{ $tickets[0]->company->name }}</div>
		<div><span class="font-weight-bold">NIT:</span> {{ $tickets[0]->company->nit }}</div>
		<div><span class="font-weight-bold">Dirección:</span> {{ $tickets[0]->company->address }}</div>

		<hr>

		<div class="font-weight-bold">{{ 'Viaje' }}</div>

		<table>
			<tr>
				<th colspan="3">{{ 'Ruta' }}:</th>
			</tr>

			<tr>
				<td colspan="3">
					{{ $tickets[0]->assign->travel->time . ' - ' . $tickets[0]->assign->travel->route->destination . ' x ' . $tickets[0]->assign->travel->route->origin }}
				</td>
			</tr>

			<tr>
				<th>{{ 'Fecha' }}</th>
				<th>{{ 'Origen' }}</th>
				<th>{{ 'Destino' }}</th>
			</tr>

			<tr>
				<td>{{ date_format(date_create($tickets[0]->date_create), 'd/m/Y') }}</td>
				<td>{{ $tickets[0]->assign->travel->route->origin }}</td>
				<td>{{ $tickets[0]->assign->travel->route->destination }}</td>
			</tr>
		</table>

		<div class="font-weight-bold">{{ 'Pasajeros' }}</div>

		<table>
			<tr>
				<th>Nombre</th>
				<th>C.I.</th>
				<th>Asiento</th>
				<th>Precio</th>
			</tr>

			<tr>
				@foreach($tickets as $ticket)
					<td>{{ $ticket->customer->name }}</td>
					<td>{{ $ticket->customer->ci }}</td>
					<td>{{ $ticket->seat }}</td>
					<td>{{ number_format($ticket->amount, 2) }}</td>
				@endforeach				
			</tr>
		</table>

		<hr>

		<div class="font-weight-bold">{{ 'Pago' }}</div>

		<table>
			<tr>
				<th>Monto total</th>
				<td>{{ number_format($amountTickets, 2) }}</td>
			</tr>

			@if($status == 'Pago parcial' || $status == 'Pago completo')
				@foreach($payments as $payment)
					<tr>
						<th>{{ $payment->method }}</th>
						<td>{{ number_format($payment->amount, 2) }}</td>
					</tr>
				@endforeach

				<tr>
					<th>Total pagado</th>
					<td>{{ number_format($amountPayment, 2) }}</td>
				</tr>

				@if($status == 'Pago parcial')
					<tr>
						<th>Restante</th>
						<td>{{ number_format($amountTickets - $amountPayment, 2) }}</td>
					</tr>
				@endif
			@endif
		</table>

		@if($status == 'Pago parcial' || $status == 'Reservado')
			<hr>

			<table>
				<tr>
					<th>Info</th>
				</tr>

				<tr>
					<td>
						@if($status == 'Pago parcial')
							El monto total de este ticket no ha sido pagado.
						@endif

						@if($status == 'Reservado')
							Este ticket corresponde a una reservación, debe ser pagado.
						@endif
					</td>
				</tr>
			</table>
		@endif

		<hr>

		<div><span class="font-weight-bold">{{ 'Fecha' }}:</span> {{ date_format(date_create($tickets[0]->date_create), 'd/m/Y h:i A') }}</div>
		<div><span class="font-weight-bold">{{ 'Agente' }}:</span> {{ $tickets[0]->user->name }}</div>
	</div>
</body>
</html>