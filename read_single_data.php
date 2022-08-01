<?php
// header function must use on top
header('Content-Type: application/json');
header('Acess-Control-Allow-Origin: *');

// "php://input" -> this function Can read raw data of any format such as JSON, XML, FormData. So the request that comes inside this file will come in json format.
// file_get_contents -> it will read the raw data from "php://input'
// json_decode -> And we used this function to convert json to array. and we will use this array to mysqli command
$data = json_decode(file_get_contents("php://input"), true);

include "database.php";

$sql = "SELECT * FROM rest_api";
$result = mysqli_query($con, $sql) or die('SQL Query Failed');

if(mysqli_num_rows($result) > 0){
    $output = mysqli_fetch_all($result, MYSQLI_ASSOC);
    // return as associative array format
    //     echo '<ul>';
    //     for($i = 0; $i <count($output); $i++){
    //         print_r($output[$i]);
    //         echo '<br>';
    //     }
    //    echo '</ul>';

    echo json_encode($output);


} else{
    echo json_encode(array('message' => 'no record found.', 'status' => false));
}


?>