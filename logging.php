<?php session_start(); ?>

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
      Sign in - Kwik mart
    </title>

    <!-- Main CSS -->
    <style>
          /* Google Fonts */
          @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800&display=swap');

          * {
              box-sizing: border-box;
          }

          body {
              background-image: url(./images/Sprinkle.svg);
              background-repeat: no-repeat;
              display: flex;
              justify-content: center;
              align-items: center;
              flex-direction: column;
              font-family: "poppins", sans-serif;
              height: 100vh;
              margin: -20px 0 50px;
          }

          h1 {
              color: #212f3d;
              font-weight: bold;
              margin: 0;
          }

          h2 {
              color: #212f3d;
              text-align: center;
          }

          p {
              color: #212f3d;
              font-size: 14px;
              font-weight: 100;
              line-height: 20px;
              letter-spacing: 0.5px;
              margin: 20px 0 30px;
          }

          span {
              font-size: 12px;
          }

          a {
              color: #333;
              font-size: 14px;
              text-decoration: none;
              margin: 15px 0;
          }

          .button {
              border-radius: 20px;
              border: 1px solid #27ae60;
              background-color: #27ae60;
              color: #FFFFFF;
              font-size: 12px;
              font-weight: bold;
              padding: 12px 45px;
              letter-spacing: 1px;
              text-transform: uppercase;
          }

          .button:hover {
              background: #212f3d;
              box-shadow: 0 10px 34px rgba(0, 0, 10, 0.14);
          }

          form {
              background-color: rgba(256, 256, 256, 0.2);
              display: flex;
              align-items: center;
              justify-content: center;
              flex-direction: column;
              padding: 0 50px;
              height: 100%;
              text-align: center;
          }

          input {
              background-color: #eee;
              border: none;
              border-radius: 25px;
              padding: 12px 15px;
              margin: 8px 0;
              width: 100%;
          }

          .container {
              background-color:#fff;
              border-radius: 10px;
              box-shadow: 0 14px 28px rgba(0, 0, 0, 0.25),
                  0 10px 10px rgba(0, 0, 0, 0.22);
              position: relative;
              overflow: hidden;
              width: 400px;
              max-width: 100%;
              min-height: 550px;
          }

          .form-container {
              position: absolute;
              top: 0;
              height: 100%;
          }

          .sign-in-container {
              width: 100%;
          }

          .social-container {
              margin: 20px 0;
          }

          .social-container a {
              border: 1px solid #DDDDDD;
              border-radius: 50%;
              display: inline-flex;
              justify-content: center;
              align-items: center;
              margin: 0 5px;
              height: 40px;
              width: 40px;
          }

          .logo {
                font-size: 1.8rem;
                color: var(--main-color);
                font-weight: 600;
            }

            .logo img {
                width: 50px;
                margin-bottom: -20px;
                margin-right: 5px;
            }
    </style>

    <!-- icon-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>


        <!-- Custom Alert box -->
    <link rel="stylesheet" href="./js/cute-alert-master/style.css" />
    <script src="./js/cute-alert-master/cute-alert.js"></script>


  </head>


  <body>
     
    <!-- Sign in section -->
    <div class="container" id="container">

        <div class="form-container sign-in-container">
          
            <form action="" method="post">

                <a href="./index.php" class="logo">
                    <img src="./images/logo/2.png" alt="logo" />
                    <span style="color:#27ae60;font-size:40px;">Kwik</span><span style="color:rgb(153, 153, 153);font-size:20px;">Mart</span>
                  </a>

                <h1>Sign In</h1>
                
                <div class="social-container">
                    <a href="#" class="social"><i class="fa fa-facebook"></i></a>
                    <a href="#" class="social"><i class="fa fa-google"></i></a>
                    <a href="#" class="social"><i class="fa fa-linkedin"></i></a>
                </div>

                <span>or use your account</span>

                <input type="text" name="username" placeholder="User Name" id="fname">
                
                <input type="password" name="password" placeholder="Password" id="pass">

                <a href="#">Forgot Your Password ?</a>

                <input type="submit" name="signin" value="Sign in" class="button"/>

                <a href="./signup.php">Don't have an account ? <span style="color: blue;font-weight:600;font-size:14px">Sing Up</span></a>
                
            </form>
        </div>
   
    </div>
    <!-- Sign in section -->


    <!-- Link to form JS-->
    <script src="./js/form_script.js"></script>

  </body>

</html>

