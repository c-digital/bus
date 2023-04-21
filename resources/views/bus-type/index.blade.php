<x-template-dashboard active="bus-type" title="Tipo de bus">
	<div class="w-full p-3">
        <x-alert></x-alert>

        @if(can('bus-type.create'))
            <a href="/bus-type/create" class="btn btn-primary">Agregar tipo de bus</a>
        @endif

        <div class="bg-white border rounded shadow p-3 text-lg">
            <table id="table" class="table table-hover w-full">
                <thead class="border-b-2">
                    <tr class="hover:bg-gray-100">
                        <th class="text-left p-2 hidden sm:table-cell">{{ lang('users.id') }}</th>
                        <th class="text-left p-2">{{ 'Tipo' }}</th>
                        <th class="text-left p-2">{{ 'Diseño' }}</th>
                        <th class="text-left p-2">{{ 'Total de asientos' }}</th>
                        <th class="text-left p-2">{{ 'Estado' }}</th>
                        <th class="text-left p-2"></th>
                    </tr>
                </thead>

                <tbody>
                	@foreach($types as $type)
                        <tr class="hover:bg-gray-100">
                            <td class="p-2 hidden sm:table-cell">{{ $type->id }}</td>
                            <td class="p-2">{{ $type->type }}</td>
                            <td class="p-2">{{ $type->design }}</td>
                            <td class="p-2">{{ $type->total_seats }}</td>
                            <td class="p-2">{{ $type->status }}</td>
                            <td class="p-2 text-right">
                                @if(can('bus-type.create'))
                                    <a class="hover:text-blue-600 p-1" href="{{ '/bus-type/edit/' . $type->id }}" title="Editar">
                                        <fa class="fa fa-edit"></fa>
                                    </a>
                                @endif

                                @if(can('bus-type.create'))
                                    <a onclick="confirmDelete(event, this)" class="hover:text-red-600 p-1" href="{{ '/bus-type/' . $type->id }}" title="Eliminar">
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
