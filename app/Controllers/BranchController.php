<?php

namespace App\Controllers;

use App\Models\Branch;
use App\Models\User;

class BranchController extends Controller
{
    public function __construct()
    {
        if (auth()->role != 'admin') {
            return abort(401);
        }
    }

    public function index()
    {
        $branchs = Branch::search(get('search'))
            ->get();

        return view('branch.index', compact('branchs'));
    }

    public function create()
    {
        $companies = Company::get();

        return view('branch.create', compact('companies'));
    }

    public function store()
    {
        $logo = request('logo')->save('resources/assets/img');

        $branch = Branch::create([
            'lane' => request('lane'),
            'address' => request('address'),
            'nit' => request('nit'),
            'name' => request('name'),
            'email' => request('email'),
            'phone' => request('phone'),
            'id_company' => request('id_company'),
            'logo' => $logo->filename
        ]);

        return redirect('/branch/edit/' . $branch->id);
    }

    public function edit($id)
    {
        $branch = Branch::find($id);
        $companies = Company::get();

        return view('branch.edit', compact('companies', 'branch'));
    }

    public function update()
    {
        $branch = Branch::find(request('id'));
        $branch->update([
            'lane' => request('lane'),
            'address' => request('address'),
            'nit' => request('nit'),
            'name' => request('name'),
            'email' => request('email'),
            'phone' => request('phone'),
            'id_company' => request('id_company'),
        ]);

        if (request('logo')) {
            $logo = request('logo')->save('resources/assets/img');
            
            $branch->update([
                'logo' => $logo->filename,
            ]);
        }

        return redirect('branch/edit/' . request('id'));
    }

    public function delete($id)
    {
        Branch::find($id)->delete();

        return redirect('/branch');
    }
}
