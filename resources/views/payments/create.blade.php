<x-template-dashboard active="payments" title="Reportar pagos">
	<div class="card">
		<div class="card-body">
			<h6>Viaje</h6>

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
			<h6>Pasajeros</h6>

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
                            <td>{{ number_format($ticket->amount, 2) }}</td>
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
		        <tbody>
		        	<tr>
		        		<th>Monto total</th>
		        		<td>{{ number_format($maxAmount, 2) }}</td>
		        	</tr>

		            @foreach($payments as $payment)
		            	<tr>
		            		<th>{{ $payment->method }}</th>
		            		<td>{{ number_format($payment->amount, 2) }}</td>
		            	</tr>
		            @endforeach

		            @if($payments->count())
			            <tr>
			        		<th>Monto pagado</th>
			        		<td>{{ number_format($amountPayments, 2) }}</td>
			        	</tr>
		        	@endif

		        	@if($payments->count() && $maxAmount > $amountPayments)
			            <tr>
			        		<th>Restante</th>
			        		<td>{{ number_format($maxAmount - $amountPayments, 2) }}</td>
			        	</tr>
		        	@endif
		        </tbody>
		    </table>
		</div>
	</div>

	@include('payments.payment')

	<form target="_blank" action="/tickets/print" onclick="window.location.href = '/tickets/create?assign={{ $tickets[0]->id_assign }}'" method="POST">
		<input type="hidden" name="id_sale" value="{{ request('ticket') }}">

		@if($payments->count())
			<button class="btn btn-primary">Procesar venta</button>
		@else
			<button class="btn btn-primary">Reservar</button>
		@endif
	</form>
</x-template-dashboard>