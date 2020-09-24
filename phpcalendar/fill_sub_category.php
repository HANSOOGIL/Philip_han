<?php

//fill_sub_category.php

include('book.php');

$timeslots = timeslots($duration, $cleanup, $start, $end);
$timeslotbyroom = timeslotbyroom($_POST["room"],$_POST["date"]);
$selectedtime= $_POST["tslot"];

   
$output = '<span><div class="col-md-4">From :<select name="item_edit" id="item_edit" class="form-control item_edit"><option value="">Select Category</option>';

foreach($timeslots as $row)
 {
    if(in_array($row,$timeslotbyroom)){} 
    else{
        if($selectedtime==$row)
        {
            $output .= '<option value ="'.substr($row, 0, 5).'" selected>'.substr($row, 0, 5).'</option>';          
        }else{
            $output .= '<option value="'.substr($row, 0, 5).'">'.substr($row, 0, 5).'</option>';
            }
    }
 }

$output .= '</select></div><div class="col-md-4"> To : <select name="item_sub_category" id="item_sub_category" class="form-control item_sub_category"><option value="">Select Category</option>';
                       
foreach($timeslots as $row)
    
 {
    if(in_array($row,$timeslotbyroom)){} 
    else{
        
        $x = substr($row, 0, 2);
        $int_cast = (int)$x;
        $sitem= substr($selectedtime, 0, 2);
        $int_select = (int)$sitem;
        if( $int_select == $int_cast ){
            $output .= '<option value ="'.substr($row, 8, 5).'" selected>'.substr($row, 8, 5).'</option>';          
        }elseif($int_select < $int_cast){
            $output .= '<option value="'.substr($row, 8, 5).'">'.substr($row, 8, 5).'</option>';
            }
    }
 }

$output .= '</select></div><button type="button" id="apply-btn" class="btn btn-primary repeater-add-btn">Apply</button></span>';


echo $output;
return $output;


?>