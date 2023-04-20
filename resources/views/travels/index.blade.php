<x-template-dashboard active="travels" title="Viajes">
	<div class="w-full p-3">
        <x-alert></x-alert>

        @if(can('routes.create'))
            <a href="/travels/create" class="btn btn-primary">Agregar viaje</a>
        @endif

        <div class="bg-white border rounded shadow p-3 text-lg">
            <table id="table" class="table table-hover w-full">
                <thead class="border-b-2">
                    <tr class="hover:bg-gray-100">
                        <th class="text-left p-2 hidden sm:table-cell">{{ lang('users.id') }}</th>
                        <th class="text-left p-2">{{ 'Hora' }}</th>
                        <th class="text-left p-2">{{ 'Días' }}</th>
                        <th class="text-left p-2">{{ 'Estado' }}</th>
                        <th class="text-left p-2">{{ 'Paradas' }}</th>
                        <th class="text-left p-2">{{ 'Ruta' }}</th>
                        <th class="text-left p-2"></th>
                    </tr>
                </thead>

                <tbody>
                	@foreach($travels as $travel)
                        <tr class="hover:bg-gray-100">
                            <td class="p-2 hidden sm:table-cell">{{ $travel->id }}</td>
                            <td class="p-2">{{ $travel->time }}</td>
                            <td class="p-2">{{ $travel->days }}</td>
                            <td class="p-2">{{ $travel->status }}</td>
                            <td class="p-2">{{ $travel->stops }}</td>
                            <td class="p-2">{{ $travel->route }}</td>
                            <td class="p-2 text-right">
                                @if(can('routes.create'))
                                    <a class="hover:text-blue-600 p-1" href="{{ '/routes/edit/' . $travel->id }}" title="Editar">
                                        <fa class="fa fa-edit"></fa>
                                    </a>
                                @endif

                                @if(can('routes.create'))
                                    <a onclick="confirmDelete(event, this)" class="hover:text-red-600 p-1" href="{{ '/routes/' . $travel->id }}" title="Eliminar">
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
</x-template-dashboard>
