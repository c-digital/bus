<x-template-dashboard active="users" title="Usuarios">
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

                    @if(can('users.create'))
                        <a href="/users/create" class="btn btn-primary">
                            <i class="fa fa-plus mr-2"></i> 
                            {{ lang('users.create') }}
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
                        <th class="text-left p-2">{{ lang('users.photo') }}</th>
                        <th class="text-left p-2">{{ lang('users.name') }}</th>
                        <th class="text-left p-2 hidden sm:table-cell">{{ lang('users.email') }}</th>
                        <th class="text-left p-2">Rol</th>
                        <th class="text-left p-2"></th>
                    </tr>
                </thead>

                <tbody>
                	@foreach($users as $user)
                    <tr class="hover:bg-gray-100">
                        <td class="p-2 hidden sm:table-cell">{{ $user->id }}</td>
                        <td class="p-2">
                            <img class="w-8 h-8 rounded-full mr-4" src="{{ $user->photo }}" alt="{{ $user->name }}"> 
                        </td>
                        <td class="p-2">{{ $user->name }}</td>
                        <td class="p-2 hidden sm:table-cell">{{ $user->email }}</td>
                        <td class="p-2 hidden sm:table-cell">{{ $user->role }}</td>
                        <td class="p-2 text-right">
                            @if(can('users.edit'))
                                <a class="hover:text-blue-600 p-1" href="{{ '/users/edit/' . $user->id }}" title="{{ lang('users.edit') }}">
                                    <fa class="fa fa-edit"></fa>
                                </a>
                            @endif

                            @if(can('users.delete'))
                                <a onclick="confirmDelete(event, this)" class="hover:text-red-600 p-1" href="{{ '/users/delete/' . $user->id }}" title="{{ lang('users.delete') }}">
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
