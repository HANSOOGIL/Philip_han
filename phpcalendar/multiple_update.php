<?php

//multiple_update.php

include('database_connection.php');

if(isset($_POST['id']))
{
 $id = $_POST['id'];
 for($count = 0; $count < count($id); $count++)
 {
  $data = array(
   ':id'   => $id[$count]
  );
  $query = "
  UPDATE room_reservation 
  SET status = 'y' WHERE reservid = :id";
  $statement = $connect->prepare($query);
  $statement->execute($data);
 }
}

?>