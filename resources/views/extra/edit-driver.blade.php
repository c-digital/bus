<div class="form-group">
	<label for="name">Nombre completo</label>
	<input type="text" class="form-control" name="extra[name]" required value="{{ json($user->extra)->name }}">
</div>

<div class="form-group">
	<label for="license">Carnet</label>
	<input type="text" class="form-control" name="extra[license]" required value="{{ json($user->extra)->license }}">
</div>

<div class="form-group">
	<label for="driver_license">Licencia de conducir</label>
	<input type="text" class="form-control" name="extra[driver_license]" required value="{{ json($user->extra)->driver_license }}">
</div>

<div class="form-group">
	<label for="phone">Teléfono</label>
	<input type="text" class="form-control" name="extra[phone]" required value="{{ json($user->extra)->phone }}">
</div>

<div class="form-group">
	<label for="address">Dirección</label>
	<input type="text" class="form-control" name="extra[address]" required value="{{ json($user->extra)->address }}">
</div>

<div class="form-group">
	<label for="photo">Foto</label>
	<div>
		<input type="file" name="photo" required>
	</div>
</div>