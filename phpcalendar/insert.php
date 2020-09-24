<?php

//insert.php;

if(isset($_POST["item_category"]))
{
//$mysqli = new mysqli('localhost', 'root', '', 'bookingcalendar');
$connect = new PDO("mysql:host=localhost; dbname=bookingcalendar;", "root", "");    
$sdate = date('Y-m-d h:i:s a', time());
$ncount = count($_POST["item_category"]);
 for($count = 0; $count < $ncount; $count++)
 {
  $data = array(
   ':userid'   => $_POST["userid"],
   ':room'   => $_POST["room"],      
   ':date'   => $_POST["date_category"][$count],         
   ':purpose'   => $_POST['purpose'],        
   ':timeslot'  => $_POST["item_category"][$count],
   ':attendee'   => $_POST['attendee'],      
   ':purposecate'   => $_POST['internal'],   
   ':remark'   => $_POST['remark'], 
   ':groupcode'   => $_POST["date_category"][0].'~'.$_POST["date_category"][$ncount-1].','.$_POST['attendee'].','.$_POST['remark'],       
   ':sdate'  => $sdate      
      
      
  );

  $query = "
   INSERT INTO room_reservation 
       (rrname, sdate, date, timeslot, userid, attendee_user, purposecate, purpose, remark, groupcode, status) 
       VALUES (:room, :sdate, :date, :timeslot, :userid, :attendee, :purposecate, :purpose, :remark, :groupcode, 'n')
  ";

  $stmt = $connect->prepare($query);

  $stmt->execute($data);
 }

 echo 'ok';
}
else
{
 $connect = new PDO("mysql:host=localhost; dbname=bookingcalendar;", "root", "");    
 $sdate = date('Y-m-d');
 
  $data = array(
  ':userid'   => $_POST["userid"],
   ':room'   => $_POST["room"],      
   ':date'   => $_POST["date_category"],         
   ':purpose'   => $_POST['purpose'],        
   ':timeslot'  => $_POST["item_category"],
   ':attendee'   => $_POST['attendee'],      
   ':purposecate'   => $_POST['internal'],   
   ':remark'   => $_POST['remark'],   
   ':groupcode'   => $_POST["date_category"].'~'.$_POST["date_category"].','.$_POST['attendee'].','.$_POST['remark'],
   ':sdate'  => $sdate      
  );

  $query = "
    INSERT INTO room_reservation 
       (rrname, sdate, date, timeslot, userid, attendee_user, purposecate, purpose, remark, groupcode, status) 
       VALUES (:room, :sdate, :date, :timeslot, :userid, :attendee, :purposecate, :purpose, :remark, :groupcode,'n')
  ";

  $stmt = $connect->prepare($query);

  $stmt->execute($data);   
    echo 'ok'; 
    
}

?>