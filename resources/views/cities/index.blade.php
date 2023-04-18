<x-template-dashboard active="cities" title="Ciudades">
	<div class="w-full p-3">
        <x-alert></x-alert>

        @if(can('cities.create'))
            <a href="/cities/create" class="btn btn-primary">Agregar ciudad</a>
        @endif

        <div class="bg-white border rounded shadow p-3 text-lg">
            <table id="table" class="table table-hover w-full">
                <thead class="border-b-2">
                    <tr class="hover:bg-gray-100">
                        <th class="text-left p-2 hidden sm:table-cell">{{ lang('users.id') }}</th>
                        <th class="text-left p-2">{{ 'Nombre' }}</th>
                        <th class="text-left p-2"></th>
                    </tr>
                </thead>

                <tbody>
                	@foreach($cities as $city)
                        <tr class="hover:bg-gray-100">
                            <td class="p-2 hidden sm:table-cell">{{ $city->id }}</td>
                            <td class="p-2">{{ $city->name }}</td>
                            <td class="p-2 text-right">
                                @if(can('cities.create'))
                                    <a class="hover:text-blue-600 p-1" href="{{ '/cities/edit/' . $city->id }}" title="Editar">
                                        <fa class="fa fa-edit"></fa>
                                    </a>
                                @endif

                                @if(can('cities.create'))
                                    <a onclick="confirmDelete(event, this)" class="hover:text-red-600 p-1" href="{{ '/cities/' . $city->id }}" title="Eliminar">
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
