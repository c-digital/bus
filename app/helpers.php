<?php

function seat_class($seat, $paid, $reserved)
{
	if (in_array($seat, $paid)) {
		return 'seat ladies';
	}

	if (in_array($seat, $reserved)) {
		return 'seat occupied ChooseSeat selected';
	}

	return 'seat occupied ChooseSeat';
}

function translateDays($days)
{
	$string = implode(', ', json($days));

	$string = str_replace(
		['monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday'],
		['Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado', 'Domingo'],
		$string
	);

	return $string;
}

function permission_id($module, $permission)
{
	$name = $module . '.' . $permission;

	$db = DB::table('permissions')
		->where('name', $name)
		->first();

	return $db->id;
}

function hasPermission($role, $id_permission)
{
	$role = Role::where('name', $role)->first();

	$db = DB::table('role_has_permissions')
		->where('id_role', $role->id)
		->where('id_permission', $id_permission)
		->get();

	if ($db->count()) {
		return true;
	}

	return false;
}