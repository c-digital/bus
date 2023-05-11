<?php

namespace App\Controllers;

use App\Models\Cash;
use App\Models\Method;

class CashController extends Controller
{
    public function __construct()
    {
        $this->middleware('Auth');

        $last = Cash::where('id_user', auth()->id)
            ->orderByDesc('id')
            ->first();

        $this->balance = isset($last->balance) ? $last->balance : 0;
        $this->status = isset($last->status) ? $last->status : 'Cerrada';
    }

    public function index()
    {
        $methods = Method::get();

        $cash = Cash::where('id_user', auth()->id)
            ->where('date_create', '>', auth()->cash_last_close)
            ->get();

        $income = $cash->where('type', 'Entrada')->sum('amount');
        $out = $cash->where('type', 'Salida')->sum('amount');
        $balance = $this->balance;
        $status = $this->status;

        return view('cash.index', compact('cash', 'income', 'out', 'balance', 'status', 'methods'));
    }

    public function store()
    {
        if (request('open')) {
            Cash::create([
                'id_company' => auth()->id_company,
                'id_user' => auth()->id,
                'date' => now('Y-m-d'),
                'method' => 'Efectivo',
                'description' => 'Apertura de caja',
                'amount' => request('amount'),
                'type' => 'Entrada',
                'balance' => request('amount'),
                'status' => 'Abierta'
            ]);

            return redirect('/cash')
                ->with('info', 'Caja abierta correctamente');
        }

        if (request('close')) {
            Cash::create([
                'id_company' => auth()->id_company,
                'id_user' => auth()->id,
                'date' => now('Y-m-d'),
                'method' => 'Efectivo',
                'description' => 'Cierre de caja',
                'amount' => $this->balance,
                'type' => 'Salida',
                'balance' => 0,
                'status' => 'Cerrada'
            ]);

            session('cash_last_close', auth()->cash_last_close);

            User::find(auth()->id)->update(['cash_last_close' => now('Y-m-d h:i:s')]);

            return redirect('/cash')
                ->with('info', 'Caja cerrada correctamente');
        }

        if ($this->status == 'Abierta') {
            if (request('type') == 'Entrada') {
                $balance = $this->balance + request('amount');
            }

            if (request('type') == 'Salida') {
                $balance = $this->balance - request('amount');
            }

            Cash::create([
                'id_company' => auth()->id_company,
                'id_user' => auth()->id,
                'date' => now('Y-m-d'),
                'method' => request('method'),
                'description' => request('description'),
                'amount' => request('amount'),
                'type' => 'Entrada',
                'balance' => $balance,
                'status' => 'Abierta'
            ]);

            return redirect('/cash')
                    ->with('info', 'Movimiento agregado satisfactoriamente');            
        }

        return redirect('/cash')
            ->with('info', 'No puede agregar movimientos porque la caja está cerrada');    
    }

    public function show($id = '')
    {
        if (request('close')) {
            $cash = Cash::where('id_user', auth()->id_user)
                ->where('date_create', '>=', session('cash_last_close'))
                ->get();

            $methods = Method::get();

            return view('cash.close', compact('methods', 'cash'));
        }

        $cash = Cash::find($id);

        return view('cash.show', compact('cash'));
    }
}
