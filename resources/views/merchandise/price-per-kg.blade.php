<x-template-dashboard active="merchandise.price-per-kg" title="Precio por kilogramo">
	<x-alert></x-alert>

	<div class="card mt-3">
		<div class="card-header">Establecer precio por kilogramo</div>

		<div class="card-body">
			<form action="/merchandise/update?price-per-kg=1" method="POST">
				<div class="row">
					<div class="col">
						<label for="price-per-kg">Precio por kilogramo</label>
					</div>

					<div class="col">
						<input type="number" class="form-control form-control-sm" required name="price-per-kg" value="{{ config('pricePerKg') }}">
					</div>

					<div class="col">
						<button type="submit" class="btn btn-primary btn-sm">Actualizar</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</x-template-dashboard>