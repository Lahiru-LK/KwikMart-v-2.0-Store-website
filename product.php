<!-- Header Section -->
<?php
@include 'header.php';
?>

<!-- Start Our services list Section-->
<div class="itemcard">
    <section id="packages">

        <!-- Heading -->
        <div class="headingp" style="padding-top: 100px;">
          <h2><samp style="color:#27ae60;">ALL</samp> PRODUCTS</h2>
          
        </div>

        <!-- Card view -->
        <div class="team-row-item">

          <?php
          $select_products = mysqli_query($conn, "SELECT * FROM `products`");
          if(mysqli_num_rows($select_products) > 0){
            while($fetch_product = mysqli_fetch_assoc($select_products)){
          ?>

          <form action="" method="post">

          <!-- Card item -->
          <div class="items" onclick="window.location.href = 'product_details.php?product_id=<?php echo $fetch_product['id']; ?>';" style="cursor: pointer;">

              <div class="sicon">
                <img src="./images/item_images/<?php echo $fetch_product['image']; ?>" alt="">
              </div>

              <h2><?php echo $fetch_product['name']; ?></h2>

              <p>Rs. <?php echo $fetch_product['price']; ?>/-</p>

              <div class = "rating">
                <span><i class = "fas fa-star"></i></span>
                <span><i class = "fas fa-star"></i></span>
                <span><i class = "fas fa-star"></i></span>
                <span><i class = "fas fa-star"></i></span>
                <span><i class = "far fa-star"></i></span>
              </div>

              <input type="hidden" name="product_name" value="<?php echo $fetch_product['name']; ?>">
              <input type="hidden" name="product_price" value="<?php echo $fetch_product['price']; ?>">
              <input type="hidden" name="product_image" value="<?php echo $fetch_product['image']; ?>">

              <div class="button">
                <a href="#ambulancem">Buy Now</a>
              </div>
              <div class="button">
                <input type="submit" class="btn" value="Add To Cart" name="add_to_cart">
              </div>

          </div>
          </form>
          <?php
         };
      };
      ?>
          
          </div>
          <!-- End Card view -->

        </div>
  </section>
</div>
<!-- End Our services list Section-->


<!-- Footer Section -->
<?php
@include 'footer.php';
?>
