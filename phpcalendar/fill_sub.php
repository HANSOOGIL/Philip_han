<?php

//fill_sub_category.php

include('book.php');









$timeslots = timeslots($duration, $cleanup, $start, $end);
$timeslotbyroom = timeslotbyroom($_POST["room"],$_POST["date"]);

$selectedtime = substr($_POST["selectedtime"], 0, 5);    
   
$output = '';

foreach($timeslots as $row)
 {
    if(in_array($row,$timeslotbyroom)){} 
    else{
        $x = substr($row, 0, 5);
        $int_cast = strtotime($x);
        $int_select = strtotime($selectedtime);
        if( $int_select < $int_cast ){
  $output .= '<option value="'.substr($row, 0, 5).'">'.substr($row, 0, 5).'</option>';
    }}
 }

echo $output;
return $output;



?>