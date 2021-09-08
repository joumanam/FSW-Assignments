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

    if(isset($_POST["product-quantity"]) && $_POST["product-quantity"] != 0) {
        $qty = $_POST["product-quantity"];
    }
    // else{
	// 	die ("Quantity should be 1 or above!");
    // }

    $filename = $_FILES["image"]["name"];
    $tempname = $_FILES["image"]["tmp_name"];    
    $folder = "image/".$filename;
    // $uploadtoweb = "themes/aviato/image/".$filename;

    move_uploaded_file($_FILES["image"]["tmp_name"], $folder);
    // $seller_id = $_SESSION["id"];

    $insert="INSERT INTO `plants_for_sale` (`name`, `category`, `description`, `image`, `quantity`) VALUES (?, ?, ?, ?, ?);";

        $stmt1 = $connection->prepare($insert);
        $stmt1->bind_param("ssssi",$name,$category,$description,$folder,$qty);
        $stmt1->execute();
        $result = $stmt1->get_result();
        $stmt1->close();

        // The code below is to link user_id in products table with id in users table. 
        // I hate to delete it because it ruined the layout in all pages where sessions were used
        // (I also had to delete the user_id column from product's table)
    
//         $sql2="Select * from plants_for_sale where plants_for_sale.user_id=?;";
//         $stmt2= $connection->prepare($sql2); #specifc seller products
//         $stmt2->bind_param("s", $seller_id);
//         $stmt2->execute();
//         $result2 = $stmt2->get_result();


//   $product = array(); 
//   while ($record = $result2->fetch_assoc()){ 
//       $product[] = $record;
//   }

    if ($qty == 0) {
        header("Location: additems2.php");
        $_SESSION["quantity-error"] = "Quantity should be 1 or above!";}
    else{
        header("Location: index-store.php");
    }

    
    }

?>