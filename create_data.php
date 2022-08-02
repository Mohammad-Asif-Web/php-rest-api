<?php

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

// 'Access-Control-Allow-Methods' -> which methods using for Rest api
header('Access-Control-Allow-Methods: POST'); 

// 'Access-Control-Allow-Header' -> this header is used for security purpose. we have to tell this header which headers we are giving access
// Authorization -> any one can access this api with mobile or browsers devices.
// X-Requested-With -> it will only accept ajax value. because we can get values from many way, but it will give permission for ajax value
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Access-Control-Allow-Methods, Content-Type, Authorization, X-Requested-With');

include "database.php";

$data = json_decode(file_get_contents("php://input"), true);
// we will send the data through postman, and the keys are sName, sAge, sCity
$name = $data['sName'];
$age = $data['sAge'];
$city = $data['sCity'];

$sql = "INSERT INTO rest_api(student_name, age, city) VALUES('$name','$age','$city')";

if(mysqli_query($con, $sql)){
    echo json_encode(array("message" => "Data Inserted", "status" => true));
} else{
    echo json_encode(array('message' => 'Data not inserted', 'status' => false));
}

?>