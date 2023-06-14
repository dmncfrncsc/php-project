<?php


$con=mysqli_connect("localhost","root");
if(!$con){
    echo("Can't connect!");
}
mysqli_select_db($con,"hotelreservation");

if(isset($_POST['username'])){
    $uname = $_POST['username'];
    $password= $_POST['password'];
    $employeeLevel;
    $sql="SELECT * FROM user_info where username='".$uname."' AND password='".$password."' limit 1";
    
    $result =mysqli_query($con, $sql);
    while($row = mysqli_fetch_array($result)){
        $employeeLevel=$row['UserLevel'];
    }
    if(mysqli_num_rows($result) ==1){

       if(strcasecmp($employeeLevel, 'employee') == 0){
        echo '<script>alert("Login Successful")</script>';
        header("Location:customer-home.php");
       }else{
        echo '<script>alert("Login Successful")</script>';
        header("Location:adminUpdate.php");
       }


    }else{
        echo '<script>alert("Incorrect username or password")</script>';
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
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <div class="login-container">
        <div class="login-box">
            <div class="form">
                <div class="left">
                <img src="img/wangshuulogoblack.png" alt="" class="img-login">
                <h1>
                    Welcome To Wangshuu Inn
                </h1>
                <form action="#" method="POST">
                    <span class="title">Username:</span><br>
                    <input type="text" placeholder="Enter username" name="username"><br>
                    <span  class="title">Password:</span><br>
                    <input name="password"type="password" placeholder="Enter password"><br>
                    <button>Sign In</button>
                </form>
                    <p class="subtext">Not Registered Yet? <a href="registration.php">Sign Up </a></p>

                 
                </div>
            
                <div class="right">
                    <img src="img/wanshuinnsunsetedited.png" alt="" class="image">
                   <a href="index.php" class="gotohome"><p class="close">X</p></a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>