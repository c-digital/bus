<?php

namespace App\Controllers;

use App\Models\Company;
use App\Models\User;

class CompanyController extends Controller
{
    public function __construct()
    {
        $this->middleware('Auth');
    }
    
    public function index()
    {
        if (auth()->role != 'admin') {
            return abort(401);
        }

        $companies = Company::search(get('search'))->get();
        return view('companies.index', compact('companies'));
    }

    public function create()
    {
        if (auth()->role != 'admin') {
            return abort(401);
        }

        return view('companies.create');
    }

    public function store()
    {
        if (auth()->role != 'admin') {
            return abort(401);
        }

        $logo = request('logo')->save('resources/assets/img');

        $company = Company::create([
            'lane' => request('lane'),
            'address' => request('address'),
            'nit' => request('nit'),
            'name' => request('name'),
            'email' => request('email'),
            'phone' => request('phone'),
            'logo' => $logo->filename
        ]);

        User::create([
            'name' => request('name'),
            'email' => request('email'),
            'password' => encrypt(request('email')),
            'role' => 'company',
            'id_company' => $company->id,
        ]);

        return redirect('/companies/edit/' . $company->id);
    }

    public function edit($id)
    {
        if (auth()->role != 'admin' && (auth()->role != 'company' && auth()->id_company != $id)) {
            return abort(401);
        }

        $company = Company::find($id);

        return view('companies.edit', compact('company'));
    }

    public function update()
    {
        if (auth()->role != 'admin' && (auth()->role != 'company' && auth()->id_company != $id)) {
            return abort(401);
        }

        $company = Company::find(request('id'));
        $company->update([
                'lane' => request('lane'),
                'address' => request('address'),
                'nit' => request('nit'),
                'name' => request('name'),
                'email' => request('email'),
                'phone' => request('phone'),
            ]);

        if (request('logo')) {
            $logo = request('logo')->save('resources/assets/img');
            
            $company->update([
                'logo' => $logo->filename,
            ]);
        }

        return redirect('companies/edit/' . request('id'));
    }

    public function delete($id)
    {
        if (auth()->role != 'admin') {
            return abort(401);
        }

        User::where('id_company', $id)->delete();
        Company::find($id)->delete();

        return redirect('/companies');
    }
}
