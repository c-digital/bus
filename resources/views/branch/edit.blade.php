<x-template-dashboard active="branch" title="Crear sucursal">
    <div class="w-full p-3">
        <form action="/branch/update" method="POST" enctype="multipart/form-data">
            <x-alert/>

            <input type="hidden" name="id" value="{{ $branch->id }}">

            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="id_company">Empresa matriz</label>
                        <select name="id_company" class="form-control">
                            <option value=""></option>
                            @foreach($companies as $company)
                                <option {{ $company->id == $branch->id_company }} value="{{ $company->id }}">{{ $company->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="lane">Carril</label>
                        <input type="text" required class="form-control" value="{{ $branch->lane }}" name="lane">
                    </div>

                    <div class="form-group">
                        <label for="address">Dirección</label>
                        <input type="text" required class="form-control" value="{{ $branch->address }}" name="address">
                    </div>

                    <div class="form-group">
                        <label for="nit">NIT</label>
                        <input type="text" required class="form-control" value="{{ $branch->nit }}" name="nit">
                    </div>

                    <div class="form-group">
                        <label for="name">Nombre</label>
                        <input type="text" required class="form-control" value="{{ $branch->name }}" name="name">
                    </div>

                    <div class="form-group">
                        <label for="email">Correo electrónico</label>
                        <input type="email" required class="form-control" value="{{ $branch->email }}" name="email">
                    </div>

                    <div class="form-group">
                        <label for="phone">Teléfono</label>
                        <input type="text" required class="form-control" value="{{ $branch->phone }}" name="phone">
                    </div>

                    <div class="form-group mb-5">
                        <label for="logo">Logo</label>
                        <div>
                            <input type="file" name="logo" required>
                        </div>
                    </div>

                    <button class="btn btn-primary">Registrar</button>

                    <a href="/companies" class="btn btn-danger">Volver a atrás</a>
                </div>
            </div>
        </form>
    </div>
</x-template-dashboard>
