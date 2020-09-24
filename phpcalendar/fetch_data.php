<?php

//fetch_data.php

$connect = new PDO("mysql:host=localhost;dbname=bookingcalendar", "root", "");

$method = $_SERVER['REQUEST_METHOD'];

if($method == 'GET')
{
 $data = array(
  ':Room_name'   => "%" . $_GET['Room_name'] . "%",
  ':capacity'   => "%" . $_GET['capacity'] . "%",
  ':location'     => "%" . $_GET['location'] . "%",
  ':valid'    => "%" . $_GET['valid'] . "%"
 );
 $query = "SELECT * FROM room WHERE rname LIKE :Room_name AND capacity LIKE :capacity AND location LIKE :location AND valid LIKE :valid ORDER BY rid DESC";

 $statement = $connect->prepare($query);
 $statement->execute($data);
 $result = $statement->fetchAll();
 foreach($result as $row)
 {
  $output[] = array(
   'id'    => $row['rid'],   
   'Room_name'  => $row['rname'],
   'capacity'   => $row['capacity'],
   'location'    => $row['location'],
   'valid'   => $row['valid']
  );
 }
 header("Content-Type: application/json");
 echo json_encode($output);
}

if($method == "POST")
{
 $data = array(
  ':Room_name'  => $_POST["Room_name"],
  ':capacity'  => $_POST["capacity"],
  ':location'    => $_POST["location"],
  ':valid'   => $_POST["valid"]
 );

 $query = "INSERT INTO room(rname, capacity, location, equipment, remark ,valid) VALUES (:Room_name, :capacity, :location, 'conference', 'available', :valid)";
 $statement = $connect->prepare($query);
 $statement->execute($data);
}

if($method == 'PUT')
{
 parse_str(file_get_contents("php://input"), $_PUT);
 $data = array(
  ':id'   => $_PUT['id'],
  ':Room_name' => $_PUT['Room_name'],
  ':capacity' => $_PUT['capacity'],
  ':location'   => $_PUT['location'],
  ':valid'  => $_PUT['valid']
 );
 $query = "
 UPDATE room 
 SET rname = :Room_name, 
 capacity = :capacity, 
 location = :location, 
 valid = :valid 
 WHERE rid = :id
 ";
 $statement = $connect->prepare($query);
 $statement->execute($data);
}

if($method == "DELETE")
{
 parse_str(file_get_contents("php://input"), $_DELETE);
 $query = "DELETE FROM room WHERE rid = '".$_DELETE["id"]."'";
 $statement = $connect->prepare($query);
 $statement->execute();
}

?>