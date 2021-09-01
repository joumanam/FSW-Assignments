<?php

include "connection.php";
session_start();

if (isset($_POST['email']) && $_POST['email'] !="") {
    $email = $_POST['email'];
} else {
    die("Invalid password");
}

if (isset($_POST['pass']) && $_POST['pass'] !="") {
    $password = $_POST['pass'];
} else {
    die("Invalid password");
}

$hash = hash('sha256', $password);
$stmt = $connection -> prepare('SELECT * from users where Email = ? and Pass = ?');
$stmt -> bind_param("ss", $email, $hash);
$stmt -> execute();

$match=$stmt->get_result();
$result=$match->fetch_assoc();
$stmt->close();
$connection->close();

if (empty($result)){
    header ("Location: index.html");
}else {
    $name = $result['full_name'];
    header ("Location: home.php");
    $_SESSION['username']=$name;
}
?>