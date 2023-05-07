<?php

namespace App\Controllers;

use App\Models\Assign;
use App\Models\Customer;
use App\Models\Payment;
use App\Models\Ticket;

class TicketController extends Controller
{
    public function __construct()
    {
        $this->middleware('Auth');
    }
    
    public function index()
    {
        $assign = Assign::where('date', now('Y-m-d'))
            ->get();

        if (get('date')) {
            $assign = Assign::where('date', get('date'))
                ->get();
        }

        return view('tickets.index', compact('assign'));
    }

    public function create()
    {
        $assign = Assign::find(get('assign'));

        $seatArray = array();
        $seatArray = array_map('trim', explode(',', $assign->vehicle->type->seats_number));

        $seatlayout = $assign->vehicle->type->design;

        $html = "";

        $bookArray = [];

        $tickets = Ticket::where('id_assign', get('assign'))->get();

        foreach ($tickets as $ticket) {
            $bookArray[] = $ticket->seat;
        }
        

        $rowSeat    = 1;
        $totalSeats = 1;
        $lastSeats  = ((sizeof($seatArray)>=3)?(sizeof($seatArray)-5):sizeof($seatArray));

        if ($seatlayout == '3-2') {
            foreach ($seatArray as $seat)  {
                if ($rowSeat == 1) {
                    $html .= "<div class=\"row\">";
                }

                $html .= "<div class=\"col-2\">
                    <div class='" . (in_array($seat, $bookArray) ? ("seat ladies") : ("seat occupied ChooseSeat")) . "' data-item=\"\">
                    <div class=\"seat-body\">
                        $seat
                        <span class=\"seat-handle-left\"></span>
                        <span class=\"seat-handle-right\"></span>
                        <span class=\"seat-bottom\"></span>
                    </div>
                    </div>
                </div>";
                  
                if ($rowSeat == 3) {
                    if ((sizeof($seatArray) & 0) == 2 && ($lastSeats == 0 || $lastSeats < $totalSeats)) {
                        continue;
                    } else {
                        $html .= "<div class=\"col-2\">&nbsp;</div>";
                    }
                } else if ($rowSeat == 5 || $rowSeat == sizeof($seatArray)) {
                    $html .= "</div>";
                    $rowSeat = 0;
                }

                $rowSeat++;
                $totalSeats++;
            }
        } else if($seatlayout == '2-3') {
            foreach ($seatArray as $seat) {                   
                if ($rowSeat == 1) {
                    $html .= "<div class=\"row\">";
                }

                $html .= "<div class=\"col-2\">
                    <div class='" . (in_array($seat, $bookArray) ? ("seat ladies") : ("seat occupied ChooseSeat")) . "' data-item=\"\">
                    <div class=\"seat-body\">
                        $seat
                        <span class=\"seat-handle-left\"></span>
                        <span class=\"seat-handle-right\"></span>
                        <span class=\"seat-bottom\"></span>
                    </div>
                    </div>
                </div>";
              
                if ($rowSeat == 2) {
                    if ((sizeof($seatArray) & 0) == 2 && ($lastSeats == 0 || $lastSeats < $totalSeats)) {
                        continue;
                    } else {
                        $html .= "<div class=\"col-2\">&nbsp;</div>";
                    }
                } else if ($rowSeat == 5 || $rowSeat == sizeof($seatArray)) {
                    $html .= "</div>";
                    $rowSeat = 0;
                }

                $rowSeat++;
                $totalSeats++;
            }
         } else if($seatlayout == '2-2'){
            foreach ($seatArray as $seat) {                   
                if ($rowSeat == 1) {
                    $html .= "<div class=\"row\">";
                }

                $html .= "<div class=\"col-2\">
                    <div class='" . (in_array($seat, $bookArray) ? ("seat ladies") : ("seat occupied ChooseSeat")) . "' data-item=\"\">
                    <div class=\"seat-body\">
                        $seat
                        <span class=\"seat-handle-left\"></span>
                        <span class=\"seat-handle-right\"></span>
                        <span class=\"seat-bottom\"></span>
                    </div>
                    </div>
                </div>";
              
                if ($rowSeat == 2) {
                    if ((sizeof($seatArray) & 0) == 2 && ($lastSeats == 0 || $lastSeats < $totalSeats)) {
                        continue;
                    } else {
                        $html .= "<div class=\"col-2\">&nbsp;</div>";
                    }
                } else if ($rowSeat == 4 || $rowSeat == sizeof($seatArray)) {
                    $html .= "</div>";
                    $rowSeat = 0;
                }

                $rowSeat++;
                $totalSeats++;
            }
         } else if($seatlayout == '1-1'){
            foreach ($seatArray as $seat) {               
                if ($rowSeat == 1) {
                    $html .= "<div class=\"row\">";
                }

                $html .= "<div class=\"col-2\">
                    <div class='" . (in_array($seat, $bookArray) ? ("seat ladies") : ("seat occupied ChooseSeat")) . "' data-item=\"\">
                    <div class=\"seat-body\">
                        $seat
                        <span class=\"seat-handle-left\"></span>
                        <span class=\"seat-handle-right\"></span>
                        <span class=\"seat-bottom\"></span>
                    </div>
                    </div>
                </div>";
              
                if ($rowSeat == 1) {
                    if ((sizeof($seatArray) & 0) == 2 && ($lastSeats == 0 || $lastSeats < $totalSeats)) {
                        continue;
                    } else {
                        $html .= "<div class=\"col-2\">&nbsp;</div>";
                    }
                } else if ($rowSeat == 2 || $rowSeat == sizeof($seatArray)) {
                    //ends of each row
                    $html .= "</div>";
                    $rowSeat = 0;
                }

                $rowSeat++;
                $totalSeats++;

            }
         } else if($seatlayout == '2-1'){
            foreach ($seatArray as $seat) {               
                if ($rowSeat == 1) {
                    $html .= "<div class=\"row\">";
                }

                $html .= "<div class=\"col-2\">
                    <div class='" . (in_array($seat, $bookArray) ? ("seat ladies") : ("seat occupied ChooseSeat")) . "' data-item=\"\">
                    <div class=\"seat-body\">
                        $seat
                        <span class=\"seat-handle-left\"></span>
                        <span class=\"seat-handle-right\"></span>
                        <span class=\"seat-bottom\"></span>
                    </div>
                    </div>
                </div>";
              
                if ($rowSeat == 2) {
                    if ((sizeof($seatArray) & 0) == 2 && ($lastSeats == 0 || $lastSeats < $totalSeats)) {
                        continue;
                    } else {
                        $html .= "<div class=\"col-2\">&nbsp;</div>";
                    }
                } else if ($rowSeat == 3 || $rowSeat == sizeof($seatArray)) {
                    $html .= "</div>";
                    $rowSeat = 0;
                }

                $rowSeat++;
                $totalSeats++;
            }
         } else {
            foreach ($seatArray as $seat) {               
                if ($rowSeat == 1) {
                    $html .= "<div class=\"row\">";
                }

                $html .= "<div class=\"col-2\">
                    <div class='" . (in_array($seat, $bookArray) ? ("seat ladies") : ("seat occupied ChooseSeat")) . "' data-item=\"\">
                    <div class=\"seat-body\">
                        $seat
                        <span class=\"seat-handle-left\"></span>
                        <span class=\"seat-handle-right\"></span>
                        <span class=\"seat-bottom\"></span>
                    </div>
                    </div>
                </div>";
              
                if ($rowSeat == 1) {
                    if ((sizeof($seatArray) & 0) == 2 && ($lastSeats == 0 || $lastSeats < $totalSeats)) {
                        continue;
                    } else {
                        $html .= "<div class=\"col-2\">&nbsp;</div>";
                    }
                } else if ($rowSeat == 3 || $rowSeat == sizeof($seatArray)) {
                    $html .= "</div>";
                    $rowSeat = 0;
                }

                $rowSeat++;
                $totalSeats++;
            }
         }

        return view('tickets.create', compact('assign', 'html'));
    }

