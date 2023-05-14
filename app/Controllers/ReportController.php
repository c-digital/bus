<?php

namespace App\Controllers;

use App\Models\Assign;
use App\Models\Cash;
use App\Models\Company;
use App\Models\Method;
use App\Models\Sales;
use App\Models\Ticket;
use App\Models\Travel;
use App\Models\User;
use App\Models\Vehicle;

class ReportController extends Controller
{
    public function __construct()
    {
        $this->middleware('Auth');
    }

    public function cash()
    {
        $users = User::get();

        return view('reports.cash', compact('users'));
    }

    public function sales()
    {
        return view('reports.sales');
    }

    public function passengers()
    {
        $travels = Travel::get();

        return view('reports.passengers', compact('travels'));
    }

    public function print()
    {
        if (request('report') == 'passengers') {
            $travel = Travel::find(get('travel'));

            $assign = Assign::where('id_travel', get('travel'))
                ->where('date', get('date'))
                ->first();

            $company = Company::find($travel->id_company);

            $driver = User::find($assign->id_driver);
            $driver = json($driver->extra);

            $vehicle = Vehicle::find($assign->vehicle);
            $vehicle = $vehicle[0];

            $tickets = Ticket::where('id_assign', $assign->id)->get();

            return view('reports.print.passengers', compact('driver', 'travel', 'company', 'vehicle', 'tickets'));
        }

        if (request('report') == 'cash') {
            $user = User::find(request('user'));

            $company = Company::find($user->id_company);

            $items = Cash::where('date', '>=', request('start'))
                ->where('date', '<=', request('end'))
                ->where('id_user', request('user'))
                ->get();

            $methods = Method::get();

            return view('reports.print.cash', compact('user', 'company', 'items', 'methods'));
        }
    }
}
