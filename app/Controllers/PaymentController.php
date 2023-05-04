<?php

namespace App\Controllers;

use App\Models\Method;
use App\Models\Payment;
use App\Models\Ticket;

class PaymentController extends Controller
{
    public function create()
    {
        $methods = Method::get();

        $payments = Payment::where('id_sale', get('ticket'))
            ->get();

        $tickets = Ticket::where('id_sale', get('ticket'))
            ->get();

        return view('payments.create', compact('methods', 'payments', 'tickets'));
    }

    public function store()
    {
        Payment::create([
            'id_sale' => request('id_sale'),
            'amount' => request('amount'),
            'method' => request('method'),
        ]);

        return redirect('/payments/create?ticket=' . request('id_sale'));
    }
}
