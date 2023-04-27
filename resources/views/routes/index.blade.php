<x-template-dashboard active="routes" title="Rutas">
	<div class="w-full p-3">
        <x-alert></x-alert>

        @if(can('routes.create'))
            <a href="/routes/create" class="btn btn-primary">Agregar ruta</a>
        @endif

        <div class="bg-white border rounded shadow p-3 text-lg">
            <table id="table" class="table table-hover w-full">
                <thead class="border-b-2">
                    <tr class="hover:bg-gray-100">
                        <th class="text-left p-2 hidden sm:table-cell">{{ lang('users.id') }}</th>
                        <th class="text-left p-2">{{ 'Destino' }}</th>
                        <th class="text-left p-2">{{ 'Origen' }}</th>
                        <th class="text-left p-2"></th>
                    </tr>
                </thead>

                <tbody>
                	@foreach($routes as $route)
                        <tr class="hover:bg-gray-100">
                            <td class="p-2 hidden sm:table-cell">{{ $route->id }}</td>
                            <td class="p-2">{{ $route->origin }}</td>
                            <td class="p-2">{{ $route->destination }}</td>
                            <td class="p-2 text-right">
                                @if(can('routes.create'))
                                    <a class="hover:text-blue-600 p-1" href="{{ '/routes/edit/' . $route->id }}" title="Editar">
                                        <fa class="fa fa-edit"></fa>
                                    </a>
                                @endif

                                @if(can('routes.create'))
                                    <a onclick="confirmDelete(event, this)" class="hover:text-red-600 p-1" href="{{ '/routes/delete/' . $route->id }}" title="Eliminar">
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
