<?php
include "connection.php";
session_start();


if (isset($_POST["email"]) && $_POST["email"] !="")	{ 
  $email = $_POST["email"];
	} 

if (isset($_POST["pass"]) && $_POST["pass"] !="") {
		$password = hash('sha256', $_POST["pass"]);
	} 

	$stmt = $connection->prepare("SELECT * FROM users WHERE email=? and password=?");
	$stmt->bind_param("ss",$email,$password);
	$stmt->execute();
	$result = $stmt->get_result();
	$row = $result->fetch_assoc();

	$user_id = $row["id"];

	if($row > 0) {
		$_SESSION["user_id"] = $user_id;
		header('location: ../expenses/home.html');

	}

	else{
		$_SESSION["login-flash"] = "You have entered a wrong username/password";
		header('location: ../expenses/login2.php');

	}

?>