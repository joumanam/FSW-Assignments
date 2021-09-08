<?php
include "connection.php";
session_start();


if (isset($_POST["email"]) && $_POST["email"] !="")	{ 
  $email = $_POST["email"];
	} 

if (isset($_POST["password"]) && $_POST["password"] !="") {
		$password = hash('sha256', $_POST["password"]);
	} 

	$stmt = $connection->prepare("SELECT * FROM users WHERE email=? and password=?");
	$stmt->bind_param("ss",$email,$password);
	$stmt->execute();
	$result = $stmt->get_result();
	$row = $result->fetch_assoc();

	// session_unset();


	if($row > 0 && $row['user_type'] == "customer") {
		header('location: ../aviato/index-customer.php');
	}
	elseif($row > 0 && $row['user_type'] == "store") {
		// $_SESSION["id"] = $row["id"];
		header('location: ../aviato/index-store.php');
	}
	else{
		$_SESSION["login-flash"] = "You have entered a wrong username/password";
		header('location: ../aviato/login2.php');

	}

?>