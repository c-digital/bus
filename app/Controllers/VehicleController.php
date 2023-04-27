<?php

namespace App\Controllers;

use App\Models\BusType;
use App\Models\Vehicle;

class VehicleController extends Controller
{
    public function index()
    {
        $vehicles = Vehicle::get();
        return view('vehicle.index', compact('vehicles'));
    }

    public function create()
    {
        $types = BusType::get();
        return view('vehicle.create', compact('types'));
    }

    public function store()
    {
        Vehicle::create([
            'id_type' => request('type'),
            'internal_number' => request('internal_number'),
            'plate' => request('plate'),
            'year' => request('year'),
            'model' => request('model'),
            'chasis_number' => request('chasis_number'),
            'owner' => request('owner'),
            'owner_phone' => request('owner_phone'),
            'status' => request('status')
        ]);

        return redirect('/vehicle')->with('info', 'Vehículo agregado satisfactoriamente');
    }

    public function edit($id)
    {
        $types = BusType::get();
        $vehicule = Vehicle::find($id);
        return view('vehicle.edit', compact('types', 'vehicle'));
    }

    public function update()
    {
        Vehicle::find(request('id'))
            ->update([
                'id_type' => request('type'),
                'internal_number' => request('internal_number'),
                'plate' => request('plate'),
                'year' => request('year'),
                'model' => request('model'),
                'chasis_number' => request('chasis_number'),
                'owner' => request('owner'),
                'owner_phone' => request('owner_phone'),
                'status' => request('status')
            ]);

        return redirect('/vehicle')->with('info', 'Vehículo actualizado satisfactoriamente');
    }

    public function delete($id)
    {
        Vehicle::find($id)
            ->delete();

        return redirect('/vehicle')
            ->with('info', 'Vehículo eliminado satisfactoriamente');
    }
}
