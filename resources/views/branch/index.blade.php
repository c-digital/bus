<x-template-dashboard active="branch" title="Sucursal">
	<div class="w-full p-3">
        <form>
            <div class="row mb-3">
                <div class="col-8">
                    <input autofocus type="text" name="search" placeholder="{{ lang('users.search') }}" value="{{ get('search') ?? '' }}" class="form-control">
                </div>

                <div class="col-4">
                    <button type="submit" class="btn btn-primary">
                        <i class="fa fa-eye mr-2"></i> 
                        Buscar
                    </button>

                    @if(can('branch.create'))
                        <a href="/branch/create" class="btn btn-primary">
                            <i class="fa fa-plus mr-2"></i> 
                            Crear nueva sucursal
                        </a>
                    @endif
                </div>
            </div>
        </form>

        <x-alert></x-alert>

        <div class="bg-white border rounded shadow p-3 text-lg">
            <table id="table" class="table table-hover w-full">
                <thead class="border-b-2">
                    <tr class="hover:bg-gray-100">
                        <th class="text-left p-2 hidden sm:table-cell">{{ lang('users.id') }}</th>
                        <th class="text-left p-2">{{ 'Carril' }}</th>
                        <th class="text-left p-2">{{ 'Dirección' }}</th>
                        <th class="text-left p-2">{{ 'NIT' }}</th>
                        <th class="text-left p-2">{{ 'Logo' }}</th>
                        <th class="text-left p-2">{{ 'Nombre' }}</th>
                        <th class="text-left p-2"></th>
                    </tr>
                </thead>

                <tbody>
                	@foreach($branch as $branch)
                    <tr class="hover:bg-gray-100">
                        <td class="p-2 hidden sm:table-cell">{{ $branch->id }}</td>
                        <td class="p-2">{{ $branch->lane }}</td>
                        <td class="p-2">{{ $branch->address }}</td>
                        <td class="p-2">{{ $branch->nit }}</td>
                        <td class="p-2">
                            @if($branch->logo)
                                <img class="w-8 h-8 rounded-full mr-4" src="{{ asset('img/' . $branch->logo) }}" alt="{{ asset('img/' . $branch->logo) }}"> 
                            @endif
                        </td>
                        <td class="p-2">{{ $branch->name }}</td>
                        <td class="p-2 text-right">
                            @if(can('branch.edit'))
                                <a class="hover:text-blue-600 p-1" href="{{ '/branch/edit/' . $branch->id }}" title="{{ lang('users.edit') }}">
                                    <fa class="fa fa-edit"></fa>
                                </a>
                            @endif

                            @if(can('branch.delete'))
                                <a onclick="confirmDelete(event, this)" class="hover:text-red-600 p-1" href="{{ '/branch/delete/' . $branch->id }}" title="{{ lang('users.delete') }}">
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
