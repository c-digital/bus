<x-template-dashboard active="merchandise.create" title="Crear mercadería">
	<x-alert></x-alert>
	
	<form action="/merchandise/store" method="POST">
		<div class="card">
			<div class="card-header">Mensajero</div>

			<div class="card-body">
				<div class="row">
					<div class="col">
						<div class="form-group">
							<label for="messenger[national_identification]">Identificación nacional</label>
							<input type="text" class="form-control" name="messenger[national_identification]" required>
						</div>
					</div>

					<div class="col">
						<div class="form-group">
							<label for="messenger[name]">Nombre</label>
							<input type="text" class="form-control" name="messenger[name]" required>
						</div>
					</div>

					<div class="col">
						<div class="form-group">
							<label for="messenger[email]">Correo electrónico</label>
							<input type="text" class="form-control" name="messenger[email]" required>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col">
						<div class="form-group">
							<label for="messenger[phone]">Teléfono</label>
							<input type="text" class="form-control" name="messenger[phone]" required>
						</div>
					</div>

					<div class="col">
						<div class="form-group">
							<label for="messenger[date_birth]">Fecha de nacimiento</label>
							<input type="date" class="form-control" name="messenger[date_birth]" required>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="card mt-3">
			<div class="card-header">Paquete</div>

			<div class="card-body">
				<div class="row">
					<div class="col">
						<div class="form-group">
							<label for="origin">Origen</label>
							<select name="origin" required class="form-control">
								<option value=""></option>

								@foreach($cities as $city)
									<option value="{{ $city->name }}">{{ $city->name }}</option>
								@endforeach
							</select>
						</div>
					</div>

					<div class="col">
						<div class="form-group">
							<label for="destination">Destino</label>
							<select name="destination" required class="form-control">
								<option value=""></option>

								@foreach($cities as $city)
									<option value="{{ $city->name }}">{{ $city->name }}</option>
								@endforeach
							</select>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col">
						<div class="form-group">
							<label for="description">Descripción</label>
							<textarea name="description" required class="form-control"></textarea>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col">
						<div class="form-group">
							<label for="weight">Peso</label>
							<input type="number" class="form-control" name="weight" required>
						</div>
					</div>

					<div class="col">
						<div class="form-group">
							<label>Precio por kg</label>
							<input type="number" name="pricePerKg" class="form-control" readonly value="{{ config('pricePerKg') }}">
						</div>
					</div>

					<div class="col">
						<div class="form-group">
							<label for="price">Precio del envío</label>
							<input type="number" class="form-control" name="price" required readonly>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="card mt-3">
			<div class="card-header">Recibo</div>

			<div class="card-body">
				<div class="row">
					<div class="col">
						<div class="form-group">
							<label for="receipt[name]">Nombre</label>
							<input type="text" name="receipt[name]" class="form-control" required>
						</div>
					</div>

					<div class="col">
						<div class="form-group">
							<label for="receipt[email]">Correo electrónico</label>
							<input type="email" name="receipt[email]" class="form-control" required>
						</div>
					</div>

					<div class="col">
						<div class="form-group">
							<label for="receipt[phone]">Nombre</label>
							<input type="text" name="receipt[phone]" class="form-control" required>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col">
						<div class="form-group">
							<label for="receipt[date_birth]">Fecha de nacimiento</label>
							<input type="date" name="receipt[date_birth]" class="form-control" required>
						</div>
					</div>

					<div class="col">
						<div class="form-group">
							<label for="receipt[email]">Correo electrónico</label>
							<input type="email" name="receipt[email]" class="form-control" required>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="card mt-3">
			<div class="card-header">Facturación</div>

			<div class="card-body">
				<div class="row">
					<div class="col">
						<div class="form-group">
							<label for="discount">Descuento</label>
							<input type="number" name="discount" class="form-control" required>
						</div>
					</div>

					<div class="col">
						<div class="form-group">
							<label for="total">Total</label>
							<input type="number" name="total" readonly class="form-control" required>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col">
						<div class="form-group">
							<label for="billing">Estado</label>
							<select required name="billing" class="form-control">
								<option value="Por cobrar">Por cobrar</option>
								<option value="Pagado">Pagado</option>
							</select>
						</div>
					</div>

					<div class="col">
						<div class="form-group method-container">
	                        <label for="method">Método de pago</label>
	                        <select name="method" class="form-control">
	                            <option value=""></option>
	                            @foreach($methods as $method)
	                                <option value="{{ $method->name }}">{{ $method->name }}</option>
	                            @endforeach
	                        </select>
	                    </div>
					</div>
				</div>
			</div>
		</div>

		<div class="mt-3">
			<button class="btn btn-danger" type="reset">Limpiar campos</button>
			<button class="btn btn-primary" type="submit">Guardar</button>
		</div>
	</form>
</x-template-dashboard>