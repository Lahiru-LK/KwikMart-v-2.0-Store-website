<?php session_start(); ?>



<?php

@include 'config.php';

if(isset($_POST['add_product'])){
   $p_name = $_POST['p_name'];
   $p_price = $_POST['p_price'];
   $p_image = $_FILES['p_image']['name'];
   $p_image_tmp_name = $_FILES['p_image']['tmp_name'];
   $p_image_folder = '../images/item_images/'.$p_image;
   $c_type = $_POST['ctype'];
   $p_description = $_POST['p_description'];
   $p_quantity = $_POST['p_quantity'];
   $p_discount = $_POST['p_discount'];


   $insert_query = mysqli_query($conn, "INSERT INTO `products`(name, price, image, cat_id, description, quantity, discount) VALUES('$p_name', '$p_price', '$p_image', $c_type, '$p_description', $p_quantity, $p_discount)") or die('query failed');

   if($insert_query){
      move_uploaded_file($p_image_tmp_name, $p_image_folder);
      $message[] = 'product add succesfully';
   }else{
      $message[] = 'could not add the product';
   }
};

if(isset($_GET['delete'])){
   $delete_id = $_GET['delete'];
   $delete_query = mysqli_query($conn, "DELETE FROM `products` WHERE id = $delete_id ") or die('query failed');
   if($delete_query){
      header('location:admin.php');
      $message[] = 'product has been deleted';
   }else{
      header('location:admin.php');
      $message[] = 'product could not be deleted';
   };
};

if(isset($_POST['update_product'])){
   $update_p_id = $_POST['update_p_id'];
   $update_p_name = $_POST['update_p_name'];
   $update_p_price = $_POST['update_p_price'];
   $update_p_image = $_FILES['update_p_image']['name'];
   $update_p_image_tmp_name = $_FILES['update_p_image']['tmp_name'];
   $p_image_folder = '../images/item_images'.$p_image;
   $c_type = $_POST['ctype'];
   $p_description = $_POST['p_description'];
   $p_quantity = $_POST['p_quantity'];
   $p_discount = $_POST['p_discount'];

   $update_query = mysqli_query($conn, "UPDATE `products` SET name = '$update_p_name', price = '$update_p_price', image = '$update_p_image', cat_id = $c_type, description = '$p_description', quantity = $p_quantity, discount = $p_discount  WHERE id = '$update_p_id'");

   if($update_query){
     // move_uploaded_file($update_p_image_tmp_name, $update_p_image_folder);
      $message[] = 'product updated succesfully';
      header('location:admin.php');
   }else{
      $message[] = 'product could not be updated';
      header('location:admin.php');
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
   <link rel="icon" type="image/x-icon" href="./images/logo/favicon.png" />

   <title>
   Kwik mart | Admin Panel
   </title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<?php

if(isset($message)){
   foreach($message as $message){
      echo '<div class="message"><span>'.$message.'</span> <i class="fas fa-times" onclick="this.parentElement.style.display = `none`;"></i> </div>';
   };
};

?>

<?php include 'header.php'; ?>

<div class="container">

<section>

<form action="" method="post" class="add-product-form" enctype="multipart/form-data">
   <h3>add a new product</h3>
   <input type="text" name="p_name" placeholder="enter the product name" class="box" required>
   <input type="number" name="p_price" min="0" placeholder="enter the product price" class="box" required>
   <input type="file" name="p_image" accept="image/png, image/jpg, image/jpeg" class="box" required>

   <select name="ctype" id="">
                        <option value="1">Food</option>
                        <option value="4">Home Appliances</option>
                        <option value="2">Computer & Office</option>
                        <option value="5">Home Improvement</option>
                        <option value="3">Home & Garden</option>
                        <option value="9">Toys & Hobbies</option>
                        <option value="7">Shoes</option>
                        <option value="6">Mothor & Kids</option>
                        <option value="8">Tools</option>
   </select>

   <input type="number" name="p_quantity" placeholder="Number of Quantity" class="box" required>

   <input type="number" name="p_discount" placeholder="Discount" class="box" required>

   <textarea name="p_description" id="" cols="70" rows="10" placeholder="Descriptio"></textarea>

   <input type="submit" value="add the product" name="add_product" class="btn">
</form>

</section>

<section class="display-product-table">

   <table>

      <thead>
         <th>product image</th>
         <th>product name</th>
         <th>product price</th>
         <th>action</th>
      </thead>

      <tbody>
         <?php
         
            $select_products = mysqli_query($conn, "SELECT * FROM `products`");
            if(mysqli_num_rows($select_products) > 0){
               while($row = mysqli_fetch_assoc($select_products)){
         ?>

         <tr>
            <td><img src="../KwikMart/images/item_images/<?php echo $row['image']; ?>" height="100" alt=""></td>
            <td><?php echo $row['name']; ?></td>
            <td>$<?php echo $row['price']; ?>/-</td>
            <td>
               <a href="admin.php?delete=<?php echo $row['id']; ?>" class="delete-btn" onclick="return confirm('are your sure you want to delete this?');"> <i class="fas fa-trash"></i> delete </a>
               <a href="admin.php?edit=<?php echo $row['id']; ?>" class="option-btn"> <i class="fas fa-edit"></i> update </a>
            </td>
         </tr>

         <?php
            };    
            }else{
               echo "<div class='empty'>no product added</div>";
            };
         ?>
      </tbody>
   </table>

</section>

<section class="edit-form-container">

   <?php
   
   if(isset($_GET['edit'])){
      $edit_id = $_GET['edit'];
      $edit_query = mysqli_query($conn, "SELECT * FROM `products` WHERE id = $edit_id");
      if(mysqli_num_rows($edit_query) > 0){
         while($fetch_edit = mysqli_fetch_assoc($edit_query)){
   ?>

   <form action="" method="post" enctype="multipart/form-data">
      <img src="uploaded_img/<?php echo $fetch_edit['image']; ?>" height="200" alt="">
      <input type="hidden" name="update_p_id" value="<?php echo $fetch_edit['id']; ?>">
      <input type="text" class="box" required name="update_p_name" value="<?php echo $fetch_edit['name']; ?>">
      <input type="number" min="0" class="box" required name="update_p_price" value="<?php echo $fetch_edit['price']; ?>">
      <input type="file" class="box" required name="update_p_image" accept="image/png, image/jpg, image/jpeg">


      <select name="ctype" id="">
                        <option value="1">Food</option>
                        <option value="4">Home Appliances</option>
                        <option value="2">Computer & Office</option>
                        <option value="5">Home Improvement</option>
                        <option value="3">Home & Garden</option>
                        <option value="9">Toys & Hobbies</option>
                        <option value="7">Shoes</option>
                        <option value="6">Mothor & Kids</option>
                        <option value="8">Tools</option>
      </select>

      <input type="number" name="p_quantity" placeholder="Number of Quantity" class="box" required>

   <input type="number" name="p_discount" placeholder="Discount" class="box" required>

   <textarea name="p_description" id="" cols="70" rows="10" placeholder="Descriptio"></textarea>

      <input type="submit" value="update the prodcut" name="update_product" class="btn">
      <input type="reset" value="cancel" id="close-edit" class="option-btn">
   </form>

   <?php
            };
         };
         echo "<script>document.querySelector('.edit-form-container').style.display = 'flex';</script>";
      };
   ?>

</section>

</div>















<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>