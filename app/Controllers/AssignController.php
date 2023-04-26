<?php

namespace App\Controllers;

use App\Models\Assign;
use App\Models\Travel;
use App\Models\Vehicle;
use App\Models\User;

class AssignController extends Controller
{
    public function index()
    {
        $assign = Assign::get();
        return view('assign.index', compact('assign'));
    }

    public function create()
    {
        $drivers = User::get();
        $travels = Travel::get();
        $vehicles = Vehicle::get();

        return view('assign.create', compact('drivers', 'travels', 'vehicles'));
    }

    public function store()
    {
        Vehicle::create([
            'date' => request('date'),
            'driver' => request('driver'),
            'vehicle' => request('vehicle'),
            'travel' => request('travel')
        ]);

        return redirect('/assign')
            ->with('success', 'Asignación creada satisfactoriamente');
    }

    public function edit($id)
    {
        $assign = Assign::find($id);
        $drivers = User::get();
        $travels = Travel::get();
        $vehicles = Vehicle::get();

        return view('assign.edit', compact('assign', 'drivers', 'travels', 'vehicles'));
    }

    public function update()
    {
        $vehicle = Vehicle::find(request('id'));
        $vehicle->update([
            'date' => request('date'),
            'driver' => request('driver'),
            'vehicle' => request('vehicle'),
            'travel' => request('travel')
        ]);

        return redirect('/assign')
            ->with('success', 'Asignación editada satisfactoriamente');
    }

    public function delete($id)
    {
        Vehicle::find($id)
            ->delete();

        return redirect('/assign')
            ->with('success', 'Asignación eliminada satisfactoriamente');
    }
}
