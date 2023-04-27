<?php

namespace App\Controllers;

use App\Models\Role;
use App\Models\User;
use App\Validations\UserStoreValidation;
use App\Validations\UserUpdateValidation;
use Redirect;
use View;

class UserController extends Controller
{
    /**
     * Verify if user is logged.
     */
    public function __construct()
    {
        $this->middleware('Auth');
    }

    /**
     * Show home page.
     *
     * @return View
     */
    public function index(): View
    {        
        $users = User::name(get('search'))
            ->email(get('search'))
            ->get();

        if (auth()->role != 'admin') {
            $users = User::name(get('search'))
                ->email(get('search'))
                ->where('id_company', auth()->id_company)
                ->get();
        }

        return view('users.index', compact('users'));
    }

    /**
     * Show create user page.
     *
     * @return View
     */
    public function create(): View
    {
        $roles = Role::get();

        return view('users.create', compact('roles'));
    }

    /**
     * Store user in database.
     *
     * @param  UserStoreValidation  $validation
     * @return Redirect
     */
    public function store(): Redirect
    {
        $extra = request('extra');

        if (request('photo')) {
            $photo = request('photo')->save("img/users");
            $extra['photo'] = $photo->filename;
        }

        $user = User::create([
            'name' => request('name'),
            'email' => request('email'),
            'password' => encrypt(request('password')),
            'role' => request('role'),
            'extra' => json($extra),
        ]);

        $user->update(['hash' => encrypt($user->id)]);

        return redirect('/users')->with('info', lang('users.store'));
    }

    /**
     * Show edit user page.
     *
     * @param  int  $id
     * @return View
     */
    public function edit(int $id): View
    {
        $user = User::find($id);
        $roles = Role::get();

        return view('users.edit', compact('user', 'roles'));
    }

    /**
     * Update user in database.
     *
     * @param  UserUpdateValidation  $validation
     * @return Redirect
     */
    public function update(): Redirect
    {
        $extra = request('extra');

        if (request('photo')) {
            $photo = request('photo')->save("img/users");
            $extra['photo'] = $photo->filename;
        }

        $user = User::find(request('id'));
        $user->update([
            'name' => request('name'),
            'email' => request('email'),
            'password' => encrypt(request('password')),
            'role' => request('role'),
            'extra' => json($extra)
        ]);

        if ($user->id == session('id')) {
            session('name', $user->name);
            session('photo', $user->photo);
        }

        return redirect('/users')->with('info', lang('users.update'));
    }

    public function two_fa($id)
    {
        $user = User::find($id);

        if ($user->two_fa) {
            $user->two_fa = null;
        } else {
            $user->two_fa = two_fa()->key();
        }

        $user->save();

        return redirect('/dashboard/users/edit/'.$id);
    }

    /**
     * Delete user in database.
     *
     * @param  int  $id
     * @return Redirect
     */
    public function delete(int $id): Redirect
    {
        if ($id == session('id')) {
            return redirect('/users')->with('error', lang('users.in_use'));
        }

        User::find($id)->delete();

        return redirect('/users')->with('info', lang('users.delete'));
    }

    public function extra($role)
    {
        if (storage()->exists("resources/views/extra/$role.blade.php")) {
            return view("extra.$role");
        }
    }
}
