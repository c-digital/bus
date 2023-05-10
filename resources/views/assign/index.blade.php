<x-template-dashboard active="assign" title="Asignación">
	<div class="w-full p-3">
        <x-alert></x-alert>

        @if(can('assign.create'))
            <a href="/assign/create" class="btn btn-primary">Agregar Asignación</a>
        @endif

        <div class="bg-white border rounded shadow p-3 text-lg">
            <div class="table-responsive">
                <table id="table" class="table table-hover w-full">
                    <thead class="border-b-2">
                        <tr class="hover:bg-gray-100">
                            <th class="text-left p-2 hidden sm:table-cell">{{ lang('users.id') }}</th>
                            <th class="text-left p-2">{{ 'Fecha' }}</th>
                            <th class="text-left p-2">{{ 'Conductor' }}</th>
                            <th class="text-left p-2">{{ 'Vehiculo' }}</th>
                            <th class="text-left p-2">{{ 'Viaje' }}</th>
                            <th class="text-left p-2">{{ 'Hora de inicio' }}</th>
                            <th class="text-left p-2">{{ 'Hora de fin' }}</th>
                            <th class="text-left p-2">{{ 'Estado' }}</th>
                            <th class="text-left p-2"></th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($assign as $item)
                            <tr class="hover:bg-gray-100">
                                <td class="p-2 hidden sm:table-cell">{{ $item->id }}</td>
                                <td class="p-2">{{ $item->date }}</td>
                                <td class="p-2">{{ $item->driver->name }}</td>
                                <td class="p-2">{{ $item->vehicle->internal_number . ' - ' . $item->vehicle->type->type . ' - ' . $item->vehicle->plate }}</td>
                                <td class="p-2">{{ $item->travel->time . ' - ' . $item->travel->route->destination . ' x ' . $item->travel->route->origin }}</td>
                                <td class="p-2">{{ $item->start }}</td>
                                <td class="p-2">{{ $item->end }}</td>
                                <td class="p-2">{{ $item->status }}</td>
                                <td class="p-2 text-right">
                                    <a href="/tickets/list/{{ $item->id }}?status=Vendido" class="btn btn-success btn-sm">Ver tickets vendidos</a>

                                    <a href="/tickets/list/{{ $item->id }}?status=Reservado" class="btn btn-info btn-sm">Ver tickets reservados</a>

                                    <a href="" data-toggle="modal" data-target="#{{ 'assignStatus_' . $item->id }}" class="btn btn-secondary btn-sm">Cambiar estado</a>

                                    @if(can('assign.create'))
                                        <a class="hover:text-blue-600 p-1" href="{{ '/assign/edit/' . $item->id }}" title="Editar">
                                            <fa class="fa fa-edit"></fa>
                                        </a>
                                    @endif

                                    @if(can('assign.create'))
                                        <a onclick="confirmDelete(event, this)" class="hover:text-red-600 p-1" href="{{ '/assign/' . $item->id }}" title="Eliminar">
                                            <fa class="fa fa-trash"></fa>
                                        </a>
                                    @endif
                                </td>
                            </tr>

                            @include('assign.status')
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-template-dashboard>
