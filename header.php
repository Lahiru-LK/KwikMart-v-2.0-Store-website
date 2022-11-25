<?php session_start(); ?>

<?php

@include 'config.php';

if(isset($_POST['add_to_cart'])){

  $product_name = $_POST['product_name'];
  $product_price = $_POST['product_price'];
  $product_image = $_POST['product_image'];
  $product_id = $_POST['product_id'];
  echo "$product_id";
  $cus_id=$_SESSION['user_id'];

  $product_quantity = 1;

 if(empty($cus_id)){
  $select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE name = '$product_name' AND cus_id IS NULL");
  
  if(mysqli_num_rows($select_cart) > 0){
     $message[] = 'product already added to cart';
  }else{
     $insert_product = mysqli_query($conn, "INSERT INTO `cart`(name, price, image, quantity) VALUES('$product_name', '$product_price', '$product_image', '$product_quantity')");
     $_SESSION['product_name']=$_POST['product_name'];
     $_SESSION['product_price']=$_POST['product_price'];
     $_SESSION['product_image']=$_POST['product_image'];
     //$_SESSION['product_id']=$_POST['product_id'];
     $_SESSION['product_quantity']=$product_quantity;
   }
     $message[] = 'product added to cart succesfully';
  };
  if(!empty($cus_id)){
   $select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE name = '$product_name' AND cus_id='$cus_id'");
  if(mysqli_num_rows($select_cart) > 0){
     $message[] = 'product already added to cart';
  }else{
     $insert_product = mysqli_query($conn, "INSERT INTO `cart`(name, price, image, quantity,cus_id) VALUES('$product_name', '$product_price', '$product_image', '$product_quantity','$cus_id')");
     $message[] = 'product added to cart succesfully';
   }
     
  }
 }
/*if(isset($_POST['add_to_cart'])){

   $product_name = $_POST['product_name'];
   $product_price = $_POST['product_price'];
   $product_image = $_POST['product_image'];
   $product_quantity = 1;

   $select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE name = '$product_name'");

   if(mysqli_num_rows($select_cart) > 0){
      $message[] = 'product already added to cart';
   }else{
      $insert_product = mysqli_query($conn, "INSERT INTO `cart`(name, price, image, quantity) VALUES('$product_name', '$product_price', '$product_image', '$product_quantity')");
      $message[] = 'product added to cart succesfully';
   }

}*/

?>

<!DOCTYPE html>
<html lang="en">

  <head>
    <!-- Site meta data -->
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="eChannelling is the largest Doctor Channeling Network in Sri Lanka"/>

    <link rel="icon" type="image/x-icon" href="./images/logo/favicon.png" />

    <title>
      Kwik mart | largest Online Store in Sri Lanka
    </title>

    <!-- Main CSS file link -->
    <link rel="stylesheet" href="./css/style.css" />
    <link rel="stylesheet" href="./css/itemcard.css">
    <link rel="stylesheet" href="./css/cart_style.css">
    <link rel="stylesheet" href="./css/dstyle.css">
    <link rel="stylesheet" href="./css/checkout.css">
    <link rel="stylesheet" href="./css/profile_style.css">

    <style>
      /* .iconset{
        margin-left:300px;
      } */
      #carticon i {
          width: 100px;
          text-align: center;
          vertical-align: middle;
          position: relative;
      }

      .badge:after {
          margin-right:230px;
          content: attr(data-count);
          position: absolute;
          background: #ff6600;
          height: 1.8rem;
          top: 1rem;
          right: 1.5rem;
          width: 1.8rem;
          text-align: center;
          line-height: 2rem;
          font-size: 1rem;
          border-radius: 50%;
          color: white;
          border: 1px solid #ff6600;
          font-family: sans-serif;
          font-weight: bold;
      }

      .singinbtn{
        padding: 9px 18px;
        background: var(--main-color);
        color: #fff;
        border-radius: 25px;
        font-weight: 500;
        letter-spacing: 1px;
        margin-left: 20px;
      }

      .singinbtn:hover {
          background: var(--secind-color);
          box-shadow: 0 10px 34px rgba(0, 0, 10, 0.14);
      }

      input[type=submit] {
        display: flex;
        align-items: center;
        justify-content: center;
        height: 40px;
        width: 100px;
        border: none;
        outline: none;
        color: #fff;
        background-color: var(--main-color);
        cursor: pointer;
    }
    input[type=submit]:hover {
        background-color: #212f3d;
    }

    .newIcon{
      margin-right: 300px;
    }

    </style>

    <!--Box icon-->
    <link href="https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css" rel="stylesheet"/>

    <!-- Font Awesome CDN Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer"/>

    <!-- Custom Alert box -->
    <link rel="stylesheet" href="./js/cute-alert-master/style.css" />
    <script src="./js/cute-alert-master/cute-alert.js"></script>

  </head>


  <body>

  <?php
      if(isset($message)){
        foreach($message as $message){
          echo '<script type="text/javascript">
          cuteToast({
            type: "success",
            title: "Cart",
            message: "product added to cart succesfully",
            timer: 5000,
          });
          </script>';
        };
      };
  ?>

    <!-- Start header section -->
    <header id="header">

      <!-- Main Logo and Name -->
      <a href="index.php" class="logo">
        <img src="./images/logo/2.png" alt="logo" />
        <span style="color:#27ae60;">Kwik</span><span style="color:rgb(153, 153, 153);font-size:20px;">Mart</span>
      </a>

      <!-- Main Menu -->
      <nav class="navbar">
        <a href="./index.php">Home</a>
        <a href="./product.php">Product</a>
        <a href="./category.php">Category</a>
        <a href="./cart.php">Cart</a>
      </nav>
           
      <!-- icon -->
      <div class="iconset">
      <div class="cart">
          <i class="fa-solid fa-magnifying-glass"></i>

          <a href="profile.php"><i class="fa-solid fa-user"></i></a>


              <?php
                  $select_rows = mysqli_query($conn, "SELECT * FROM `cart`") or die('query failed');
                  $row_count = mysqli_num_rows($select_rows);
              ?>
            <a href="./cart.php"><i id="carticon" data-count="<?php echo $row_count; ?>" class="fa fa-shopping-cart fa-5x fa-border icon-grey badge"></i></a> 

            <?php
              if(isset($_SESSION['user_id'])){
                echo '<a class="singinbtn" href="signout.php">Sign out</a>';
              }
              else{
                echo '<a class="singinbtn" href="logging.php">Sign  In</a>';
              }
            ?>

            

          </div>
      </div>

      <!-- Mobile menu toggle icon -->
      <div id="menu-btn" class="fas fa-bars"></div>
      
      <!-- End header section -->
    </header> 