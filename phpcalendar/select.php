<?php

//select.php

include('database_connection.php');

$query = "SELECT * FROM room_reservation WHERE status = 'n'";
if($_POST['groupname']=='all') 
{
    
    $query .= "ORDER BY reservid DESC";
}
else{
 $id = $_POST['groupname'];
 $query .= "AND groupcode ='".$id."' ORDER BY reservid DESC";
 }


$statement = $connect->prepare($query);

if($statement->execute())
{
 while($row = $statement->fetch(PDO::FETCH_ASSOC))
 {
  $data[] = $row;
 }

 echo json_encode($data);
}



//"reservid", "rrname", "sdate", "date","timeslot", "userid", //"attendee_user", "purposecate","purpose","remark","status");
?>
