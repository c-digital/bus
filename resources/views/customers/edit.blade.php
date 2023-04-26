<x-template-dashboard active="customers" title="Editar cliente">
    <div class="w-full p-3">
        <form action="/customers/update" method="POST" enctype="multipart/form-data">
            <x-alert/>

            <input type="hidden" name="id" value="{{ $customer->id }}">

            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">Nombre</label>
                        <input type="text" required name="name" class="form-control" value="{{ $customer->name }}">
                    </div>

                    <div class="form-group">
                        <label for="ci">C. I.</label>
                        <input type="text" required name="ci" class="form-control" value="{{ $customer->ci }}">
                    </div>

                    <div class="form-group">
                        <label for="date_birth">Fecha de nacimiento</label>
                        <input type="date" required name="date_birth" class="form-control" value="{{ $customer->date_birth }}">
                    </div>

                    <div class="form-group">
                        <label for="age">Edad</label>
                        <input type="text" required name="age" readonly class="form-control" value="{{ $customer->age }}">
                    </div>

                    <div class="form-group">
                        <label for="phone">Teléfono</label>
                        <input type="text" required name="phone" class="form-control" value="{{ $customer->phone }}">
                    </div>

                    <div class="form-group">
                        <label for="address">Dirección</label>
                        <input type="text" required name="address" class="form-control" value="{{ $customer->address }}">
                    </div>

                    <button class="btn btn-primary">Registrar</button>

                    <a href="/customers" class="btn btn-danger">Volver a atrás</a>
                </div>
            </div>
        </form>
    </div>
</x-template-dashboard>