<?php
    
    include 'config.php';

	if(isset($_POST['signin'])){
		
		$username = $_POST['username'];
		$password = $_POST['password'];
		$md5password = md5($password);

		if (empty($_POST['username']) || empty($_POST['password']))
		{
			
			echo '<script type="text/javascript">
                                cuteToast({
                                type: "error",
                                title: "Empty Filed",
                                message: "Please fill all the fields",
                                timer: 5000,
                                });
                            </script>';
		}
		else{
            //delete null customers cart items from cart table
            $query = "DELETE FROM cart WHERE cus_id IS NULL";

            $delete_null=mysqli_query($conn,$query) or die('query failed');
			$q = "SELECT * FROM customer WHERE uname='{$username}' LIMIT 1";
			$QueryResult = mysqli_query($conn, $q);
            $qA = "SELECT * FROM admin WHERE uname='{$username}' LIMIT 1";
            $QueryResultA = mysqli_query($conn, $qA);
            $qS = "SELECT * FROM seller WHERE uname='{$username}' LIMIT 1";
            $QueryResultS = mysqli_query($conn, $qS);
	
			if($QueryResult)
			{
				if(mysqli_num_rows($QueryResult) == 1)
				{
					$q1 = "SELECT * FROM customer WHERE password='{$password}' LIMIT 1";
					$QueryResult1 = mysqli_query($conn, $q1);
	
					if(mysqli_num_rows($QueryResult1) == 1)
					{
						$q2 = "SELECT * FROM customer WHERE password='{$password}' AND uname='{$username}' LIMIT 1";
						$QueryResult2 = mysqli_query($conn, $q2);

						if(mysqli_num_rows($QueryResult2) == 1){

							$user = mysqli_fetch_assoc($QueryResult2);
                            $_SESSION['user_id'] = $user['cus_id'];
							$_SESSION['user_name'] = $user['uname'];

                            //delete null customers cart items from cart table
	                        $query = "DELETE FROM cart WHERE cus_id IS NULL";
	                        $delete_null=mysqli_query($conn,$query) or die('query failed');

                            //add customer cart to his/her user account
                            $product_name ='';
                            $product_price = '';
                            $product_image = '';
                            $cus_id = '';
                            $product_quantity='';
                            $product_id='';
                            if(isset($_SESSION['product_name'])){
                                $product_name = $_SESSION['product_name'];
                                //echo "$product_name";
                            }
                            if(isset($_SESSION['product_price'])){
                                $product_price = $_SESSION['product_price'];
                                //echo "<br>$product_price";
                            }
                            if(isset($_SESSION['product_image'])){
                                $product_image = $_SESSION['product_image'];
                                //echo "<br>$product_image";
                            }
                            if(isset($_SESSION['user_id'])){
                                $cus_id = $_SESSION['user_id'];
                                //echo "<br>$cus_id";
                            }
                            if(isset($_SESSION['product_quantity'])){
                                $product_quantity = $_SESSION['product_quantity'];
                                //echo "<br>$product_quantity";
                            }
                            /*if(isset($_SESSION['product_id'])){
                                $product_id = $_SESSION['product_id'];
                                echo "<br>$product_id";
                            }*/
                            if(!empty($product_name) AND !empty($product_price) AND !empty($product_image) AND !empty($product_quantity)){
                                $add_item_query="INSERT INTO `cart`(name, price, image, quantity,cus_id) VALUES('$product_name', '$product_price', '$product_image', '$product_quantity','$cus_id')";
                                $add_user_item=mysqli_query($conn,$add_item_query);
                            }
                            
                            echo "<script type='text/javascript'>window.top.location='index.php';</script>"; exit;

						}
						else{
							$user = mysqli_fetch_assoc($QueryResult2);
                            $_SESSION['user_id'] = $user['cus_id'];
							$_SESSION['user_name'] = $user['uname'];

                            

							echo "<script type='text/javascript'>window.top.location='profile.php';</script>"; exit;
						}

					}
					else{
						echo '<script type="text/javascript">
                                cuteToast({
                                type: "error",
                                title: "Password",
                                message: "User Password is incorrect",
                                timer: 5000,
                                });
                            </script>';
						exit();
					}
	
				}else if($QueryResultA){
                            if(mysqli_num_rows($QueryResultA) == 1)
                            {
                                $qA1 = "SELECT * FROM admin WHERE password='{$password}' LIMIT 1";
                                $QueryResultA1 = mysqli_query($conn, $qA1);
                
                                if(mysqli_num_rows($QueryResultA1) == 1)
                                {
                                    $qA2 = "SELECT * FROM admin WHERE password='{$password}' AND uname='{$username}' LIMIT 1";
                                    $QueryResultA2 = mysqli_query($conn, $qA2);
                                    if(mysqli_num_rows($QueryResultA2) == 1){
                                        echo "<script type='text/javascript'>window.top.location='./AdminPanel';</script>"; exit;
                                    }
                                }else{
                                    echo '<script type="text/javascript">
                                            cuteToast({
                                            type: "error",
                                            title: "Password",
                                            message: "User Password is incorrect",
                                            timer: 5000,
                                            });
                                        </script>';
                                    exit();
                                }
                    }else if($QueryResultS){
                        if(mysqli_num_rows($QueryResultS) == 1)
                        {
                            $qS1 = "SELECT * FROM seller WHERE password='{$password}' LIMIT 1";
                            $QueryResultS1 = mysqli_query($conn, $qS1);
            
                            if(mysqli_num_rows($QueryResultS1) == 1)
                            {
                                $qS2 = "SELECT * FROM seller WHERE password='{$password}' AND uname='{$username}' LIMIT 1";
                                $QueryResultS2 = mysqli_query($conn, $qS2);
                                if(mysqli_num_rows($QueryResultS2) == 1){
                                    echo "<script type='text/javascript'>window.top.location='./AdminPanel';</script>"; exit;
                                }
                            }else{
                                echo '<script type="text/javascript">
                                        cuteToast({
                                        type: "error",
                                        title: "Password",
                                        message: "User Password is incorrect",
                                        timer: 5000,
                                        });
                                    </script>';
                                exit();
                            }
                    }
				else{
					echo '<script type="text/javascript">
                            cuteToast({
                            type: "error",
                            title: "User Name",
                            message: "User Name is incorrect",
                            timer: 5000,
                            });
                        </script>';
					exit();
				}
			}
			else{
				header('Location: login.php');
			}
		}
    }
}
		mysqli_close($conn);
	}
?>