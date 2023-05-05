<x-template-dashboard active="payments" title="Reportar pagos">
	<div class="card">
		<div class="card-body">
			<h6>Info del viaje</h6>

			<table class="table table-hover">
		        <thead>
		            <tr>
		                <th>{{ lang('users.id') }}</th>
		                <th>{{ 'Fecha' }}</th>
		                <th>{{ 'Conductor' }}</th>
		                <th>{{ 'Vehiculo' }}</th>
		                <th>{{ 'Viaje' }}</th>
		            </tr>
		        </thead>

		        <tbody>
		            <tr>
		                <td>{{ $tickets[0]->assign->id }}</td>
		                <td>{{ $tickets[0]->assign->date }}</td>
		                <td>{{ $tickets[0]->assign->driver->name }}</td>
		                <td>{{ $tickets[0]->assign->vehicle->internal_number . ' - ' . $tickets[0]->assign->vehicle->type->type . ' - ' . $tickets[0]->assign->vehicle->plate }}</td>
		                <td>{{ $tickets[0]->assign->travel->time . ' - ' . $tickets[0]->assign->travel->route->destination . ' x ' . $tickets[0]->assign->travel->route->origin }}</td>
		            </tr>
		        </tbody>
		    </table>
		</div>
	</div>

	<div class="card mt-4">
		<div class="card-body">
			<h6>Info de los pasajeros</h6>

			<table class="table table-hover">
		        <thead>
		            <tr>
		                <th>{{ 'Nombre' }}</th>
                        <th>{{ 'CI' }}</th>
                        <th>{{ 'Fecha de nacimiento' }}</th>
                        <th>{{ 'Edad' }}</th>
                        <th>{{ 'Teléfono' }}</th>
                        <th>{{ 'Dirección' }}</th>
                        <th>{{ 'Asiento' }}</th>
                        <th>{{ 'Precio' }}</th>
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
                            <td>{{ $ticket->seat }}</td>
                            <td>{{ $ticket->amount }}</td>
		            	</tr>
		            @endforeach
		        </tbody>
		    </table>
		</div>
	</div>

	<div class="card mt-4 mb-4">
		<div class="card-body">
			<h6>
				Pagos
			</h6>

			<div class="float-end">
				<button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#payment">Agregar</button>
			</div>

			<table class="table table-hover">
		        <thead>
		            <tr>
		                <th>{{ 'Monto' }}</th>
                        <th>{{ 'Método de pago' }}</th>
		            </tr>
		        </thead>

		        <tbody>
		            @foreach($payments as $payment)
		            	<tr>
		            		<td>{{ $payment->amount }}</td>
                            <td>{{ $payment->method }}</td>
		            	</tr>
		            @endforeach
		        </tbody>
		    </table>
		</div>
	</div>

	@include('payments.payment')

	<form action="/tickets/print" method="POST">
		<input type="hidden" name="id_sale" value="{{ request('ticket') }}">
		<button class="btn btn-primary">Procesar venta</button>
	</form>
</x-template-dashboard>