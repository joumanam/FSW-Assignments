<?php

include "connection.php";

if(isset($_POST["name"]) && $_POST["name"] != ""){          
        $full_name = $_POST["name"];
} else {
    die("Not cool bro");
}

if(isset($_POST["email"]) && $_POST["email"] != ""){
    $Email = $_POST["email"];
} else {
die("Not cool bro");
}

if(isset($_POST["pass"]) && $_POST["pass"] != ""){
    $Pass = hash('sha256',$_POST["pass"]);
} else {
die("Not cool bro");
}

if(isset($_POST["gender"]) && $_POST["gender"] != ""){
    $gender = $_POST["gender"];
} else {
die("Not cool bro");
}


$stmt = $connection->prepare("INSERT INTO users (full_name, Email, Pass, Gender) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssss", $full_name, $Email, $Pass, $gender);
$stmt->execute();
$stmt->close();
$connection->close();
header("Location: index.html");

?>