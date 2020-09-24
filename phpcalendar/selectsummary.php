<?php

//select.php

include('database_connection.php');

$query = "SELECT groupcode FROM room_reservation WHERE status = 'n' ORDER BY reservid DESC";

$statement = $connect->prepare($query);
$output='';
if($statement->execute())
{
 while($row = $statement->fetch(PDO::FETCH_ASSOC))
 {
     $data[] = $row;    
  
 }
    
$data = $array = array_unique($data, SORT_REGULAR);
    
   foreach($data as $row)
{ 
    $output .= '<option value="'.implode(',', $row).'">'.implode(',', $row).'</option>';
   }
echo $output;
return $output;
}


