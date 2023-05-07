<?php

namespace App\Controllers;

use App\Models\City;
use App\Models\Route;

class RouteController extends Controller
{
    public function __construct()
    {
        $this->middleware('Auth');
    }
    
    public function index()
    {
        $routes = Route::get();
        return view('routes.index', compact('routes'));
    }

    public function create()
    {
        $cities = City::get();

        return view('routes.create', compact('cities'));
    }

    public function store()
    {
        Route::create([
            'destination' => request('destination'),
            'origin' => request('origin'),
            'status' => request('status'),
            'time' => request('time'),
            'distance' => request('distance'),
        ]);

        return redirect('/routes')->with('success', 'Ruta creada satisfactoriamente');
    }

    public function edit($id)
    {
        $route = Route::find($id);

        return view('routes.edit', compact('route'));
    }

    public function update()
    {
        Route::find(request('id'))
            ->update([
                'destination' => request('destination'),
                'origin' => request('origin'),
                'status' => request('status'),
                'time' => request('time'),
                'distance' => request('distance'),
            ]);

        return redirect('/routes')->with('success', 'Ruta actualizado satisfactoriamente');
    }

    public function delete($id)
    {
        Route::find($id)->delete();
        return redirect('/routes')->with('success', 'Ruta eliminado satisfactoriamente');
    }
}
