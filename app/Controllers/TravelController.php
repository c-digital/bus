<?php

namespace App\Controllers;

use App\Models\City;
use App\Models\Route;
use App\Models\Travel;

class TravelController extends Controller
{
    public function index()
    {
        $travels = Travel::get();
        return view('travels.index', compact('travels'));
    }

    public function create()
    {
        $cities = City::get();
        $routes = Route::get();

        return view('travels.create', compact('cities', 'routes'));
    }

    public function store()
    {
        Travel::create([
            'time' => request('time'),
            'days' => json(request('days')),
            'status' => request('status'),
            'stops' => request('stops'),
            'id_route' => request('route'),
            'price' => request('price'),
        ]);

        return redirect('/travels')->with('success', 'Viaje creado satisfactoriamente');
    }

    public function edit($id)
    {
        $cities = City::get();
        $routes = Route::get();

        $travel = Travel::find($id);
        
        return view('travels.edit', compact('cities', 'routes', 'travel'));
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
