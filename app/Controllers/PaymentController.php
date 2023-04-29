<?php

namespace App\Controllers;

use App\Models\Ticket;

class PaymentController extends Controller
{
    public function create()
    {
        $tickets = Ticket::where('id_sale', get('ticket'))->get();
        return view('payments.create', compact('tickets'));
    }
}
