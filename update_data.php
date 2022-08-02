<?php

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: PUT'); 
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Access-Control-Allow-Methods, Content-Type, Authorization, X-Requested-With');

include "database.php";

$data = json_decode(file_get_contents("php://input"), true);
// we will update the data through postman, and the keys are id, sName, sAge, sCity
$id = $data['sid'];
$name = $data['sName'];
$age = $data['sAge'];
$city = $data['sCity'];

$sql = "UPDATE rest_api SET student_name = '$name', age = '$age', city = '$city' WHERE id = $id";

if(mysqli_query($con, $sql)){
    echo json_encode(array("message" => "Student Record Updated", "status" => true));
} else{
    echo json_encode(array('message' => 'Student Record Not Updated', 'status' => false));
}

?>