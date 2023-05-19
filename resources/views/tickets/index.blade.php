<x-template-dashboard active="tickets" title="Tickets">
    <div class="w-full p-3">
        <x-alert></x-alert>

        <form>
            <div class="row">
                <div class="col-1">
                    <label for="date">Fecha</label>
                </div>

                <div class="col-2">
                    <input type="date" name="date" class="form-control form-control-sm" required value="{{ get('date') ?? now('Y-m-d') }}">
                </div>

                <div class="col-1">
                    <input type="submit" class="btn btn-primary btn-sm" value="Filtrar">
                </div>
            </div>
        </form>

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
                                <td class="p-2">{{ $item->driver->name }}</td>
                                <td class="p-2">{{ $item->vehicle->internal_number . ' - ' . $item->vehicle->type->type . ' - ' . $item->vehicle->plate }}</td>
                                <td class="p-2">{{ $item->travel->time . ' - ' . $item->travel->route->destination . ' x ' . $item->travel->route->origin }}</td>
                                <td class="p-2 text-right">
                                    <a href="/tickets/list/{{ $item->id }}?status=Vendido" class="btn btn-success btn-sm">Ver tickets vendidos</a>

                                    <a href="/tickets/list/{{ $item->id }}?status=Reservado" class="btn btn-info btn-sm">Ver tickets reservados</a>

                                    <a href="" data-bs-toggle="modal" data-bs-target="#{{ 'assignStatus_' . $item->id }}" class="btn btn-secondary btn-sm">Cambiar estado</a>
                                    
                                    @if(can('tickets.create'))
                                        <a class="btn btn-primary btn-sm" href="{{ '/tickets/create?assign=' . $item->id }}" title="Seleccionar">
                                            Seleccionar
                                        </a>
                                    @endif
                                </td>
                            </tr>

                            @include('tickets.status')
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-template-dashboard>
