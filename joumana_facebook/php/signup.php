<?php

include "connection.php";
session_start();

if(isset($_POST["name"]) && $_POST["name"] != "") {
    $name = $_POST["name"];
}else{
    die ("Enter a valid name");
}

if(isset($_POST["location"]) && $_POST["location"] != "") {
    $location = $_POST["location"];
}else{
    die ("Enter a location");
}

if(isset($_POST["email"]) && $_POST["email"] != "") {
    $email = $_POST["email"];
}else{
    die ("Enter a valid email");
}


if(isset($_POST["pass"]) && $_POST["pass"] != "") {
    $password = hash('sha256', $_POST["pass"]);
}else{
    die ("Enter a valid password");
}


if(isset($_POST["re_pass"]) && $_POST["re_pass"] != "") {
    $confirm_password = hash('sha256',$_POST["re_pass"]);
}

if($password != $confirm_password){
    die("Password did not match.");
    }

if(isset($_POST["birthdate"]) && $_POST["birthdate"] != "") {
    $birthdate = $_POST["birthdate"];
}else{
    die ("Enter a valid birthdate");
    }


$selectemail="SELECT email FROM users WHERE email=? LIMIT 1";
$insert="INSERT INTO `users` (`name`, `location`,`email`, `password`, `birthdate`) VALUES (?, ?, ?, ?, ?)";

$stmt = $connection->prepare($selectemail);
$stmt->bind_param("s",$email);
$stmt->execute();
$stmt->bind_result($email);
$stmt->store_result();
$row = $stmt->num_rows;

$stmt->close();


if($row==0){
    $stmt2 = $connection->prepare($insert);
    $stmt2->bind_param("sssss",$name,$location,$email,$password,$birthdate);
    $stmt2->execute();
    session_start();

    $result = $stmt2->get_result();
    $_SESSION["name"] = "";
    $connection->close();
    header('location: ../html/login.html');
    session_destroy();
}



else{      
    session_start();
    $_SESSION["flash_message"] = "This email is taken";}

    $connection->close();
    header('location: ../html/signup.html');
    session_destroy();


    $name = $connection->prepare($selectname); 
    $name->execute();
    $name->store_result();
    $row2 = $name->num_rows;
    
    $name->close();

    $user_id_search = $row2["id"];
    

    

?>