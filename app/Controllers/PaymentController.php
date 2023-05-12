<?php

namespace App\Controllers;

use App\Models\Method;
use App\Models\Payment;
use App\Models\Ticket;

class PaymentController extends Controller
{
    public function __construct()
    {
        $this->middleware('Auth');
    }
    
    public function create()
    {
        $methods = Method::get();

        $payments = Payment::where('id_sale', get('ticket'))
            ->get();

        $tickets = Ticket::where('id_sale', get('ticket'))
            ->get();

        $maxAmount = Ticket::where('id_sale', get('ticket'))
                ->sum('amount');

        $amountPayments = 0;

        if ($payments->count()) {
            $amountPayments = Payment::where('id_sale', get('ticket'))
                ->sum('amount');
        }

        return view('payments.create', compact('amountPayments', 'maxAmount', 'methods', 'payments', 'tickets'));
    }

    public function store()
    {
        $last = Cash::where('id_user', auth()->id)
            ->orderByDesc('id')
            ->first();

        $this->balance = isset($last->balance) ? $last->balance : 0;
        $this->status = isset($last->status) ? $last->status : 'Cerrada';

        if ($this->status == 'Cerrada') {
            return redirect('/payments/create?ticket=' . request('id_sale'))
                ->with('info', 'No puede agregar pagos porque la caja está cerrada.');
        }

        Payment::create([
            'id_sale' => request('id_sale'),
            'amount' => request('amount'),
            'method' => request('method'),
        ]);

        $balance = $this->balance + request('amount');

        Cash::create([
            'id_company' => auth()->id_company,
            'id_user' => auth()->id,
            'date' => now('Y-m-d'),
            'method' => request('method'),
            'description' => 'Pago de venta ' . request('id_sale'),
            'amount' => request('amount'),
            'type' => 'Entrada',
            'balance' => $balance,
            'status' => 'Abierta'
        ]);

        return redirect('/payments/create?ticket=' . request('id_sale'));
    }
}
