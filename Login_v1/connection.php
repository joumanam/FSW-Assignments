<?php 
$server = "localhost";
$username = "root";
$password = "";
$dbname = "randomdb";

$connection = new mysqli($server, $username, $password, $dbname);

if($connection->connect_error){
	die("Failed");
}else{
    echo ("Connected!");
}

?>