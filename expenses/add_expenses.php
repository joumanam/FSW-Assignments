<?php 
include "connection.php";

$date = $_POST["date"];
$amount = $_POST["amount"];
$id = $_SESSION["user_id"];


$query = "INSERT INTO articles(date, amount) VALUES (?, ?)";
$obj = $connection->prepare($query);
$obj->bind_param("ss", $date, $amount);
$obj->execute();
$id = $obj->insert_id;

$expense_obj = [];
$expense_obj["id"] = $id;
$expense_obj["category"] = $category;
$expense_obj["date"] = $date;
$expense_obj["amount"] = $amount;



$expense_json = json_encode($expense_obj);
echo $expense_json;

?>