<?php
// header function must use on top
header('Content-Type: application/json'); //this file will return json format data to any browser, that using this header function. weather it is mysqli data or error data
header('Access-Control-Allow-Origin: *'); //Means it will give access to any device if we use *. if we want to acess particular any website we should put that website url name instead of *.

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