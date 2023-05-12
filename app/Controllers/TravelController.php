<?php

namespace App\Controllers;

use App\Models\City;
use App\Models\Company;
use App\Models\Route;
use App\Models\Travel;

class TravelController extends Controller
{
    public function __construct()
    {
        $this->middleware('Auth');
    }
    
    public function index()
    {
        $travels = Travel::get();
        return view('travels.index', compact('travels'));
    }

    public function create()
    {
        $companies = Company::get();
        $cities = City::get();
        $routes = Route::get();

        return view('travels.create', compact('companies', 'cities', 'routes'));
    }

    public function store()
    {
        Travel::create([
            'time' => request('time'),
            'days' => json(request('days')),
            'status' => request('status'),
            'stops' => json(request('stops')),
            'id_route' => request('route'),
            'id_company' => request('company'),
            'price' => request('price'),
        ]);

        return redirect('/travels')->with('success', 'Viaje creado satisfactoriamente');
    }

    public function edit($id)
    {
        $cities = City::get();
        $routes = Route::get();
        $companies = Company::get();
        $travel = Travel::find($id);
        
        return view('travels.edit', compact('companies', 'cities', 'routes', 'travel'));
    }

    public function update()
    {
        Travel::find(request('id'))
            ->update([
                'time' => request('time'),
                'days' => json(request('days')),
                'status' => request('status'),
                'stops' => request('stops'),
                'id_route' => request('route'),
                'id_company' => request('company'),
                'price' => request('price'),
            ]);

        return redirect('/travels')->with('success', 'Viaje actualizado satisfactoriamente');
    }

    public function delete($id)
    {
        Travel::find($id)->delete();
        return redirect('/travels')->with('success', 'Viaje eliminado satisfactoriamente');
    }
}
