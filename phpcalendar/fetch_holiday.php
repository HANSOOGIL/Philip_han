<?php

//fetch_data.php

$connect = new PDO("mysql:host=localhost;dbname=bookingcalendar", "root", "");

$method = $_SERVER['REQUEST_METHOD'];

if($method == 'GET')
{
 $data = array(
  ':name'   => "%" . $_GET['name'] . "%",
  ':date'   => "%" . $_GET['date'] . "%"  
 );
 $query = "SELECT * FROM  holiday_set WHERE name LIKE :name AND date LIKE :date ORDER BY hid DESC";

 $statement = $connect->prepare($query);
 $statement->execute($data);
 $result = $statement->fetchAll();
 foreach($result as $row)
 {
  $output[] = array(
   'id'    => $row['hid'],   
   'name'  => $row['name'],
   'date'  => $row['date'],    
   'valid'    => $row['valid']
  );
 }
 header("Content-Type: application/json");
 echo json_encode($output);
}

if($method == "POST")
{
 $data = array(
  ':name'  => $_POST["name"],
  ':date'  => $_POST["date"],  
  ':valid'   => $_POST["valid"]
 );

 $query = "INSERT INTO holiday_set(name, date, valid) VALUES (:name, :date, :valid)";
 $statement = $connect->prepare($query);
 $statement->execute($data);
}

if($method == 'PUT')
{
 parse_str(file_get_contents("php://input"), $_PUT);
  $data = array(
  ':id'   => $_PUT['id'],
  ':name' => $_PUT['name'],
  ':date' => $_PUT['date'],
  
  ':valid'  => $_PUT['valid'] 
 );

 $query = "UPDATE holiday_set  T
     SET name = :name, 
     date = :date,      
     valid = :valid 
     WHERE hid = :id";
 $statement = $connect->prepare($query);
 $statement->execute($data); 
    

}

if($method == "DELETE")
{
 parse_str(file_get_contents("php://input"), $_DELETE);
 $query = "DELETE FROM holiday_set WHERE hid = '".$_DELETE["id"]."'";
 $statement = $connect->prepare($query);
 $statement->execute();
}

?>