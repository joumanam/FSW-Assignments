<?php

include "connection.php";
session_start();

$user_id = $_SESSION["user_id"];


$query = "SELECT users.name, users.location, users.birthdate FROM users, connections WHERE connections.user2_id = users.id AND connections.is_blocked = 0 AND connections.is_pending = 0 AND connections.user1_id = '$user_id';";
$obj = $connection->prepare($query);
$obj->execute();
$results = $obj->get_result();

$friends_arr = [];
while($row = $results->fetch_assoc()) {
	$friends_arr[] = $row;
}

$friends_json = json_encode($friends_arr, JSON_PRETTY_PRINT);
echo $friends_json;

?>