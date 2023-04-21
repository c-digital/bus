<?php

namespace App\Controllers;

use App\Models\BusType;

class BusTypeController extends Controller
{
    public function index()
    {
        $types = BusType::get();
        return view('bus-type.index', compact('types'));
    }

    public function create()
    {
        return view('bus-type.create');
    }

    public function store()
    {
        BusType::create([
            'type' => request('type'),
            'design' => request('design'),
            'total_seats' => request('total_seats'),
            'seats_number' => request('seats_number'),
            'status' => request('status'),
        ]);

        return redirect('/bus-type')->with('info', 'Tipo de bus creado satisfactoriamente');
    }

    public function edit($id)
    {
        $type = BusType::find($id);
        return view('bus-type.edit', compact('type'));
    }

    public function update()
    {
        BusType::find(request('id'))
            ->create([
                'type' => request('type'),
                'design' => request('design'),
                'total_seats' => request('total_seats'),
                'seats_number' => request('seats_number'),
                'status' => request('status'),
            ]);

        return redirect('/bus-type')->with('info', 'Tipo de bus actualizado satisfactoriamente');
    }

    public function delete($id)
    {
        BusType::find($id)->delete();
        return redirect('/bus-type')->with('info', 'Tipo de bus eliminado satisfactoriamente');
    }
}
