<?php session_start(); ?>

<?php
	if(!isset($_SESSION['user_id'])){
		header('Location: logging.php');
	}
?>

<?php $Total_price = $_GET['price']; ?>

<?php

@include 'config.php';

if(isset($_POST['order_btn'])){

    $Customer_ID = $_SESSION['user_id'];
    $Full_name = $_POST['Full_name'];
    $E_mail = $_POST['E_mail'];
    $Address = $_POST['Address'];
    $City = $_POST['City'];
    $State = $_POST['State'];
    $Zip_code = $_POST['Zip_code'];
    $Card_name = $_POST['Card_name'];
    $Card_number = $_POST['Card_number'];
    $Expire_month = $_POST['Expire_month'];
    $Expire_year = $_POST['Expire_year'];
    $CVV = $_POST['CVV'];
    $Total_price = $Total_price;


   $detail_query = mysqli_query($conn, "INSERT INTO `orders`(Customer_ID, Full_name, E_mail, Address, City, State, Zip_code, Card_name, Card_number, Expire_month, Expire_year, CVV, Total_price) VALUES($Customer_ID, '$Full_name', '$E_mail', '$Address', '$City', '$State', '$Zip_code', '$Card_name', '$Card_number', '$Expire_month', '$Expire_year', '$CVV', '$Total_price')") or die('query failed');

   if($detail_query){
      echo "
      <div class='order-message-container'>
      <div class='message-container'>
         <h3>thank you for shopping!</h3>
         <div class='order-detail'>
            <span class='total'> total : Rs . ".$Total_price."/-  </span>
         </div>
         <div class='customer-details'>
            <p> your name : <span>".$Full_name."</span> </p>
            <p> your email : <span>".$E_mail."</span> </p>
            <p> your address : <span>".$Address.", ".$City.", ".$State." - ".$Zip_code."</span> </p>
            <p>(*pay when product arrives*)</p>
         </div>
            <a href='product.php' class='btn'>continue shopping</a>
         </div>
      </div>
      ";

      $cartclear_query = mysqli_query($conn, "DELETE FROM cart;") or die('query failed');
   }

}

?>

<!-- Header Section -->
<?php
@include 'header.php';
?>

<div class="row">
  <div class="column">

  <div class="containerf">

    <form action="" method="post">

        <div class="row">

            <div class="col">

                <h3 class="title">billing address</h3>

                <div class="inputBox">
                    <span>full name :</span>
                    <input type="text" placeholder="Lahiru Prasad" name="Full_name">
                </div>
                <div class="inputBox">
                    <span>email :</span>
                    <input type="email" placeholder="example@example.com" name="E_mail">
                </div>
                <div class="inputBox">
                    <span>address :</span>
                    <input type="text" placeholder="room - street - locality" name="Address">
                </div>
                <div class="inputBox">
                    <span>city :</span>
                    <input type="text" placeholder="Matara" name="City">
                </div>

                <div class="flex">
                    <div class="inputBox">
                        <span>state :</span>
                        <input type="text" placeholder="Sri Lanka" name="State">
                    </div>
                    <div class="inputBox">
                        <span>zip code :</span>
                        <input type="text" placeholder="123 456" name="Zip_code">
                    </div>
                </div>

            </div>

            <div class="col">

                <h3 class="title">payment</h3>

                <div class="inputBox">
                    <span>cards accepted :</span>
                    <img src="./images/logo/card_img.png" alt="">
                </div>
                <div class="inputBox">
                    <span>name on card :</span>
                    <input type="text" placeholder="mr. Lahiru Prasad" name="Card_name">
                </div>
                <div class="inputBox">
                    <span>credit card number :</span>
                    <input type="number" placeholder="1111-2222-3333-4444" name="Card_number">
                </div>
                <div class="inputBox">
                    <span>exp month :</span>
                    <input type="text" placeholder="january" name="Expire_month">
                </div>

                <div class="flex">
                    <div class="inputBox">
                        <span>exp year :</span>
                        <input type="number" placeholder="2022" name="Expire_year">
                    </div>
                    <div class="inputBox">
                        <span>CVV :</span>
                        <input type="text" placeholder="1234" name="CVV">
                    </div>
                </div>

            </div>

        </div>

        <input type="submit" value="Place Order" class="submit-btn" name="order_btn">

    </form>

    </div> 


  </div>
  <div class="column">
    <div class="orderSummry">
        <div class="orderSummryText">
            <h1>Order Total</h1>
            <h3>Products</h3>
        </div>


        <div class="display-order">

                <?php
                        $select_cart = mysqli_query($conn, "SELECT * FROM `cart`");
                        $total = 0;
                        $grand_total = 0;
                        if(mysqli_num_rows($select_cart) > 0){
                            while($fetch_cart = mysqli_fetch_assoc($select_cart)){
                            $total_price = $fetch_cart['price'] * $fetch_cart['quantity'];
                            $grand_total = $total += $total_price;
                    ?>
                    <span><?= $fetch_cart['name']; ?> - <?= $fetch_cart['quantity']; ?> &nbsp;&nbsp; <b>Rs. <?= $fetch_cart['price']; ?>/-</b></span>
                    <?php
                        }
                    }else{
                        echo "<div class='display-order'><span>your cart is empty!</span></div>";
                    }
                    ?>
                    <span class="grand-total"> grand total : Rs . <?= $grand_total; ?> /- </span>
                </div>

             </div>

  </div>
</div>

<!-- Footer Section -->
<?php
@include 'footer.php';
?>