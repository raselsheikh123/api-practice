<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: GET");

include "config.php";
$sql = "SELECT * FROM student_info";
$query = mysqli_query($con, $sql) or die("mysql query error");

if(mysqli_num_rows($query) > 0) {
    $output = mysqli_fetch_all($query, MYSQLI_ASSOC);
    echo json_encode($output, JSON_PRETTY_PRINT);
} else {
    echo json_encode(array("message" => "No results found.", 'status' => false));
}

