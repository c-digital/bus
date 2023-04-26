<x-template-dashboard active="customers" title="Clientes">
	<div class="w-full p-3">
        <x-alert></x-alert>

        @if(can('customers.create'))
            <a href="/customers/create" class="btn btn-primary">Agregar cliente</a>
        @endif

        <div class="bg-white border rounded shadow p-3 text-lg">
            <div class="table-responsive">
                <table id="table" class="table table-hover w-full">
                    <thead class="border-b-2">
                        <tr class="hover:bg-gray-100">
                            <th class="text-left p-2 hidden sm:table-cell">{{ lang('users.id') }}</th>
                            <th class="text-left p-2">{{ 'Nombre' }}</th>
                            <th class="text-left p-2">{{ 'CI' }}</th>
                            <th class="text-left p-2">{{ 'Fecha de nacimiento' }}</th>
                            <th class="text-left p-2">{{ 'Edad' }}</th>
                            <th class="text-left p-2">{{ 'Teléfono' }}</th>
                            <th class="text-left p-2">{{ 'Dirección' }}</th>
                            <th class="text-left p-2"></th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($customers as $customer)
                            <tr class="hover:bg-gray-100">
                                <td class="p-2 hidden sm:table-cell">{{ $customer->id }}</td>
                                <td class="p-2">{{ $customer->name }}</td>
                                <td class="p-2">{{ $customer->ci }}</td>
                                <td class="p-2">{{ $customer->date_birth }}</td>
                                <td class="p-2">{{ $customer->age }}</td>
                                <td class="p-2">{{ $customer->phone }}</td>
                                <td class="p-2">{{ $customer->address }}</td>
                                <td class="p-2 text-right">
                                    @if(can('customers.create'))
                                        <a class="hover:text-blue-600 p-1" href="{{ '/customers/edit/' . $customer->id }}" title="Editar">
                                            <fa class="fa fa-edit"></fa>
                                        </a>
                                    @endif

                                    @if(can('customers.create'))
                                        <a onclick="confirmDelete(event, this)" class="hover:text-red-600 p-1" href="{{ '/customers/' . $customer->id }}" title="Eliminar">
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
