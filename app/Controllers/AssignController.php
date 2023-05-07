<?php

namespace App\Controllers;

use App\Models\Assign;
use App\Models\Travel;
use App\Models\Vehicle;
use App\Models\User;

class AssignController extends Controller
{
    public function __construct()
    {
        $this->middleware('Auth');
    }
    
    public function index()
    {
        $assign = Assign::get();
        return view('assign.index', compact('assign'));
    }

    public function create()
    {
        $drivers = User::where('role', 'driver')->get();
        $travels = Travel::get();
        $vehicles = Vehicle::get();

        return view('assign.create', compact('drivers', 'travels', 'vehicles'));
    }

    public function store()
    {
        $day = carbon()
            ->parse(request('date'))
            ->format('l');

        $travel = Travel::find(request('travel'));

        if (! in_array(strtolower($day), json($travel->days))) {
            $day = translateDays($day);
            $error = "No puede crear una asignación para el viaje '{$travel->name}' en día $day.";

            return redirect('/assign/create')
                ->with('error', $error);
        }

        Assign::create([
            'date' => request('date'),
            'id_driver' => request('driver'),
            'id_vehicle' => request('vehicle'),
            'id_travel' => request('travel'),
            'status' => 'No iniciado',
        ]);

        return redirect('/assign')
            ->with('success', 'Asignación creada satisfactoriamente');
    }

    public function edit($id)
    {
        $assign = Assign::find($id);
        $drivers = User::where('role', 'driver')->get();
        $travels = Travel::get();
        $vehicles = Vehicle::get();

        return view('assign.edit', compact('assign', 'drivers', 'travels', 'vehicles'));
    }

    public function update()
    {
        $day = carbon()
            ->parse(request('date'))
            ->format('l');

        $travel = Travel::find(request('travel'));

        if (! in_array($day, json($travel->days))) {
            $error = "No puede crear una asignación para el viaje '{$travel->name}' en día {$day}.";

            return redirect('/assign/edit/' . request('id'))
                ->with('error', $error);
        }
        
        $assign = Assign::find(request('id'));
        $assign->update([
            'date' => request('date'),
            'id_driver' => request('driver'),
            'id_vehicle' => request('vehicle'),
            'id_travel' => request('travel'),
            'status' => 'No iniciado',
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
