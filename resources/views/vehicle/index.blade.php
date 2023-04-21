<x-template-dashboard active="vehicle" title="Vehículos">
	<div class="w-full p-3">
        <x-alert></x-alert>

        @if(can('vehicle.create'))
            <a href="/vehicle/create" class="btn btn-primary">Agregar vehículo</a>
        @endif

        <div class="bg-white border rounded shadow p-3 text-lg">
            <div class="table-responsive">
                <table id="table" class="table table-hover w-full">
                    <thead class="border-b-2">
                        <tr class="hover:bg-gray-100">
                            <th class="text-left p-2 hidden sm:table-cell">{{ lang('users.id') }}</th>
                            <th class="text-left p-2">{{ 'Número interno' }}</th>
                            <th class="text-left p-2">{{ 'Tipo' }}</th>
                            <th class="text-left p-2">{{ 'Placa' }}</th>
                            <th class="text-left p-2">{{ 'Año' }}</th>
                            <th class="text-left p-2">{{ 'Número de chasis' }}</th>
                            <th class="text-left p-2">{{ 'Propietario' }}</th>
                            <th class="text-left p-2">{{ 'Teléfono del propietario' }}</th>
                            <th class="text-left p-2">{{ 'Marca' }}</th>
                            <th class="text-left p-2">{{ 'Estado' }}</th>
                            <th class="text-left p-2"></th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($vehicles as $vehicle)
                            <tr class="hover:bg-gray-100">
                                <td class="p-2 hidden sm:table-cell">{{ $vehicle->id }}</td>
                                <td class="p-2">{{ $vehicle->type }}</td>
                                <td class="p-2">{{ $vehicle->internal_number }}</td>
                                <td class="p-2">{{ $vehicle->plate }}</td>
                                <td class="p-2">{{ $vehicle->year }}</td>
                                <td class="p-2">{{ $vehicle->model }}</td>
                                <td class="p-2">{{ $vehicle->chasis_number }}</td>
                                <td class="p-2">{{ $vehicle->owner }}</td>
                                <td class="p-2">{{ $vehicle->owner_phone }}</td>
                                <td class="p-2">{{ $vehicle->status }}</td>
                                <td class="p-2 text-right">
                                    @if(can('vehicle.create'))
                                        <a class="hover:text-blue-600 p-1" href="{{ '/vehicle/edit/' . $vehicle->id }}" title="Editar">
                                            <fa class="fa fa-edit"></fa>
                                        </a>
                                    @endif

                                    @if(can('vehicle.create'))
                                        <a onclick="confirmDelete(event, this)" class="hover:text-red-600 p-1" href="{{ '/vehicle/' . $vehicle->id }}" title="Eliminar">
                                            <fa class="fa fa-trash"></fa>
                                        </a>
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
