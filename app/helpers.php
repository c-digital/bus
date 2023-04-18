<?php

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