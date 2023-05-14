<x-template-dashboard active="assign" title="Tickets {{ strtolower(get('status')) }}s">
	<div class="w-full p-3">
        <x-alert></x-alert>

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
                            <td>{{ $assign->id }}</td>
                            <td>{{ $assign->date }}</td>
                            <td>{{ $assign->driver->name }}</td>
                            <td>{{ $assign->vehicle->internal_number . ' - ' . $assign->vehicle->type->type . ' - ' . $assign->vehicle->plate }}</td>
                            <td>{{ $assign->travel->time . ' - ' . $assign->travel->route->destination . ' x ' . $assign->travel->route->origin }}</td>
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
                            <th></th>
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
                                <td>
                                    @if(get('status') == 'Reservado')
                                        <a href="/payments/create?ticket={{ $ticket->id_sale }}" class="btn btn-primary btn-sm">Realizar pago</a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-template-dashboard>
