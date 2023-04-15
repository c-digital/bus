<x-template-dashboard active="roles" title="Roles">
	<div class="w-full p-3">
        <x-alert></x-alert>

        <a href="/roles/create" class="btn btn-primary">Agregar rol</a>

        <div class="bg-white border rounded shadow p-3 text-lg">
            <table id="table" class="table table-hover w-full">
                <thead class="border-b-2">
                    <tr class="hover:bg-gray-100">
                        <th class="text-left p-2 hidden sm:table-cell">{{ lang('users.id') }}</th>
                        <th class="text-left p-2">{{ 'Nombre' }}</th>
                        <th class="text-left p-2">{{ 'Descripción' }}</th>
                        <th class="text-left p-2"></th>
                    </tr>
                </thead>

                <tbody>
                	@foreach($roles as $user)
                    <tr class="hover:bg-gray-100">
                        <td class="p-2 hidden sm:table-cell">{{ $user->id }}</td>
                        <td class="p-2">{{ $user->name }}</td>
                        <td class="p-2 hidden sm:table-cell">{{ $user->description }}</td>
                        <td class="p-2 text-right">
                            <a class="hover:text-blue-600 p-1" href="{{ '/roles/edit/' . $user->id }}" title="Editar">
                                <fa class="fa fa-edit"></fa>
                            </a>

                            <a onclick="confirmDelete(event, this)" class="hover:text-red-600 p-1" href="{{ '/roles/' . $user->id }}" title="Eliminar">
                                <fa class="fa fa-trash"></fa>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-template-dashboard>
