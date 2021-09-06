<?php

include "connection.php";
session_start();

if(isset($_POST['submit'])) {
    if(isset($_POST["plant-name"]) && $_POST["plant-name"] != "") {
        $name = $_POST["plant-name"];
    }else{
        die ("Enter a name for your plant.");
    }

    if(isset($_POST["prod-category"]) && $_POST["prod-category"] != "") {
        $category = $_POST["prod-category"];
    }else{
        die ("Please choose a category");
    }

    if(isset($_POST["pd-description"]) && $_POST["pd-description"] != "") {
        $description = $_POST["pd-description"];
    }else{
        die ("Enter a description for a better customer experience.");
    }

    $filename = $_FILES["image"]["name"];
    $tempname = $_FILES["image"]["tmp_name"];    
    $folder = "image/".$filename;
    // $uploadtoweb = "themes/aviato/image/".$filename;

    move_uploaded_file($_FILES["image"]["tmp_name"], $folder);
    

    
    $insert="INSERT INTO `plants_for_sale` (`name`, `category`, `description`, `image`) VALUES (?, ?, ?, ?);";

        $stmt1 = $connection->prepare($insert);
        $stmt1->bind_param("ssss",$name,$category,$description,$folder);
        $stmt1->execute();
        $result = $stmt1->get_result();
        // $stmt1->close();
        // $connection->close();

        header("Location: index-store.php");


}

?>