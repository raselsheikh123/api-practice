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

$id = $data["sid"];
$name = $data["sname"];
$age = $data["sage"];
$city = $data["scity"];

$sql = "UPDATE student_info SET name='$name', age= $age, city='$city' WHERE id='$id'";

if(mysqli_query($con, $sql)) {
    echo json_encode(array("message" => "Data Successfully Updated", 'status' => true));
} else {
    echo json_encode(array("message" => "No results found.", 'status' => false));
}