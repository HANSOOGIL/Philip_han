<?php

//fetch.php

//include('database_connection.php');
$connect = new PDO("mysql:host=localhost;dbname=bookingcalendar", "root", "");


$column = array("reservid", "rrname", "sdate", "date","timeslot", "userid", "attendee_user", "purposecate","purpose","remark","status");

$query = "SELECT * FROM room_reservation";

if(isset($_POST["search"]["value"]))
{
 $query .= '
 WHERE rrname LIKE "%'.$_POST["search"]["value"].'%" 
 OR sdate LIKE "%'.$_POST["search"]["value"].'%" 
 OR date LIKE "%'.$_POST["search"]["value"].'%" 
 OR timeslot LIKE "%'.$_POST["search"]["value"].'%" 
 OR userid LIKE "%'.$_POST["search"]["value"].'%" 
 OR attendee_user LIKE "%'.$_POST["search"]["value"].'%" 
 OR purposecate LIKE "%'.$_POST["search"]["value"].'%" 
 OR purpose LIKE "%'.$_POST["search"]["value"].'%" 
 OR remark LIKE "%'.$_POST["search"]["value"].'%" 
 OR status LIKE "%'.$_POST["search"]["value"].'%" 

 ';
}

if(isset($_POST["order"]))
{
 $query .= 'ORDER BY '.$column[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir'].' ';
}
else
{
 $query .= 'ORDER BY reservid DESC ';
}
$query1 = '';

if($_POST["length"] != -1)
{
 $query1 = 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}

$statement = $connect->prepare($query);

$statement->execute();

$number_filter_row = $statement->rowCount();

$statement = $connect->prepare($query. $query1);

$statement->execute();

$result = $statement->fetchAll();



$data = array();

foreach($result as $row)
{
 $sub_array = array();
 $sub_array[] = $row['reservid'];
 $sub_array[] = $row['rrname'];
 $sub_array[] = $row['sdate'];
 $sub_array[] = $row['date'];
 $sub_array[] = $row['timeslot'];
 $sub_array[] = $row['userid'];
 $sub_array[] = $row['attendee_user'];
 $sub_array[] = $row['purposecate'];
 $sub_array[] = $row['purpose'];
 $sub_array[] = $row['remark'];
 $sub_array[] = $row['status'];
 $data[] = $sub_array;
}

function count_all_data($connect)
{
 $query = "SELECT * FROM room_reservation";
 $statement = $connect->prepare($query);
 $statement->execute();
 return $statement->rowCount();
}

$output = array(
 'draw'   => intval($_POST["draw"]),
 'recordsTotal' => count_all_data($connect),
 'recordsFiltered' => $number_filter_row,
 'data'   => $data
);

echo json_encode($output);

?>