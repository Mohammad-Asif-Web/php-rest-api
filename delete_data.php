<?php

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: DELETE'); 
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Access-Control-Allow-Methods, Content-Type, Authorization, X-Requested-With');

include "database.php";

$data = json_decode(file_get_contents("php://input"), true);
// we will delete the data through id
$id = $data['sid'];

$sql = "DELETE FROM rest_api WHERE id = $id";
$result = mysqli_query($con, $sql);
if($result){
    echo json_encode(array("message" => "Student Record Deleted", "status" => true));
} else{
    echo json_encode(array('message' => 'Student Record Not Deleted', 'status' => false));
}

?>