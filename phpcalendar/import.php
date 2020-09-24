<?php

//import.php
include('database_connection.php');

if(isset($_POST["student_date"]))
{
// $connect = new PDO("mysql:host=localhost;dbname=bookingcalendar", "root", "");
 $student_date = $_POST["student_date"];
 $student_name = $_POST["student_name"];
 $student_valid = $_POST["student_valid"];
    
 for($count = 0; $count < count($student_date); $count++)
 {
  $query .= "
  INSERT INTO holiday_set(name, date, valid) 
  VALUES ('".$student_name[$count]."', '".$student_date[$count]."', '".$student_valid[$count]."');
  
  ";
 }
 $statement = $connect->prepare($query);
 $statement->execute();
}

?>