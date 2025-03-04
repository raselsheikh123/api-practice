<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");

include "config.php";
/*[
    {
        "sid": "2",
    }
]*/

$data = json_decode(file_get_contents("php://input"), true);

$id = $data["sid"];

$sql = "DELETE FROM student_info WHERE id=$id";

if(mysqli_query($con, $sql)) {
    echo json_encode(array("message" => "Data Successfully Deleted", 'status' => true));
} else {
    echo json_encode(array("message" => "No results found.", 'status' => false));
}