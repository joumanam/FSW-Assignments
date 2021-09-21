<?php

include "connection.php";

$user_id = $_SESSION["user_id"];
$user1_id = $user_id;
$user2_id = $_SESSION["user2_id"];
$is_blocked = 0;
$is_pending = 1;

$insert = "INSERT INTO `connections` (`user1_id`, `user2_id`,`is_blocked`, `is_pending`) VALUES (?, ?, ?, ?)";

$obj = $connection->prepare($insert);
$obj->bind_param("iiii", $user1_id, $user2_id, $is_blocked, $is_pending);
$obj->execute();
$id = $obj->insert_id;

$added_friends = [];
$added_friends["id"] = $id;
$added_friends["user1_id"] = $user1_id;
$added_friends["user2_id"] = $user2_id;
$added_friends["is_blocked"] = $is_blocked;
$added_friends["is_pending"] = $is_pending;


$friends_json = json_encode($added_friends, JSON_PRETTY_PRINT);
echo $friends_json;

?>