 if($seatlayout == '3-2'){
foreach ($seatArray as $seat) 
        {
           
            if ($rowSeat == 1) 
            {
                $html .= "<div class=\"row\">";
            }

            $html .= "<div class=\"col-2\">
                <div class='".(in_array($seat, $bookArray)?("seat ladies"):("seat occupied ChooseSeat"))."' data-item=\"\">
                <div class=\"seat-body\">
                    $seat
                    <span class=\"seat-handle-left\"></span>
                    <span class=\"seat-handle-right\"></span>
                    <span class=\"seat-bottom\"></span>
                </div>
                </div>
            </div> ";
          
            if ($rowSeat == 3) 
            {
                //adding a cental row
                if ((sizeof($seatArray)&0) == 2 && ($lastSeats == 0 || $lastSeats < $totalSeats)) {
                    continue;
                } else {
                    $html .= "<div class=\"col-2\">&nbsp;</div>";
                }
            } else if ($rowSeat == 5 || $rowSeat == sizeof($seatArray)) {
                //ends of each row
                $html .= "</div>";
                $rowSeat = 0;
            }

            $rowSeat++;
            $totalSeats++;

        }
 }else if($seatlayout == '2-3'){
    foreach ($seatArray as $seat) 
        {
           
            if ($rowSeat == 1) 
            {
                $html .= "<div class=\"row\">";
            }

            $html .= "<div class=\"col-2\">
                <div class='".(in_array($seat, $bookArray)?("seat ladies"):("seat occupied ChooseSeat"))."' data-item=\"\">
                <div class=\"seat-body\">
                    $seat
                    <span class=\"seat-handle-left\"></span>
                    <span class=\"seat-handle-right\"></span>
                    <span class=\"seat-bottom\"></span>
                </div>
                </div>
            </div> ";
          
            if ($rowSeat == 2) 
            {
                //adding a cental row
                if ((sizeof($seatArray)&0) == 2 && ($lastSeats == 0 || $lastSeats < $totalSeats)) {
                    continue;
                } else {
                    $html .= "<div class=\"col-2\">&nbsp;</div>";
                }
            } else if ($rowSeat == 5 || $rowSeat == sizeof($seatArray)) {
                //ends of each row
                $html .= "</div>";
                $rowSeat = 0;
            }

            $rowSeat++;
            $totalSeats++;

        }
 }else if($seatlayout == '2-2'){
    foreach ($seatArray as $seat) 
        {
           
            if ($rowSeat == 1) 
            {
                $html .= "<div class=\"row\">";
            }

            $html .= "<div class=\"col-2\">
                <div class='".(in_array($seat, $bookArray)?("seat ladies"):("seat occupied ChooseSeat"))."' data-item=\"\">
                <div class=\"seat-body\">
                    $seat
                    <span class=\"seat-handle-left\"></span>
                    <span class=\"seat-handle-right\"></span>
                    <span class=\"seat-bottom\"></span>
                </div>
                </div>
            </div> ";
          
            if ($rowSeat == 2) 
            {
                //adding a cental row
                if ((sizeof($seatArray)&0) == 2 && ($lastSeats == 0 || $lastSeats < $totalSeats)) {
                    continue;
                } else {
                    $html .= "<div class=\"col-2\">&nbsp;</div>";
                }
            } else if ($rowSeat == 4 || $rowSeat == sizeof($seatArray)) {
                //ends of each row
                $html .= "</div>";
                $rowSeat = 0;
            }

            $rowSeat++;
            $totalSeats++;

        }
 }else if($seatlayout == '1-1'){
    foreach ($seatArray as $seat) 
        {
           
            if ($rowSeat == 1) 
            {
                $html .= "<div class=\"row\">";
            }

            $html .= "<div class=\"col-2\">
                <div class='".(in_array($seat, $bookArray)?("seat ladies"):("seat occupied ChooseSeat"))."' data-item=\"\">
                <div class=\"seat-body\">
                    $seat
                    <span class=\"seat-handle-left\"></span>
                    <span class=\"seat-handle-right\"></span>
                    <span class=\"seat-bottom\"></span>
                </div>
                </div>
            </div> ";
          
            if ($rowSeat == 1) 
            {
                //adding a cental row
                if ((sizeof($seatArray)&0) == 2 && ($lastSeats == 0 || $lastSeats < $totalSeats)) {
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
 }else if($seatlayout == '2-1'){
    foreach ($seatArray as $seat) 
        {
           
            if ($rowSeat == 1) 
            {
                $html .= "<div class=\"row\">";
            }

            $html .= "<div class=\"col-2\">
                <div class='".(in_array($seat, $bookArray)?("seat ladies"):("seat occupied ChooseSeat"))."' data-item=\"\">
                <div class=\"seat-body\">
                    $seat
                    <span class=\"seat-handle-left\"></span>
                    <span class=\"seat-handle-right\"></span>
                    <span class=\"seat-bottom\"></span>
                </div>
                </div>
            </div> ";
          
            if ($rowSeat == 2) 
            {
                //adding a cental row
                if ((sizeof($seatArray)&0) == 2 && ($lastSeats == 0 || $lastSeats < $totalSeats)) {
                    continue;
                } else {
                    $html .= "<div class=\"col-2\">&nbsp;</div>";
                }
            } else if ($rowSeat == 3 || $rowSeat == sizeof($seatArray)) {
                //ends of each row
                $html .= "</div>";
                $rowSeat = 0;
            }

            $rowSeat++;
            $totalSeats++;

        }
 }else{
    foreach ($seatArray as $seat) 
        {
           
            if ($rowSeat == 1) 
            {
                $html .= "<div class=\"row\">";
            }

            $html .= "<div class=\"col-2\">
                <div class='".(in_array($seat, $bookArray)?("seat ladies"):("seat occupied ChooseSeat"))."' data-item=\"\">
                <div class=\"seat-body\">
                    $seat
                    <span class=\"seat-handle-left\"></span>
                    <span class=\"seat-handle-right\"></span>
                    <span class=\"seat-bottom\"></span>
                </div>
                </div>
            </div> ";
          
            if ($rowSeat == 1) 
            {
                //adding a cental row
                if ((sizeof($seatArray)&0) == 2 && ($lastSeats == 0 || $lastSeats < $totalSeats)) {
                    continue;
                } else {
                    $html .= "<div class=\"col-2\">&nbsp;</div>";
                }
            } else if ($rowSeat == 3 || $rowSeat == sizeof($seatArray)) {
                //ends of each row
                $html .= "</div>";
                $rowSeat = 0;
            }

            $rowSeat++;
            $totalSeats++;

        }
 }