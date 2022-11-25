<?php
        if (!filter_var($_POST['username'],FILTER_VALIDATE_EMAIL)){
            echo "<br>Invalid user name format";
        }

        $q_pwd="SELECT password
                  FROM admin
                  WHERE $_POST['username']='$uname'";
        $result=mysqli_query($conn,$q_pwd);
        $userpw="";
        while($row = mysqli_fetch_array($result)){
            $userpw=$row['password'];
        }
        //echo "$userpw";
        if($password!=$userpw){
            echo '<script type="text/javascript">
                                cuteToast({
                                type: "error",
                                title: "Password",
                                message: "User Password is incorrect",
                                timer: 5000,
                                });
                            </script>';
						exit();
        }else{
            echo "Login successfully";
        }
?>