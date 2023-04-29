<?php

namespace App\Controllers;

use App\Models\Assign;
use App\Models\Customer;
use App\Models\Ticket;

class TicketController extends Controller
{
    public function index()
    {
        $assign = Assign::where('date', '>=', now('Y-m-d'))
            ->get();

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
        $id_sale = Ticket::orderByDesc('id')->first()->id_sale ?? 1;

        foreach (request('tickets') as $ticket) {
            $customer = Customer::updateOrCreate(
                ['ci' => $ticket['ci']],
                [
                    'name' => $ticket['name'],
                    'date_birth' => $ticket['date_birth'],
                    'age' => $ticket['age'],
                    'phone' => $ticket['phone'],
                    'address' => $ticket['address']
                ]
            );

            Ticket::create([
                'id_customer' => $customer->id,
                'id_assign' => request('assign'),
                'id_sale' => $id_sale,
                'seat' => $ticket['seat'],
                'status' => 0
            ]);
        }

        return redirect("/payments/create?ticket={$id_sale}");
    }
}
