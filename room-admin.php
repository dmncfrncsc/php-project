<?php

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=q, initial-scale=1.0">
    <title>Room</title>
    <link rel="stylesheet" href="room-admin.css?v=<?php echo time(); ?>">
</head>
<body>
    <div class="navbar">
        <a href="#"><img src="img/wangshuinn.png" alt="" class="logoNav"> </a>
        <a href="#" class="logo"> WANGSHU INN</a>
        <ul class="nav">
            <li><a href="adminUpdate.php" class="home">Home</a></li>
            <li><a href="reservation-admin.php"class="reservations">Reservations</a></li>
            <li><a href="accounts-admin.php"class="accounts">Accounts</a></li>
            <li><a href="#" class="rooms">Rooms</a></li>
            <li><a href="login.php" class="rooms">Logout</a></li>
        </ul>
    </div>
    <div class="header-area">
        <div class="fade-header">
            <h1 class="booking-title">Rooms</h1>
        </div>
    </div>
    <div class="reservation-area">
    <?php
$con = mysqli_connect("localhost","root");
if(!$con){
	echo("Can't connect!");
}
mysqli_select_db($con,"hotelreservation");
$result = mysqli_query($con,"SELECT * FROM room_info");
echo "<table border = '1' class='table_info' id='table_info'><tr>";
echo "<th  style='display:none;'> ID </th>";
echo "<th> Room Number </th>";
echo "<th> Room Type </th>";
echo "<th> Status </th></tr>";


while($row = mysqli_fetch_array($result)){
    $id = $row['room_id'];
	$roomnum = $row['RoomNum'];
	$roomtype = $row['RoomType'];
    $status = $row['Status'];
    echo"<tr><td style='display:none;'> $id </td>";
	echo "<td> $roomnum </td>";
	echo "<td> $roomtype </td>";
    echo "<td> $status </td></tr>";
}
mysqli_close($con);
echo"</table>";
?>
<table class="reservation-form" id='booktable'>
                <form action="#" method="POST">
                <input type="hidden" name="id" id="id">
                 
                   
                    <tr>
                        <td class="table-data2"><span class="subtext">ROOM NUMBER:</span></td> 
                        <td class="table-data2"><span class="subtext">ROOM TYPE:</span></td> 
                        <td class="table-data2"><span class="subtext">STATUS:</span></td> 
                    </tr>
                    <tr>
                        <td class="table-data"><input type="text" name="roomnumber" id="roomnumber" placeholder="Enter room number " class="input"></td>
                        <td class="table-data">
                            <select name="roomtype" id="roomtype" class="roomtype" >
                                <option hidden selected>SELECT ROOM TYPE</option>
                                <option value="classic">Classic</option>
                                <option value="deluxe">Deluxe</option>
                                <option value="premium">Premium</option>
                                <option value="exclusive">Exclusive</option>
                                <option value="ultimate">Ultimate</option>
                            </select>

                           
                        </td>
                        <td class="table-data">
                            <select name="status" id="status" class="status" >
                                <option hidden selected>SELECT STATUS</option>
                                <option value="available">Available</option>
                                <option value="reserved">Reserved</option>
                             
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
            $sql = "INSERT INTO room_info(RoomNum,RoomType,Status)VALUES ('$_POST[roomnumber]','$_POST[roomtype]','$_POST[status]')";
            mysqli_query($con,$sql);
            mysqli_close($con);
            echo '<script>alert("Account added Sucessfully!")</script>'; 
      }
      if (isset($_POST['btnUpdate'])){
        $con = mysqli_connect("localhost","root");
        if(!$con){
            echo("Can't connect!");
        }
        mysqli_select_db($con,"hotelreservation");
        $id= $_POST['id'];
        $roomnum=$_POST['roomnumber'];
        $roomtype=$_POST['roomtype'];
        $status=$_POST['status'];
            $sql = ("UPDATE room_info set RoomNum='$roomnum',RoomType='$roomtype',Status='$status'WHERE room_id='$id'");
            mysqli_query($con,$sql);
            mysqli_close($con);
    
            echo '<script>alert("Updated Sucessfully!")</script>'; 
    
    }
    if (isset($_POST['btnDelete'])){
        $con = mysqli_connect("localhost","root");
        if(!$con){
       
            echo("Can't connect!");
        }
        mysqli_select_db($con,"hotelreservation");
        $temp = $_POST['id']; 
        $sql = ("DELETE FROM room_info where room_id = '$temp'");
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
      
      document.getElementById("roomnumber").value=this.cells[1].innerHTML;
      document.getElementById("roomtype").value=this.cells[2].innerHTML;
      document.getElementById("status").value=this.cells[3].innerHTML;
  };
}

</script>
    </div>
</body>
</html>