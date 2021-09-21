<?php

include "connection.php";
session_start();

$search = $_POST["search"];
$user_id = $_SESSION["user_id"];
// $search = "cat";

$query = "SELECT * FROM users WHERE `name` LIKE '%$search%' AND id != '$user_id'";
$obj = $connection->prepare($query);
$obj->execute();
$results = $obj->get_result();

$name_arr = [];
while($row = $results->fetch_assoc()) {
	$name_arr[] = $row;
}

$users_json = json_encode($name_arr, JSON_PRETTY_PRINT);
echo $users_json;

?>