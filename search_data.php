<?php

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

include "database.php";
$data = json_decode(file_get_contents("php://input"), true);
// we will delete the data through id
$search = $data['search'];

$sql = "SELECT * FROM rest_api WHERE student_name LIKE '%$search%'";
$result = mysqli_query($con, $sql) or die("SQL Query Failed");
if(mysqli_num_rows($result) > 0){
     $output = mysqli_fetch_all($result, MYSQLI_ASSOC);
     echo json_encode($output);
} else{
    echo json_encode(array('message' => 'No Search Found', 'status' => false));
}

?>