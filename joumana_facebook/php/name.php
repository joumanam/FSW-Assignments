<?php

include "connection.php";
session_start();

$name = $_SESSION["name"];

$name_arr = [];
$name_arr["name"] = $name;

$json = json_encode($name_arr);
echo $json;


?>