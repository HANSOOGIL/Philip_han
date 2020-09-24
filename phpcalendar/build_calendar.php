<?php

include('book.php');

function build_calendar($month, $year) {
    $mysqli = new mysqli('localhost', 'root', '', 'bookingcalendar');
   /* 
    */ 
    
     // Create array containing abbreviations of days of week.
     $daysOfWeek = array('Monday','Tuesday','Wednesday','Thursday','Friday','Saturday','Sunday');

     // What is the first day of the month in question?
     $firstDayOfMonth = mktime(0,0,0,$month,1,$year);

     // How many days does this month contain?
     $numberDays = date('t',$firstDayOfMonth);

     // Retrieve some information about the first day of the
     // month in question.
     $dateComponents = getdate($firstDayOfMonth);

     // What is the name of the month in question?
     $monthName = $dateComponents['month'];

     // What is the index value (0-6) of the first day of the
     // month in question.
     $dayOfWeek = $dateComponents['wday'];
     if($dayOfWeek==0){
         $dayOfWeek=6;
         
     }else{
         $dayOfWeek=$dayOfWeek-1;
     }

     // Create the table tag opener and day headers
     
    $datetoday = date('Y-m-d');
    
    
    
    $calendar = "<table class='table table-bordered' id='calendar'>";
    $calendar.= "<center><h2>$monthName $year</h2>";
    $calendar.= "<a class='btn btn-xs btn-primary' href='?month=".date('m', mktime(0, 0, 0, $month-1, 1, $year))."&year=".date('Y', mktime(0, 0, 0, $month-1, 1, $year))."'>Previous Month</a> ";
    
    $calendar.= " <a class='btn btn-xs btn-primary' href='?month=".date('m')."&year=".date('Y')."'>Current Month</a> ";
    
    $calendar.= "<a class='btn btn-xs btn-primary' href='?month=".date('m', mktime(0, 0, 0, $month+1, 1, $year))."&year=".date('Y', mktime(0, 0, 0, $month+1, 1, $year))."'>Next Month</a></center><br>";
  
        
      $calendar .= "<tr>";

     // Create the calendar headers

     foreach($daysOfWeek as $day) {
          $calendar .= "<th  class='header'><center>$day</center></th>";
     } 

     // Create the rest of the calendar

     // Initiate the day counter, starting with the 1st.

     $currentDay = 1;

     $calendar .= "</tr><tr>";

     // The variable $dayOfWeek is used to
     // ensure that the calendar
     // display consists of exactly 7 columns.

     if ($dayOfWeek > 0) { 
         for($k=0;$k<$dayOfWeek;$k++){
                $calendar .= "<td  class='empty'></td>"; 

         }
     }
    
     
     $month = str_pad($month, 2, "0", STR_PAD_LEFT);
  
     while ($currentDay <= $numberDays) {

          // Seventh column (Saturday) reached. Start a new row.

          if ($dayOfWeek == 7) {

               $dayOfWeek = 0;
               $calendar .= "</tr><tr>";

          }
          
          $currentDayRel = str_pad($currentDay, 2, "0", STR_PAD_LEFT);
          $date = "$year-$month-$currentDayRel";
          
            $dayname = strtolower(date('l', strtotime($date)));
            $eventNum = 0;
            $today = $date==date('Y-m-d')? "today" : "";
               
            $schedulername="<table style=\"color:blue;border:3px;width:100%;text-align:center;\">
                        <tr>
                        <th style=\"color:white;border:1px;text-align:center;\">Room</th>
                        <th style=\"color:white;border:1px;text-align:center;\">Booking</th>                        
                        </tr>
                        
                        ";
         $scount=0;
         if($date<date('Y-m-d')){
             //$schedule = schedulebydate($date);
             //$rname= rname_patch($date);
             //foreach($rname as $rs){
             //$roomschedule = timeslotbyroom($rs,$date);
             //$scount=count($roomschedule);
             //$schedulername.= "<tr><th style=\"color:white;border:1px;text-align:center;\">".$rs."</th>";
             //$schedulername.= "<th style=\"color:white;border:1px;text-align:center;\">".$scount."/11</th></tr>";    
                              
             //$schedulername[] = $rows['room'];
                 
             //}
             
                 //$schedulername.= "<th>".$rows['timeslot']."</th></tr>";
             
            //$schedulername.= "</table>";
             
             //array_count_values($schedulername) .json_encode($schedule).
             $calendar.="<td><h4>$currentDay</h4><button type='button' class='btn btn-danger btn-xs' onclick='openRightMenu(".strtotime($date).")'>N/A</button>";      
         
         //$calendar.="<td><h4>$currentDay</h4><button type='button' class='btn btn-danger btn-xs'>N/A</button>"; 
         
         }else{
             $holiday= holidaycheck($date);
            if(count($holiday)>0){
                     $calendar.="<td><h4><font color='red'>$currentDay</font></h4><button type='button' class='btn btn-default btn-xs'>Holiday</button>";       
                 }             
             else{
             
             $rname= rname_patch($date);
             foreach($rname as $rs){
             $roomschedule = timeslotbyroom($rs,$date);
             $scount=count($roomschedule);
             $schedulername.= "<tr><th style=\"color:white;border:1px;text-align:center;\">".$rs."</th>";
             $schedulername.= "<th style=\"color:white;border:1px;text-align:center;\">".$scount."/11</th></tr>";    
                              
             //$schedulername[] = $rows['room'];
                 
             }
             
                 //$schedulername.= "<th>".$rows['timeslot']."</th></tr>";
             
            $schedulername.= "</table>";
             $calendar.="<td class='$today'><h4>$currentDay</h4>  
             <button type='button' class='btn btn-success btn-xs testtooltip' data-toggle='tooltip' data-html='true' data-container='body' data-placement='top' title='$schedulername' onclick='openRightMenu(".strtotime($date).")'>Book</button>";
         }}
         //<a href='main.php?date=".$date."' class='btn btn-success btn-xs' target='_top'>Book</a>";
            //<a href='main.php?date=".$date." class='button'> Book </a>
            // <button class="w3-button w3-teal w3-xlarge w3-right" onclick="openRightMenu()">&#9776;</button>
           //<button class='btn btn-success btn-xs' onclick='openRightMenu(".strtotime($date).")'>Book</button>";
         //<a href='main.php?date=".$date."'><button class='btn btn-success btn-xs' onclick='openRightMenu(".strtotime($date).")'>Book</button></a>";
            
          $calendar .="</td>";
          // Increment counters
 
          $currentDay++;
          $dayOfWeek++;

     }
     
     

     // Complete the row of the last week in month, if necessary

     if ($dayOfWeek != 7) { 
     
          $remainingDays = 7 - $dayOfWeek;
            for($l=0;$l<$remainingDays;$l++){
                $calendar .= "<td class='empty'></td>"; 

         }

     }
     
     $calendar .= "</tr>";

     $calendar .= "</table>";

     echo $calendar;

}
?>
<html>
 


    
</html>


