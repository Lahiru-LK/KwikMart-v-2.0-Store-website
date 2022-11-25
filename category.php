<!-- Header Section -->
<?php
@include 'header.php';
?>


      <!-- Start Our services list Section-->
      <div class="itemcard">
      <section id="packages">

        <!-- Heading -->
        <div class="headingp" style="padding-top: 100px;">
          <h2><samp style="color:#27ae60;">PRODUCT </samp> CATEGORIES</h2>
          <br>
          <p>Choosing an appropriate category is very important to your selling success.</p>
        </div>

        <!-- Card view -->
        <div class="team-row-item">

            <?php
              $select_category = mysqli_query($conn, "SELECT * FROM `category`");
              if(mysqli_num_rows($select_category) > 0){
                while($fetch_category = mysqli_fetch_assoc($select_category)){
            ?>

              <!-- Card item -->
              <div class="items">

              <h2><samp style="font-size:25px;"><?php echo $fetch_category['cat_name']; ?></samp></h2>
                      <div class="sicon">
                        <img src="./images/category/<?php echo $fetch_category['image']; ?>" alt="">
                      </div>

                      <div class="button">
                        <a href="category_item.php?category_id=<?php echo $fetch_category['cat_id']; ?>&category_name=<?php echo $fetch_category['cat_name']; ?>">View Items</a>
                      </div>

              </div>

              <?php
         };
      };
      ?>

        </div>

      </div>    
          
</div>
<!-- End Card view -->

<!-- Footer Section -->
<?php
@include 'footer.php';
?>