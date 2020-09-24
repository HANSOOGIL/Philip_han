<?php



if(isset($_POST['submit'])){
    $sdate = date('Y-m-d');
    $date = $_POST['selecteddate'];
    $name = $_POST['name'];
    $room = $_POST['room'];
    $timeslot = $_POST['timeslot'];
   // $etimeslot = $_POST['etimeslot'];
    
    $purpose = $_POST['purpose'];
    $mysqli = new mysqli('localhost', 'root', '', 'bookingcalendar');
    $stmt = $mysqli->prepare("select * from room_reservation where date = ? AND rrname =? AND (timeslot = ? OR timeslot =?)");
    $stmt->bind_param('ssss', $date, $room, $timeslot,$etimeslot);
    if($stmt->execute()){
        $result = $stmt->get_result();
        if($result->num_rows>0){
        $msg = "<div class='alert alert-danger'>Already booked</div>";
        }else{
            $stmt = $mysqli->prepare("INSERT INTO room_reservation (rrname, sdate, date, timeslot, userid, purpose) VALUES (?,?,?,?,?,?)");
        $stmt->bind_param('ssssss', $room, $sdate, $date, $timeslot, $name, $purpose);
        $stmt->execute();
        $msg = "<div class='alert alert-success'>Booking Successfull</div>";
        $bookings[]=$timeslot;
        $stmt->close();
        $mysqli->close();
        }

        }
   
}

 

function rname_patch($date){
$mysqli = new mysqli('localhost', 'root', '', 'bookingcalendar');
    $stmt = $mysqli->prepare("select * from room where valid = 'y'");
    //$stmt->bind_param('s', "y");
    $rooms= array();
    if($stmt->execute()){
        $result = $stmt->get_result();
        if($result->num_rows>0){
            while($row=$result->fetch_assoc()){
                $rooms[]=$row['rname'];                
            }
        $stmt->close();
        }
            
    }
    return $rooms;
}

//Change 30 min

$duration = 30;
$cleanup = 0;
$start ="09:00";
$end="20:00";

    
function timeslots($duration, $cleanup, $start, $end){
    $start = new DateTime($start);
    $end = new DateTime($end);
    $interval = new DateInterval("PT".$duration."M");
    $cleanupinterval = new DateInterval("PT".$cleanup."M");
    $slots=array();
    
    for ($intStart = $start;$intStart<$end;$intStart->add($interval)->add($cleanupinterval)){
        $endPeriod=clone $intStart;
        $endPeriod->add($interval);
        if($endPeriod>$end){
            break;
        }
            $slots[]=$intStart->format("H:iA")."-".$endPeriod->format("H:iA");
        
    }
    return $slots; 
}

function timeslotbyroom($rs,$date){
     $mysqli = new mysqli('localhost', 'root', '', 'bookingcalendar');
        $stmt = $mysqli->prepare("select * from room_reservation where date = ? AND rrname = ?");
        $stmt->bind_param('ss', $date, $rs);
        $bookings= array();
        if($stmt->execute()){
            $result = $stmt->get_result();
            if($result->num_rows>0){
                while($row=$result->fetch_assoc()){
                  $bookings[]=$row['timeslot'];

                }
            $stmt->close();
            }

        }
    
     return $bookings; 

}

function purposebyroom($rs,$date,$time){
     $mysqli = new mysqli('localhost', 'root', '', 'bookingcalendar');
        $stmt = $mysqli->prepare("select * from room_reservation where date = ? AND rrname = ? AND timeslot = ?");
        $stmt->bind_param('sss', $date, $rs, $time );
        $purpose= array();
        if($stmt->execute()){
            $result = $stmt->get_result();
            if($result->num_rows>0){
                while($row=$result->fetch_assoc()){
                  $purpose[]=$row['remark'];

                }
            $stmt->close();
            }

        }
    
     return $purpose; 

}


function validcheck($rs,$date,$time){
      $mysqli = new mysqli('localhost', 'root', '', 'bookingcalendar');
        $stmt = $mysqli->prepare("select * from room_reservation where date = ? AND rrname = ? AND timeslot = ?");
        $stmt->bind_param('sss', $date, $rs, $time );
        $purpose= array();
        if($stmt->execute()){
            $result = $stmt->get_result();
            if($result->num_rows>0){
                while($row=$result->fetch_assoc()){
                  $purpose[]=$row['status'];

                }
            $stmt->close();
            }

        }
    
     return $purpose;

}



function holidaycheck($date){
      $mysqli = new mysqli('localhost', 'root', '', 'bookingcalendar');
        $stmt = $mysqli->prepare("select * from holiday_set where date = ? and valid ='y'");
        $stmt->bind_param('s', $date);
        $purpose= array();
        if($stmt->execute()){
            $result = $stmt->get_result();
            if($result->num_rows>0){
                while($row=$result->fetch_assoc()){
                  $purpose[]=$row['name'];

                }
            $stmt->close();
            }

        }
    
     return $purpose;

}








//rrname, sdate, date, timeslot, userid, purpose

function schedulebydate($date){
     $mysqli = new mysqli('localhost', 'root', '', 'bookingcalendar');
        $stmt = $mysqli->prepare("select * from room_reservation where date = ?");
        $stmt->bind_param('s', $date); 
    $bookings= array();
        if($stmt->execute()){
            $result = $stmt->get_result();
            if($result->num_rows>0){
                while($row=$result->fetch_assoc()){
                    
                   $bookings[] = array(
                   //'name'   => $row['userid'],
                   'room'   => $row["rrname"],      
                   //'date'   => $row['date'],         
                   'purpose'   => $row['purpose'],        
                   'timeslot'  => $row['timeslot'],
                   //'sdate'  => $row['sdate']      
                  );

                }
            $stmt->close();
            }

        }
    
     return $bookings; 

}


?>

    
