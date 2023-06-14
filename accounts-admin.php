<?php

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=q, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="admin-accounts.css?v=<?php echo time(); ?>">
</head>
<body>
    <div class="navbar">
        <a href="#"><img src="img/wangshuinn.png" alt="" class="logoNav"> </a>
        <a href="#" class="logo"> WANGSHU INN</a>
        <ul class="nav">
            <li><a href="adminUpdate.php" class="home">Home</a></li>
            <li><a href="reservation-admin.php"class="reservations">Reservations</a></li>
            <li><a href="#"class="accounts">Accounts</a></li>
            <li><a href="room-admin.php" class="rooms">Rooms</a></li>
            <li><a href="login.php" class="rooms">Logout</a></li>
           
        </ul>
    </div>
    <div class="header-area">
        <div class="fade-header">
            <h1 class="booking-title">ACCOUNTS</h1>
        </div>
    </div>
    <div class="reservation-area">
    <?php
$con = mysqli_connect("localhost","root");
if(!$con){
	echo("Can't connect!");
}
mysqli_select_db($con,"hotelreservation");
$result = mysqli_query($con,"SELECT * FROM user_info");
echo "<table border = '1' class='table_info' id='table_info'><tr>";
echo "<th  style='display:none;'> ID </th>";
echo "<th> First Name </th>";
echo "<th> Last Name </th>";
echo "<th> UserName </th>";
echo "<th> Password </th>";
echo "<th> Email </th>";
echo "<th> User Level </th></tr>";


while($row = mysqli_fetch_array($result)){
    $id = $row['User_ID'];
	$fname = $row['firstName'];
	$lname = $row['lastName'];
    $username = $row['username'];
    $password = $row['password'];
    $email = $row['Email'];
    $userlvl = $row['UserLevel'];
    echo"<tr><td style='display:none;'> $id </td>";
	echo "<td> $fname </td>";
	echo "<td> $lname </td>";
    echo "<td> $username </td>";
    echo "<td> $password </td>";
    echo "<td> $email </td>";
    echo "<td> $userlvl </td> </tr>";
    
}
mysqli_close($con);
echo"</table>";
?>
<table class="reservation-form" id='booktable'>
                <form action="#" method="POST">
                <input type="hidden" name="id" id="id">
                    <tr>
                        <td colspan="2" class="table-data"><span class="subtext">NAME:</span></td> 
                        <td class="table-data"><span class="subtext">Email:</span></td> 
                    </tr>

                    <tr>
                        <td class="table-data"><input type="text" name="firstName" id="firstName" placeholder="First Name" class="input"></td>
                        <td class="table-data"><input type="text" name="lastName" id="lastName" placeholder="Last Name" class="input"></td>
                        <td class="table-data"><input type="email" name="email" id="email" placeholder="Email" class="input"></td>
                    </tr>
                   
                    <tr>
                        <td class="table-data2"><span class="subtext">USERNAME:</span></td> 
                        <td class="table-data2"><span class="subtext">PASSWORD:</span></td> 
                        <td class="table-data2"><span class="subtext">CONFIRM PASSWORD:</span></td> 
                    </tr>
                    <tr>
                        <td class="table-data"><input type="text" name="username" id="username" placeholder="Username" class="input"></td>
                        <td class="table-data"><input type="password" name="password" id="password" placeholder="Password" class="input"></td>
                        <td class="table-data"><input type="password" name="confirmPassword" id="confirmPassword" placeholder="Confirm Password" class="input" ></td>
                    </tr>
                    <tr>
                        <td class="table-data3" colspan="3"><span class="subtext1">USER LEVEL:</span></td> 
                    </tr>
                    <tr>
                       
                        <td class="table-data4" colspan="3">
                            <select name="userLevel" id="userLevel" class="userLevel" >
                                <option hidden selected>SELECT USER LEVEL</option>
                                <option value="Customer">Customer</option>
                                <option value="Admin">Admin</option>
                            </select>
                        </td>

                    
                    </tr>
                    <tr>
                        <td class="table-button"><input type="submit" value="ADD" class="btnAdd" name="btnAdd"></td>
                        <td class="table-button"><input type="submit" value="UPDATE" class="btnUpdate" name="btnUpdate"></td>
                        <td class="table-button"> <input type="submit" value="DELETE" class="btnDelete" name="btnDelete"></td>
                    </tr>
                          
                </form>            
    <?php
      if (isset($_POST['btnAdd'])){
         
        $con = mysqli_connect("localhost","root");
        if(!$con){
            echo("Can't connect!");
        }
        
        mysqli_select_db($con,"hotelreservation");
        $passowrd = $_POST['password'];
        $conpass=$_POST['confirmPassword'];
        if($passowrd == $conpass){
            $sql = "INSERT INTO user_info(firstName,lastName,username, password, UserLevel, Email)VALUES ('$_POST[firstName]','$_POST[lastName]','$_POST[username]','$_POST[password]','$_POST[userLevel]','$_POST[email]')";
            mysqli_query($con,$sql);
            mysqli_close($con);
            echo '<script>alert("Account added Sucessfully!")</script>'; 
        }else{
            echo '<script>alert("Password mismatch")</script>';
        }
       
        
      }
      if (isset($_POST['btnUpdate'])){
        $con = mysqli_connect("localhost","root");
        if(!$con){
            echo("Can't connect!");
        }
        mysqli_select_db($con,"hotelreservation");
        $id= $_POST['id'];
        $fname=$_POST['firstName'];
        $lname=$_POST['lastName'];
        $username=$_POST['username'];
        $password=$_POST['password'];
        $userlevel=$_POST['userLevel'];
        $email=$_POST['email'];
        $conpass=$_POST['confirmPassword'];
        if($password == $conpass){
            $sql = ("UPDATE user_info set firstName='$firstname',lastName='$lname',username='$username', password='$password', UserLevel='$userlevel', Email='$email' WHERE user_id='$id'");
            mysqli_query($con,$sql);
            mysqli_close($con);
    
            echo '<script>alert("Updated Sucessfully!")</script>'; 
        }else{
            echo '<script>alert("Password mismatch")</script>';
        }   

    
    }
    if (isset($_POST['btnDelete'])){
        $con = mysqli_connect("localhost","root");
        if(!$con){
       
            echo("Can't connect!");
        }
        mysqli_select_db($con,"hotelreservation");
        $temp = $_POST['id']; 
        $sql = ("DELETE FROM user_info where user_id = '$temp'");
        mysqli_query($con,$sql);
        mysqli_close($con);
        echo '<script>alert("Deleted Sucessfully!")</script>';      
     
    }
    ?>
    <script type="text/javascript">

var table=document.getElementById('table_info'),rIndex;
for(var i =0; i <table.rows.length;i++){
  table.rows[i].onclick = function(){
      rIndex = this.rowIndex;
    


      document.getElementById("id").value=this.cells[0].innerHTML;
      
      document.getElementById("firstName").value=this.cells[1].innerHTML;
      document.getElementById("lastName").value=this.cells[2].innerHTML;
      document.getElementById("username").value=this.cells[3].innerHTML;
      document.getElementById("password").value=this.cells[4].innerHTML;
      document.getElementById("email").value=this.cells[5].innerHTML;
      document.getElementById("userLevel").value=this.cells[6].innerHTML;

  };
}

</script>
    </div>
</body>
</html>