<?php

//action.php

include('database_connection.php');

if($_POST['action'] == 'edit')
{
 $data = array(
  
  ':room'  => $_POST['room'],
  ':sdate'   => $_POST['sdate'],
  ':date'   => $_POST['date'],
  ':timeslot'   => $_POST['timeslot'],
  ':submiter'   => $_POST['submiter'],
  ':attendee'   => $_POST['attendee'],
  ':sector'   => $_POST['sector'],
  ':purpose'   => $_POST['purpose'],
  ':remark'   => $_POST['remark'],
  ':status'   => $_POST['status'],

  ':id'    => $_POST['id']
 );

 $query = "
 UPDATE room_reservation 
 SET rrname = :room, 
 sdate = :sdate, 
 date = :date, 
 timeslot = :timeslot, 
 userid = :submiter, 
 attendee_user = :attendee, 
 purposecate = :sector, 
 purpose = :purpose, 
 remark = :remark, 
 status = :status 
 WHERE reservid = :id
 ";
 $statement = $connect->prepare($query);
 $statement->execute($data);
 echo json_encode($_POST);
}

if($_POST['action'] == 'delete')
{
 $query = "
 DELETE FROM room_reservation 
 WHERE reservid = '".$_POST["id"]."'
 ";
 $statement = $connect->prepare($query);
 $statement->execute();
 echo json_encode($_POST);
}


?>