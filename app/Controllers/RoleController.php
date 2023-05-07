<?php

namespace App\Controllers;

use App\Models\Role;
use DB;

class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('Auth');
    }
    
    public function index()
    {
        $roles = Role::get();
        return view('roles.index', compact('roles'));
    }

    public function create()
    {
        $modules = DB::table('permissions')
            ->selectRaw("SUBSTRING_INDEX(name, '.', 1) AS module")
            ->groupBy('module')
            ->get();

        return view('roles.create', compact('modules'));
    }

    public function store()
    {
        Role::create([
            'name' => request('name'),
            'description' => request('description')
        ]);

        foreach (request('permissions') as $id_permission) {
            DB::table('role_has_permissions')
                ->insert([
                    'id_role' => request('id'),
                    'id_permission' => $id_permission
                ]);
        }

        return redirect('/roles')->with('success', 'Rol creado satisfactoriamente');
    }

    public function edit($id)
    {
        $role = Role::find($id);

        $modules = DB::table('permissions')
            ->selectRaw("SUBSTRING_INDEX(name, '.', 1) AS module")
            ->groupBy('module')
            ->get();

        return view('roles.edit', compact('role', 'modules'));
    }

    public function update()
    {
        Role::find(request('id'))
            ->update([
                'name' => request('name'),
                'description' => request('description')
            ]);

        DB::table('role_has_permissions')
            ->where('id_role', request('id'))
            ->delete();

        foreach (request('permissions') as $id_permission) {
            DB::table('role_has_permissions')
                ->insert([
                    'id_role' => request('id'),
                    'id_permission' => $id_permission
                ]);
        }

        return redirect('/roles')->with('success', 'Rol actualizado satisfactoriamente');
    }

    public function delete($id)
    {
        Role::find($id)->delete();
        return redirect('/roles')->with('success', 'Rol eliminado satisfactoriamente');
    }
}
