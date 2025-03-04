<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");

include "config.php";
/*[
    {
        "id": "2",
        "name": "Rasel",
        "age": "29",
        "city": "Khulna"
    }
]*/

$data = json_decode(file_get_contents("php://input"), true);

$name = $data["sname"];
$age = $data["sage"];
$city = $data["scity"];

$sql = "INSERT INTO student_info (name, age, city) VALUES ('$name', $age, '$city')";

if(mysqli_query($con, $sql)) {
    echo json_encode(array("message" => "Data Successfully Inserted", 'status' => true));
} else {
    echo json_encode(array("message" => "No results found.", 'status' => false));
}