<?php

namespace App\Controllers;

use App\Models\City;

class CityController extends Controller
{
    public function __construct()
    {
        $this->middleware('Auth');
    }

    public function index()
    {
        $cities = City::get();
        return view('cities.index', compact('cities'));
    }

    public function create()
    {
        return view('cities.create');
    }

    public function store()
    {
        City::create([
            'name' => request('name')
        ]);

        return redirect('/cities')->with('success', 'Ciudad creado satisfactoriamente');
    }

    public function edit($id)
    {
        $city = City::find($id);

        return view('cities.edit', compact('city'));
    }

    public function update()
    {
        City::find(request('id'))
            ->update([
                'name' => request('name')
            ]);

        return redirect('/cities')->with('success', 'Ciudad actualizado satisfactoriamente');
    }

    public function delete($id)
    {
        City::find($id)->delete();
        return redirect('/cities')->with('success', 'Ciudad eliminado satisfactoriamente');
    }
}
