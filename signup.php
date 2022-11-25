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
      Sign Up - Kwik mart
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
              margin-top: 20px;
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
            margin-top: 40px;
              background-color:#fff;
              border-radius: 10px;
              box-shadow: 0 14px 28px rgba(0, 0, 0, 0.25),
                  0 10px 10px rgba(0, 0, 0, 0.22);
              position: relative;
              overflow: hidden;
              width: 400px;
              max-width: 100%;
              min-height: 700px;
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
    <link rel="stylesheet" href="../js/cute-alert-master/style.css" />
    <script src="./js/cute-alert-master/cute-alert.js"></script>


  </head>


  <body>

    <!-- Sign in section -->
    <div class="container" id="container">

        <div class="form-container sign-in-container">
          
            <form action="" method="post" onSubmit="return validatePassword()">

                <a href="./index.php" class="logo">
                    <img src="./images/logo/2.png" alt="logo" />
                    <span style="color:#27ae60;font-size:40px;">Kwik</span><span style="color:rgb(153, 153, 153);font-size:20px;">Mart</span>
                  </a>

                <h1>Sign Up</h1>

                <input type="text" name="name" id="" placeholder="Enter Your Name"  >
                
                <input type="date" name="dob" id="" placeholder="Enter Your DOB"  >

                <input type="text" name="address" id="" placeholder="Enter Your Address"  >

                <input type="text" name="contact" id="" placeholder="Enter Your contact Number"  >

                <input type="text" name="email" id="" placeholder="Enter Your Email"  >

                <input type="text" name="postal_code" id="" placeholder="Enter Your Postal Code"  >

                <input type="password" name="password" id="newpw" placeholder="Enter Your Password">                
                <span id = "message1" style="color:red"> </span>

                <input type="password" name="c_password" id="cnfpw" placeholder="Confirm Your Password" >
                <span id = "message2" style="color:red"> </span>

                <input type="submit" name="submit" value="Sign Up" class="button" onclick="checkEmpty()"/>

                <a href="./logging.php">Already have an account ? <span style="color: blue;font-weight:600;font-size:14px">Sing In Now</span></a>

            </form>

        </div>
   
    </div>

    <script>
            function validatePassword(){

                newPassword = document.getElementById("newpw");
                confirmPassword = document.getElementById("cnfpw");

                if (!newPassword.value) {
                    newPassword.focus();
                    document.getElementById("newpw").innerHTML = " ";
                    document.getElementById("message1").innerHTML = "**Fill the password please!";
                     return false;
                }
                else if (!confirmPassword.value) {
                    confirmPassword.focus();
                    document.getElementById("cnfpw").innerHTML = " ";
                    document.getElementById("message2").innerHTML = "**Fill the confirm password please!";
                     return false;
                }
                if((newPassword.value).length < 8) {
                    document.getElementById("message1").innerHTML = "**Password length must be atleast 8 characters";
                     return false;
                }
                if((confirmPassword.value).length < 8) {
                    document.getElementById("message2").innerHTML = "**Password length must be atleast 8 characters";
                     return false;
                }
                if((newPassword.value).length > 11) {
                    document.getElementById("message1").innerHTML = "**Password length must not exceed 11 characters";
                     return false;
                }
                if((confirmPassword.value).length > 11) {
                    document.getElementById("message2").innerHTML = "**Password length must not exceed 11 characters";
                     return false;
                }
                if ((newPassword.value) != (confirmPassword.value)) {
                    newPassword.value = "";
                    confirmPassword.value = "";
                    newPassword.focus();
                    document.getElementById("message2").innerHTML = "**not same";
                     return false;
	            }
                }
                function myFunction(){
                var x = document.getElementById("newpw");
                if (x.type === "password") {
                    x.type = "text";
                } else {
                    x.type = "password";
                }
                var x = document.getElementById("cnfpw");
                if (x.type === "password") {
                    x.type = "text";
                } else {
                    x.type = "password";
                }
            }
        </script>


    <!-- Link to form JS-->
    <script src="./js/form_script.js"></script>

  </body>

</html>

<?php
    include 'config.php';
    
    if(isset($_POST['submit'])){
            $name=$_POST['name'];

            $dob=$_POST['dob'];
      
            $address=$_POST['address'];
  
            $contact=$_POST['contact'];

            $post_code=$_POST['postal_code'];

            $password=$_POST['c_password'];
       
            $u_name=$_POST['email'];
            if (!filter_var($u_name, FILTER_VALIDATE_EMAIL)){
                echo "<br>Invalid email format";
            }
      
        
            $sql = "INSERT INTO customer
            values
            (NULL,'$name','$dob','$address','$contact','$u_name','$post_code','$password')";
            
            if(mysqli_query($conn,$sql)){
                echo "<script type='text/javascript'>window.top.location='logging.php';</script>"; exit;
            }
            else{
            echo "<br>Error";
            }
        }  
    mysqli_close($conn);
?>
