<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");

include "config.php";
/*{
    "sid": "2",
}*/
$data = json_decode(file_get_contents("php://input"), true);

$sql = "SELECT * FROM student_info WHERE id = {$data['sid']}";
$query = mysqli_query($con, $sql) or die("mysql query error");

if(mysqli_num_rows($query) > 0) {
    $output = mysqli_fetch_all($query, MYSQLI_ASSOC);
    echo json_encode($output, JSON_PRETTY_PRINT);
} else {
    echo json_encode(array("message" => "No results found.", 'status' => false));
}