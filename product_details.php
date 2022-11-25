<!-- Header Section -->
<?php
@include 'header.php';
?>

<!-- Card view -->
<div class="team-row-item">

  <?php $prod_id = $_GET['product_id']; ?>

  <?php
  $select_products = mysqli_query($conn, "SELECT * FROM `products` WHERE id=$prod_id");
  if(mysqli_num_rows($select_products) > 0){
    while($fetch_product = mysqli_fetch_assoc($select_products)){
  ?>

  <form action="" method="post">
    
    <div class = "card-wrapper">
      <div class = "card">
        <br><br><br>
        <!-- card left -->
        <div class="sicon">
                <img width="400" src="./images/item_images/<?php echo $fetch_product['image']; ?>" alt="">
              </div>
      </div>
    

        <!-- card right -->
        <div class = "product-content">
        <h2><?php echo $fetch_product['name']; ?></h2>
          
          <div class = "product-rating">
            <i class = "fas fa-star"></i>
            <i class = "fas fa-star"></i>
            <i class = "fas fa-star"></i>
            <i class = "fas fa-star"></i>
            <i class = "fas fa-star-half-alt"></i>
            <span>4.7</span>
          </div>

          <div class = "product-price">
          <p>Quantity : <?php echo $fetch_product['quantity']; ?></p>
          <br>
          <p style="font-size: 20px;">Rs. <?php echo $fetch_product['price']; ?>/-</p>
          </div>

          <div class = "product-detail">
            <h2>about this item: </h2>
            <p><?php echo $fetch_product['description']; ?></p>
           </div>

          <input type="hidden" name="product_name" value="<?php echo $fetch_product['name']; ?>">
          <input type="hidden" name="product_price" value="<?php echo $fetch_product['price']; ?>">
          <input type="hidden" name="product_image" value="<?php echo $fetch_product['image']; ?>">

          <div class = "purchase-info">
            <br>
            <div class="button">
                <input type="submit" class="btn" value="Add To Cart" name="add_to_cart">
            </div>

            <div class="buy_btn">
                <a href="./item_checkout.php?item_id=<?php echo $fetch_product['id']; ?>">Buy Now</a>
            </div>

          </div>
          </form>
          <?php
         };
      };
      ?>
        </div>
      </div>
</div>

<!-- Footer Section -->
<?php
    @include 'footer.php';
?>