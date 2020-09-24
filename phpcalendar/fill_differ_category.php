<?php

//fill_sub_category.php

include('book.php');

$rdate =$_POST["date"];
$edate =$_POST["edate"];
$days = $_POST["days"];
$begin =  new DateTime($rdate);
$end =  new DateTime($edate);
 //$daysOfWeek = array('Monday','Tuesday','Wednesday','Thursday','Friday','Saturday','Sunday');

//$interval = DateInterval::createFromDateString("1 day"  );
//$period = new DatePeriod($rdate, $interval, $edate);


$timeslots = timeslots($duration, $cleanup, $_POST["stime"], $_POST["etime"]);

 
$output = '</Br><span><div class="col-md-5"><center><label for="">Date</label></center></div><div class="col-md-5"><label for="">Timeslot</label></div>';

for($i = $begin ; $i <= $end; $i->modify('+1 day')) {
     if($days==$i->format('N') or $days=="10"){  //$day =10(everyday) 또는 월,화 지정한날과 같은시
         
     
                //$daysOfWeek = date("w",$i);
            //echo $i->format('N');
             $timeslotbyroom = timeslotbyroom($_POST["room"],$i->format("Y-m-d"));
             $holiday =  holidaycheck($i->format("Y-m-d"));
             if(count($holiday)>0){
                 
                 foreach($timeslots as $row)
                 {
                 $output .='<div class="form-group has-error has-feedback">      
                      <div class="col-md-5">
                        <input type="text" class="form-control" id="inputError" value="'.$i->format("Y-m-d").'">
                         <span class="glyphicon glyphicon-remove form-control-feedback"></span>
                        </div>
                          <div class="col-md-5">
                        <input type="text" class="form-control" id="inputError" value="'.$row.'">
                         <span class="glyphicon glyphicon-remove form-control-feedback"></span>
                        </div>
                        <div class="col-md-2"><button type="button" class="btn btn-default" disabled>'.implode("",$holiday).'</button></div>
                    </div>
                  </span>';
                 
                 
             }}
             else{

                foreach($timeslots as $row)
                 {

                    if(in_array($row,$timeslotbyroom))
                    {
                        $output .='<div class="form-group has-error has-feedback">      
                      <div class="col-md-5">
                        <input type="text" class="form-control" id="inputError" value="'.$i->format("Y-m-d").'">
                         <span class="glyphicon glyphicon-remove form-control-feedback"></span>
                        </div>
                          <div class="col-md-5">
                        <input type="text" class="form-control" id="inputError" value="'.$row.'">
                         <span class="glyphicon glyphicon-remove form-control-feedback"></span>
                        </div>
                        <div class="col-md-2"><button type="button" class="btn btn-dark" disabled>Reserved</button></div>
                    </div>
                  </span>';
                    } 
                    else{        
                  $output .= '<span><div class="col-md-5">
                <input type="date" readonly name="date_category[]" class="form-control date_category" value="'.$i->format("Y-m-d").'">  
                  </div><div class="col-md-5">
                  <select class="form-control" readonly name="item_category[] class="form-control item_category">
                <option value="'.$row.'" selected>'.$row.'</option></select></div><div class="col-md-2"><button type="button" class="btn btn-danger btn-xs remove-btn">Remove</button></div></span>';
                    }
                 }
             }
     
     
     }
    
}
echo $output;
return $output;
//id="remove-btn" 


?>