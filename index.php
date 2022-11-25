<!-- Header Section -->
<?php
@include 'header.php';
?>


<!-- Start Home 1 Section -->
<section id="home">
      
      <div class="home-text">

        <!-- Main Text -->
        <h1>Welcome to<br />Our <span style="color:#27ae60;">Kwik</span><span style="color:rgb(153, 153, 153);;">Mart</span></h1>
        <p>
          KwikMart is the largest Popular Online Store in Sri Lanka. Next-day delivery. Zero delivery fees.
        </p>

        <!--Button-->
        <div class="apButton">
          <a href="./product.php">Shop Now</a>
        </div>

      </div>

      <!-- Main Home Image -->
      <div class="home-img">
        <img src="./images/home/home_page_01.svg" alt="" />
      </div>

    </section>
    <!-- Start Home 1 Section -->


    <!-- Start Home 2 Section -->
    <section id="home2">

      <!-- Heading -->
      <div class="homeHeading">
        <h2>Our Services</h2>
        <p>KwikMart Online Store</p>
      </div>
      
      <div class="homeScond">

            <!-- Card view -->
            <div class="team-row">

              <!-- Card 01 -->
              <div class="services">

                  <div class="sicon">
                    <i class='bx bxs-truck'></i>
                  </div>

                  <h2>Free delivery</h2>

                  <p>
                    your order is delivered three to five business days after all of your items are available to be dispatched, including pre-order.
                  </p>

              </div>
      
              <!-- Card 02 -->
              <div class="services">

                  <div class="sicon">
                    <i class='bx bx-support'></i>
                  </div>

                  <h2>24/7 Service</h2>

                  <p>
                    Online Stores That Offer 24/7 Call Support. person and too impatient to wait until business hours to call support.
                  </p>

              </div>
      
              <!-- Card 03 -->
              <div class="services">

                  <div class="sicon">
                    <i class='bx bxs-dollar-circle'></i>
                  </div>
      
                  <h2>Easy Payments</h2>
      
                  <p>
                    Make your online payment with Kwikmart's payment partners and shop online with Kwikmartlk today.
                  </p>

              </div>

              <!-- Card 04 -->
              <div class="services">

                    <div class="sicon">
                      <i class='bx bxs-discount'></i>
                    </div>

                    <h2>Mega Deals</h2>

                    <p>
                      Get all the Kwik Mart discount codes on the landing page to avail even Rs.100 off.
                    </p>

              </div>
              
            </div>

      </div>      
      
    </section>
    <!-- Start Home 2 Section -->
    
<!-- Start Our services list Section-->
<div class="itemcard">
    <section id="packages">

        <!-- Heading -->
        <div class="headingp" style="padding-top: 100px;">
          <h2><samp style="color:#27ae60;">FLASH</samp> DEALS</h2>
          <p style="padding-top: 20px;">Incredible deals available for a limited time only. Don't miss out!</p>
        </div>

        <!-- Card view -->
        <div class="team-row-item">

          <?php
          $select_products = mysqli_query($conn, "SELECT * FROM `products` WHERE cat_id='2' LIMIT 3");
          if(mysqli_num_rows($select_products) > 0){
            while($fetch_product = mysqli_fetch_assoc($select_products)){
          ?>

          <form action="" method="post">

          <!-- Card item -->
          <div class="items" onclick="window.location.href = 'product_details.php?product_id=<?php echo $fetch_product['id']; ?>';" style="cursor: pointer;">

          <img src="./images/new.png" height="45px" width="60px" class="newIcon">

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
              <input type="hidden" name="product_id" value="<?php echo $fetch_product['id'];?>">

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

    <!-- Start Home 3 Section -->
    <section id="home3">

      <!-- Main Home Image -->
      <div class="home3-img">
        <img src="./images/home/Discount-cuate.svg" alt="" />
      </div>
      
      <div class="home3-text">

        <!-- Main Text -->
        <h2>Looking for <br />discount ?</h2>
        <p>
          We'll talk about some discount code ideas you can use to <br>Let's take a look at some of the most popular options below.
        </p>

      <!--Button-->
      <div class="home3Button">
        <a href="./pages/doctors.html" target="_blank">Get discount</a>
      </div>

      </div>

    </section>
    <!-- End Home 3 Section -->


    <!-- Start Home 4 Section -->
    <!-- Heading -->
    <div class="heading" style="padding-top: 100px;" id="about">
      <h2><samp style="color:#27ae60;">ABOUT</samp> US</h2>
    </div>
    <section id="home4" style="margin-top: -120px;">
      
      <div class="home4-text">

        <!-- Main Text -->
        <h2>Best Products In The Country</h2>
        <p><strong>Thank you for visiting KwikMart.</strong>
        <br> Curfew/Lockdown last year was difficult for many of us. Although many vendors started to sell their goods online, there were inherent issues with technology, infrastructure, quality of products, regular supply and most importantly, safetly. It was also a challenging time for small restaurants and artisan businesses, badly affected by the closures, reduced traffic and zero tourists. KwikMart was created to  the desire to sell quality products in a safe and convenient manner. <br><br>

Our Service Promise is simple – variety & availability, quality of goods and delivery at your convenience. <br><br>

Our team is here to serve you so please do not hesitate to reach out to us. We hope you enjoy the KwikMart experience and service.
        </p>
      </div>

      <!-- Main Home Image -->
      <div class="home4-img">
        <img src="./images/home/About.svg" alt=""/>
      </div>

    </section>
    <!-- Start Home 4 Section -->


<!-- Footer Section -->
<?php
@include 'footer.php';
?>
