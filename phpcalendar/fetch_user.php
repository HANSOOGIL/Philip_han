<?php

//fetch_data.php

$connect = new PDO("mysql:host=localhost;dbname=bookingcalendar", "root", "");

$method = $_SERVER['REQUEST_METHOD'];

if($method == 'GET')
{
 $data = array(
  ':name'   => "%" . $_GET['name'] . "%",
  ':email'   => "%" . $_GET['email'] . "%"  
 );
 $query = "SELECT * FROM register WHERE name LIKE :name AND email LIKE :email ORDER BY id DESC";

 $statement = $connect->prepare($query);
 $statement->execute($data);
 $result = $statement->fetchAll();
 foreach($result as $row)
 {
  $output[] = array(
   'id'    => $row['id'],   
   'name'  => $row['name'],
   'password'  => $row['password'],  
   'email'   => $row['email'],
   'master'    => $row['master']
  );
 }
 header("Content-Type: application/json");
 echo json_encode($output);
}

if($method == "POST")
{
 $data = array(
  ':name'  => $_POST["name"],
  ':password'  => password_hash($_POST["password"], PASSWORD_DEFAULT),
  ':email'    => $_POST["email"],
  ':master'   => $_POST["master"]
 );

 $query = "INSERT INTO register(name, password, email, master) VALUES (:name, :password, :email, :master)";
 $statement = $connect->prepare($query);
 $statement->execute($data);
}

if($method == 'PUT')
{
 parse_str(file_get_contents("php://input"), $_PUT);
 $data = array(
  ':id'   => $_PUT['id']
 /* ':name' => $_PUT['name'],
  ':password' => password_hash($_PUT['password'], PASSWORD_DEFAULT),
  ':email'   => $_PUT['email'],
  ':master'  => $_PUT['master'] */
 );
     $data2 = array(
  ':id'   => $_PUT['id'],
  ':name' => $_PUT['name'],
  ':password' => password_hash($_PUT['password'], PASSWORD_DEFAULT),
  ':email'   => $_PUT['email'],
  ':master'  => $_PUT['master'] 
 );

 $query = "SELECT * FROM register WHERE id = :id";
 $statement = $connect->prepare($query);
 $statement->execute($data); 
 $result = $statement->fetchAll();
   foreach($result as $row)
   {
     if($_PUT['password']== $row["password"])         
     {
         
    $data2 = array(
    ':id'   => $_PUT['id'],
    ':name' => $_PUT['name'],    
    ':email'   => $_PUT['email'],
    ':master'  => $_PUT['master'] 
    );
         
     $query2 = "
     UPDATE register 
     SET name = :name,   
     email = :email, 
     master = :master 
     WHERE id = :id
     ";    
     }
     else{   
         
         
     $data2 = array(
    ':id'   => $_PUT['id'],
    ':name' => $_PUT['name'],
    ':password' => password_hash($_PUT['password'], PASSWORD_DEFAULT),
    ':email'   => $_PUT['email'],
    ':master'  => $_PUT['master'] 
    );
     $query2 = "
     UPDATE register 
     SET name = :name, 
     password = :password, 
     email = :email, 
     master = :master 
     WHERE id = :id
     ";
     }
       
 
     }
    
 $statement = $connect->prepare($query2);
 $statement->execute($data2);

}

if($method == "DELETE")
{
 parse_str(file_get_contents("php://input"), $_DELETE);
 $query = "DELETE FROM register WHERE id = '".$_DELETE["id"]."'";
 $statement = $connect->prepare($query);
 $statement->execute();
}

?>