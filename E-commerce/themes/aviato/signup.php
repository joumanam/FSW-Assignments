<?php

include "connection.php";
session_start();

if(isset($_POST["first_name"]) && $_POST["first_name"] != "") {
    $first_name = $_POST["first_name"];
}else{
    die ("Enter a valid name");
}

if(isset($_POST["last_name"]) && $_POST["last_name"] != "") {
    $last_name = $_POST["last_name"];
}else{
    die ("Enter a valid name");
}

if(isset($_POST["email"]) && $_POST["email"] != "") {
    $email = $_POST["email"];
}else{
    die ("Enter a valid email");
}


if(isset($_POST["password"]) && $_POST["password"] != "") {
    $password = hash('sha256', $_POST["password"]);
}else{
    die ("Enter a valid password");
}

if(isset($_POST["user_type"]) && $_POST["user_type"] != "") {
    $user_type = $_POST["user_type"];
}else{
    die ("Please choose an option");
}

if(isset($_POST["confirm_password"]) && $_POST["confirm_password"] != "") {
    $confirm_password = hash('sha256',$_POST["confirm_password"]);
}

if($password != $confirm_password){
    die("Password did not match.");
    }



$selectemail="SELECT email FROM users WHERE email=? LIMIT 1";
$insert="INSERT INTO `users` (`first_name`, `last_name`, `email`, `password`, `user_type`) VALUES (?, ?, ?, ?, ?);";

$stmt = $connection->prepare($selectemail);
$stmt->bind_param("s",$email);
$stmt->execute();
$stmt->bind_result($email);
$stmt->store_result();
$row = $stmt->num_rows;

if($row==0){
    $stmt->close();
    $stmt2 = $connection->prepare($insert);
    $stmt2->bind_param("sssss",$first_name,$last_name,$email,$password,$user_type);
    $stmt2->execute();
    session_start();

    $result = $stmt2->get_result();
    $_SESSION["flash_message"] = "";
    $connection->close();
    header('location: ../aviato/login2.php');
    session_destroy();
}



else{      
    session_start();
    $_SESSION["flash_message"] = "This email is taken";}
    $connection->close();
    header('location: ../aviato/signup.html');
    session_destroy();



?>