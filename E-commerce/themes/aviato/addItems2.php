<!-- 
THEME: Aviato | E-commerce template
VERSION: 1.0.0
AUTHOR: Themefisher

HOMEPAGE: https://themefisher.com/products/aviato-e-commerce-template/
DEMO: https://demo.themefisher.com/aviato/
GITHUB: https://github.com/themefisher/Aviato-E-Commerce-Template/

WEBSITE: https://themefisher.com
TWITTER: https://twitter.com/themefisher
FACEBOOK: https://www.facebook.com/themefisher
-->

<?php

session_start();

?>



<!DOCTYPE html>
<html lang="en">
<head>

  <!-- Basic Page Needs
  ================================================== -->
  <meta charset="utf-8">
  <title>Store | Sell Your Items</title>

  <!-- Mobile Specific Metas
  ================================================== -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="Construction Html5 Template">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
  <meta name="author" content="Themefisher">
  <meta name="generator" content="Themefisher Constra HTML Template v1.0">
  
  <!-- Favicon -->
  <link rel="shortcut icon" type="image/x-icon" href="images/favicon.png" />
  
  <!-- Themefisher Icon font -->
  <link rel="stylesheet" href="plugins/themefisher-font/style.css">
  <!-- bootstrap.min css -->
  <link rel="stylesheet" href="plugins/bootstrap/css/bootstrap.min.css">
  
  <!-- Animate css -->
  <link rel="stylesheet" href="plugins/animate/animate.css">
  <!-- Slick Carousel -->
  <link rel="stylesheet" href="plugins/slick/slick.css">
  <link rel="stylesheet" href="plugins/slick/slick-theme.css">
  
  <!-- Main Stylesheet -->
  <link rel="stylesheet" href="css/style.css">

 <!-- JS File for validation -->
  <!-- <script src="jquery-3.5.1.min.js"></script> -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
  <script src="signup.js"></script>


</head>


<body id="body">
  

<section class="signin-page account">
  <div class="container">
    <div class="row">
    <?php
        if($_SESSION){ ?>
          <div class="alert alert-danger alert-common" role="alert"><i class="tf-ion-close-circled"></i><span>
            <?php

            echo($_SESSION["quantity-error"]);
            session_destroy();
          }?> 
          </span></div>

      <div class="col-md-6 col-md-offset-3">
        <div class="block text-center">
            <h2>Bloom and Grow</h2>
          </a>
          <h2 class="text-center">What Plants Would You Like To Sell?</h2>
          <form class="text-left clearfix" enctype="multipart/form-data" id="addItems" action="addItems.php" method = "POST">
            <div class="form-group">
              <input type="text" class="form-control" id="plant-name" name="plant-name" placeholder="Name of the Plant" required>
              <h6 id="error-fname"></h6>
            </div>
            <div class="form-group">
              <textarea class="form-control" rows="3" cols="40" textarea id="description" name="pd-description" placeholder="Tell us a bit about your plant" required></textarea> 
              <h6 id="error-lname"></h6>
            </div>            
              
            <div>
              <label for="img"> Provide a clear image of the product: </label>
              <input type="file" name="image" accept="image/*" required>
              <br/>
            </div>
              <label for="quantity"> Quantity of product you wish to add: 
                <span style ="color:red; font-weight:400; font-size:0.35cm; font-style:italic;"> &nbsp; should be 1 or above</span></label>
                <div class="single-product-details">
                <div class="product-quantity">
						<div class="product-quantity-slider">
							<input id="product-quantity" type="text" value="1" name="product-quantity">
            </div>
           
						</div>
            </div>
            <br/>
            <div>
              <label for="category"> Please choose the product category: </label>
              <div class="form-group">
                <label for="indoor"><input id="indoor" type="radio" name="prod-category" value="indoor" required> Indoor Plant</label><br/>
                <label for="outdoor"><input id="outdoor" type="radio" name="prod-category" value="outdoor" required> Outdoor Plant</label><br>
                <label for="gift"><input id="gift" type="radio" name="prod-category" value="gift" required> Gift Set</label><br/>
              </div>
            </div>
            <div class="text-center">
              <a href="index-store.php"><button type="submit" id="submitButton" name="submit" class="btn btn-main text-center">Add to Store</button></a>
            </div>
          </form>
          <p class="mt-20"><a href="index-store.php">Go Back To Homepage</a></p>
        </div>
      </div>
    </div>
  </div>
</section>

    <!-- 
    Essential Scripts
    =====================================-->
    
    <!-- Main jQuery -->
    <script src="plugins/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap 3.1 -->
    <script src="plugins/bootstrap/js/bootstrap.min.js"></script>
    <!-- Bootstrap Touchpin -->
    <script src="plugins/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.js"></script>
    <!-- Instagram Feed Js -->
    <script src="plugins/instafeed/instafeed.min.js"></script>
    <!-- Video Lightbox Plugin -->
    <script src="plugins/ekko-lightbox/dist/ekko-lightbox.min.js"></script>
    <!-- Count Down Js -->
    <script src="plugins/syo-timer/build/jquery.syotimer.min.js"></script>

    <!-- slick Carousel -->
    <script src="plugins/slick/slick.min.js"></script>
    <script src="plugins/slick/slick-animation.min.js"></script>

    <!-- Google Mapl -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCC72vZw-6tGqFyRhhg5CkF2fqfILn2Tsw"></script>
    <script type="text/javascript" src="plugins/google-map/gmap.js"></script>

    <!-- Main Js File -->
    <script src="js/script.js"></script>
    


  </body>
  </html>