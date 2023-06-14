<?php
$con=mysqli_connect("localhost","root");
if(!$con){
    echo("Can't connect!");
}
mysqli_select_db($con,"hotelreservation");

if(isset($_POST['btnConfirm'])){
    $fname=$_POST['firstName'];
    $lname=$_POST['lastName'];
    $email=$_POST['email'];
    $uname=$_POST['username'];
    $passowrd = $_POST['password'];
    $conpass=$_POST['confirmPassword'];
    $level="Employee";

    if($passowrd == $conpass){
      
        $sql = "INSERT INTO user_info(firstName,lastName,username, password, UserLevel, Email) VALUES ('$fname','$lname','$uname','$passowrd','$level','$email')";
        mysqli_query($con,$sql);
        mysqli_close($con);

       
        header("Location:login.php");
        echo '<script>alert("Registered Successfully")</script>';
        exit();
    }else{
      

    }
    
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="registration.css">
</head>
<body>
    <div class="login-container">
        <div class="login-box">
            <div class="form">
                <div class="left">
                    <img src="img/wangshuulogoblack.png" alt="" class="img-login">
                <h1>
                    REGISTRATION FORM
                </h1>
                <table>
                    <form action="#" method="POST">
                        <tr>
                            <td><span class="title">First Name:</span></td>
                            <td><span class="title">Last Name:</span></td>
                        </tr>
                        <tr>
                            <td><input type="text" placeholder="Enter first name" name="firstName"></td>
                            <td><input type="text" placeholder="Enter last name" name="lastName"></td>
                        </tr>
                        <tr>
                            <td><span class="title">Username:</span></td>
                            <td><span class="title">Password:</span></td>
                        </tr>
                        <tr>
                            <td><input type="text" placeholder="Enter username" name="username"></td>
                            <td><input type="password" placeholder="Enter password" name="password"></td>
                        </tr>
                        <tr>
                            <td><span class="title">Email:</span></td>
                            <td><span class="title">Confirm Password:</span></td>
                            
                        </tr>
                        <tr>
                            <td><input type="email" placeholder="Enter Email" name="email"></td>
                            <td><input type="password" placeholder="Confirm Password" name="confirmPassword"></td>
                        </tr>
                        
                        <tr>
                            <td><button name="btnConfirm">Confirm</button></td>
                            <td><a href="login.php" class="cancel"><span class="cancelText">Cancel</span></a></td>
                        </tr>
                    </form>
                </table>
                <!-- <form action="#" method="POST">
                    <span class="title">Email:</span><br>
                    <input type="text" placeholder="Enter email" name="username"><br>
                    <span  class="title">Password:</span><br>
                    <input name="password"type="password" placeholder="Enter password"><br>
                    <button>Sign In</button>
                </form>
                    <p class="subtext">Not Registered Yet? <a href="">Sign Up </a></p> -->

                 
                </div>
            
                <div class="right">
                    <img src="img/wanshuinnsunsetedited.png" alt="" class="image">
                  
                </div>
            </div>
        </div>
    </div>
</body>
</html>