    public function store()
    {
        $ticket = Ticket::orderByDesc('id')->first();

        $id_sale = isset($ticket->id_sale) ? $ticket->id_sale + 1 : 1;

        if (! request('tickets')) {
            return redirect('/tickets/create?assign=' . request('assign'))
                ->with('error', 'Debe registrar los pasajeros');
        }

        foreach (request('tickets') as $ticket) {
            $customer = Customer::where('ci', $ticket['ci'])->first();

            if ($customer) {
                $customer->update([
                    'ci' => $ticket['ci'],
                    'name' => $ticket['name'],
                    'date_birth' => $ticket['date_birth'],
                    'age' => $ticket['age'],
                    'phone' => $ticket['phone'],
                    'address' => $ticket['address']
                ]);
            } else {
                $customer = new Customer();
                $customer->ci = $ticket['ci'];
                $customer->name = $ticket['name'];
                $customer->date_birth = $ticket['date_birth'];
                $customer->age = $ticket['age'];
                $customer->phone = $ticket['phone'];
                $customer->address = $ticket['address'];
                $customer->save();
            }

            Ticket::create([
                'id_customer' => $customer->id,
                'id_assign' => request('assign'),
                'id_sale' => $id_sale,
                'id_company' => auth()->id_company,
                'id_user' => auth()->id,
                'seat' => $ticket['seat'],
                'amount' => $ticket['amount'],
                'status' => 0,
            ]);
        }

        return redirect("/payments/create?ticket={$id_sale}");
    }

    public function print()
    {
        $tickets = Ticket::where('id_sale', request('id_sale'))
            ->get();

        $payments = Payment::where('id_sale', request('id_sale'))
            ->get();

        $amountTickets = Ticket::where('id_sale', request('id_sale'))
                ->sum('amount');

        if ($payments->count()) {
            $amountPayment = Payment::where('id_sale', request('id_sale'))
                ->sum('amount');

            if ($amountTickets < $amountPayment) {
                $status = 'Pago parcial';
            } else {
                $status = 'Pago completo';
            }

        } else {
            $status = 'Reservado';
        }

        return view('tickets.print', compact('amountPayment', 'status', 'tickets', 'amountTickets', 'payments'));
    }
}
