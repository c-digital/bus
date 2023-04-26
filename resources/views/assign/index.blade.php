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
                            <th class="text-left p-2"></th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($assign as $item)
                            <tr class="hover:bg-gray-100">
                                <td class="p-2 hidden sm:table-cell">{{ $item->id }}</td>
                                <td class="p-2">{{ $item->date }}</td>
                                <td class="p-2">{{ $item->driver }}</td>
                                <td class="p-2">{{ $item->vehicle }}</td>
                                <td class="p-2">{{ $item->travel }}</td>
                                <td class="p-2 text-right">
                                    @if(can('assign.create'))
                                        <a class="hover:text-blue-600 p-1" href="{{ '/assign/edit/' . $customer->id }}" title="Editar">
                                            <fa class="fa fa-edit"></fa>
                                        </a>
                                    @endif

                                    @if(can('assign.create'))
                                        <a onclick="confirmDelete(event, this)" class="hover:text-red-600 p-1" href="{{ '/assign/' . $customer->id }}" title="Eliminar">
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
