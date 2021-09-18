<?php
include "connection.php";
session_start();
$id = $_SESSION["user_id"];
// $id = $_GET["id"];


$query = "SELECT expenses.*, categories.name FROM expenses INNER JOIN categories ON expenses.category_id = categories.id";

$stmt = $connection->prepare($query);
$stmt->execute();
$results = $stmt->get_result();

$expenses_arr = [];
while($expenses = $results->fetch_assoc()) {
    if ($expenses["user_id"] == $id) {
    $expenses_arr[] = $expenses;
    }
}

//print_r($temp_array) ;


$expenses_json = json_encode($expenses_arr, JSON_PRETTY_PRINT);
echo $expenses_json;

?>