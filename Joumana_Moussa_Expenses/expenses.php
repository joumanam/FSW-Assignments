<?php
include "connection.php";
session_start();
$id = $_GET["id"];

$query = "SELECT * FROM expenses, categories WHERE expenses.category_id = categories.id and expenses.user_id = ?";
$stmt = $connection->prepare($query);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$temp_array = [];
while($row = $result->fetch_assoc()){
    $temp_array[] = $row;

}

//print_r($temp_array);


$json = json_encode($temp_array, JSON_PRETTY_PRINT);
echo $json;