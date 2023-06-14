<?php

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=q, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="adminupdated.css?v=<?php echo time(); ?>">
</head>
<body>
    <div class="navbar">
        <a href="#"><img src="img/wangshuinn.png" alt="" class="logoNav"> </a>
        <a href="#" class="logo"> WANGSHU INN</a>
        <ul class="nav">
            <li><a href="adminUpdate.php" class="home">Home</a></li>
            <li><a href="#"class="reservations">Reservations</a></li>
            <li><a href="accounts-admin.php"class="accounts">Accounts</a></li>
            <li><a href="room-admin.php" class="rooms">Rooms</a></li>
            <li><a href="login.php" class="rooms">Logout</a></li>
           
        </ul>
    </div>
    <div class="header-area">
        <div class="fade-header">
            <h1 class="booking-title">RESERVATION</h1>
        </div>
    </div>
    <div class="reservation-area">
    <?php
$con = mysqli_connect("localhost","root");
if(!$con){
	echo("Can't connect!");
}
mysqli_select_db($con,"hotelreservation");
$result = mysqli_query($con,"SELECT * FROM customer_info");
echo "<table border = '1' class='table_info' id='table_info'><tr>";
echo "<th  style='display:none;'> ID </th>";
echo "<th> First Name </th>";
echo "<th> Last Name </th>";
echo "<th> Address </th>";
echo "<th> Contact No. </th>";
echo "<th> Room Type</th>";
echo "<th> Number of Guest </th>";
echo "<th> Room Number</th>";
echo "<th> Room Price</th>";
echo "<th> Check In</th>";
echo "<th> Check Out </th>";
echo "<th> Downpayment</th>";
echo "<th> Total Price </th></tr>";

while($row = mysqli_fetch_array($result)){
    $id = $row['CustomerID'];
	$fname = $row['FName'];
	$lname = $row['LName'];
    $add = $row['Cust_Address'];
    $contact = $row['ContactNo'];
    $roomtype = $row['RoomType'];
    $guest = $row['NumberOfGuest'];
    $roomNumber = $row['RoomNum'];
    $roomPrice = $row['RoomPrice'];
    $checkIn = $row['CheckIn'];
    $checkOut = $row['CheckOut'];
    $DownPayment = $row['DownPayment'];
    $TotalPrice = $row['TotalPrice'];
    echo"<tr><td style='display:none;'> $id </td>";
	echo "<td class='data-table'> $fname </td>";
	echo "<td class='data-table'> $lname </td>";
    echo "<td class='data-table'> $add </td>";
    echo "<td class='data-table'> $contact </td>";
    echo "<td class='data-table'> $roomtype </td>";
    echo "<td class='data-table'> $guest </td>";
    echo "<td class='data-table'> $roomNumber </td>";
    echo "<td class='data-table'> $roomPrice </td>";
    echo "<td class='data-table'> $checkIn </td>";
    echo "<td class='data-table'> $checkOut </td>";
    echo "<td class='data-table'> $DownPayment </td>";
    echo "<td > $TotalPrice </td></tr>";
    
}
mysqli_close($con);
echo"</table>";
?>


<table class="reservation-form" id='booktable'>
                <form action="#" method="POST">
                <input type="hidden" name="id" id="id">
                    <tr>
                        <td colspan="2" class="table-data"><span class="subtext">NAME:</span></td> 
                        <td class="table-data"><span class="subtext">CONTACT NO.:</span></td> 
                    </tr>

                    <tr>
                        <td class="table-data"><input type="text" name="firstName" id="firstName" placeholder="First Name" class="input"></td>
                        <td class="table-data"><input type="text" name="lastName" id="lastName" placeholder="Last Name" class="input"></td>
                        <td class="table-data"><input type="text" name="contact" id="contact" placeholder="Contact Number" class="input"></td>
                   
                    </tr>
                    <tr>
                        <td colspan="3" class="table-data2"><span class="subtext">ADDRESS:</span></td> 
                       
                    </tr>
                    <tr>
                        <td colspan="3" class="table-data"><input type="text" name="address" id="address" placeholder="Full Address" class="input"></td>
                       
                    </tr>
                    <tr>
                        <td class="table-data2"><span class="subtext">ROOM TYPE:</span></td> 
                        <td class="table-data2"><span class="subtext">NUMBER OF GUEST/S:</span></td> 
                        <td class="table-data2"><span class="subtext">ROOM NUMBER:</span></td> 
                    </tr>
                    <tr>
                        <td class="table-data">
                            <select name="roomclass" id="roomclass" class="roomclass" onchange="roomSelect(this.value)" >
                                <option hidden selected>SELECT ROOM TYPE</option>
                                <option value="classic">Classic</option>
                                <option value="deluxe">Deluxe</option>
                                <option value="premium">Premium</option>
                                <option value="exclusive">Exclusive</option>
                                <option value="exclusive">Ultimate</option>
                      
                            </select>
                        </td>
                        <td class="table-data"><input type="number" name="guests" id="guests" placeholder="Number of Guests" class="input"></td>
                        <td class="table-data"><input type="text" name="roomNum" id="roomNum" placeholder="Room Number" class="input" ></td>
                    </tr>
                    <tr>

                        
                        <td class="table-data2"><span class="subtext">ROOM PRICE:</span></td> 
                        <td class="table-data2"><span class="subtext">CHECK IN:</span></td> 
                        <td class="table-data2"><span class="subtext" >CHECK OUT:</span></td> 
                    </tr>
                    <tr>
                       
                      
                        <td class="table-data"><input type="text" name="roomPrice" id="roomPrice" placeholder="Room Price" class="input" ></td> 
                        <td class="table-data"><input type="date" name="checkIn" id="checkIn" placeholder="" class="input" onchange="calculateDate()"></td>
                        <td class="table-data"><input type="date" name="checkOut" id="checkOut" placeholder="" class="input" onchange="calculateDate()"></td>
                    </tr>


                    <tr>
                        
                        <td class="table-data2"><span class="subtext">DOWNPAYMENT PRICE:</span></td>
                        <!-- <td colspan="1" class="table-data"><span class="subtext">CREDIT CARD NUMBER</span></td>      -->
                        <td class="table-data2">
                            <span class="subtext">
                                TOTAL PRICE
                            </span>
                        </td>
                    </tr>
                    <tr>
                        
                       <td class="table-data"><input type="text" name="downPayment" id="downPayment" placeholder="Downpayment" class="input" ></td> 
                     
              
                       <td colspan="1" class="table-data"><input type="text" name="totalPrice" id="totalPrice" placeholder="Total Price" class="input"  ></td>
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
        
        $roomPrice = $_POST['roomPrice'];
        $downPays  =  (int)$_POST['downPayment'];
        $totalPrice = $_POST['totalPrice'];
        $sql = "INSERT INTO customer_Info(FName,LName,Cust_Address, ContactNo, RoomType, NumberOfGuest, RoomNum, RoomPrice, CheckIn, CheckOut, DownPayment, TotalPrice) VALUES ('$_POST[firstName]','$_POST[lastName]','$_POST[address]','$_POST[contact]','$_POST[roomclass]','$_POST[guests]','$_POST[roomNum]','$roomPrice','$_POST[checkIn]','$_POST[checkOut]','$downPays','$totalPrice')";
        mysqli_query($con,$sql);
        mysqli_close($con);
        echo '<script>alert("Reservation Sucessful!")</script>'; 
        
      }
      if (isset($_POST['btnUpdate'])){
        $con = mysqli_connect("localhost","root");
        if(!$con){
            echo("Can't connect!");
        }
        mysqli_select_db($con,"hotelreservation");
        $id= $_POST['id'];
        $firstname = $_POST ['firstName'];
        $lastName = $_POST['lastName'];
        $address = $_POST['address'];
        $contact = $_POST['contact'];
        $roomClass = $_POST['roomclass'];
        $guests = $_POST['guests'];
        $roomNum = $_POST['roomNum'];
        $roomPrice = $_POST['roomPrice'];
        $checkin= $_POST['checkIn'];
        $checkout=$_POST['checkOut'];
        $downPays  =  (int)$_POST['downPayment'];
        $totalPrice = $_POST['totalPrice'];

        $sql = ("UPDATE customer_Info set FName='$firstname',LName='$lastName',Cust_Address='$address', ContactNo='$contact', RoomType='$roomClass', NumberOfGuest='$guests', RoomNum='$roomNum', RoomPrice='$roomPrice', CheckIn='$checkin', CheckOut='$checkout', DownPayment='$downPays', TotalPrice='$totalPrice'  where CustomerID = '$id'");
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
        $sql = ("DELETE FROM customer_info where CustomerID = '$temp'");
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
      var guests = parseInt(this.cells[6].innerHTML);
      var class2 = this.cells[5].innerHTML;

      document.getElementById("id").value=this.cells[0].innerHTML;
      
      document.getElementById("firstName").value=this.cells[1].innerHTML;
      document.getElementById("lastName").value=this.cells[2].innerHTML;
      document.getElementById("address").value=this.cells[3].innerHTML;
      document.getElementById("contact").value=this.cells[4].innerHTML;
        document.getElementById("roomclass").value=class2.toUpperCase();
      document.getElementById("guests").value=guests;
      document.getElementById("roomNum").value=this.cells[7].innerHTML;
      document.getElementById("roomPrice").value=this.cells[8].innerHTML;
      document.getElementById("checkIn").value=this.cells[9].innerHTML;
      document.getElementById("checkOut").value=this.cells[10].innerHTML;
      document.getElementById("downPayment").value=this.cells[11].innerHTML;
      document.getElementById("totalPrice").value=this.cells[12].innerHTML;
      

  };
}
function roomSelect(value){
var number=generateRoomNumber();

if(value=="standard"){
  document.getElementById("roomPrice").value="700.00";
  document.getElementById("roomNum").value="ST-"+number;
}
if(value=="classic"){
  document.getElementById("roomPrice").value="900.00";
  document.getElementById("roomNum").value="CL-"+number;
}
if(value=="superior"){
  document.getElementById("roomPrice").value="1100.00";
  document.getElementById("roomNum").value="SP-"+number;
}
if(value=="deluxe"){
  document.getElementById("roomPrice").value="1300.00";
  document.getElementById("roomNum").value="DL-"+number;
}
if(value=="executive"){
  document.getElementById("roomPrice").value="1700.00";
  document.getElementById("roomNum").value="EX-"+number;
}
}
function generateRoomNumber(){
var number = Math.floor(Math.random() * 1000);
return number;
}
function calculateDate(){

var date1 = new Date(document.getElementById("checkIn").value)

var date2 = new Date(document.getElementById("checkOut").value)

var Difference_In_Time = date2.getTime() - date1.getTime();
var Difference_In_Days = Difference_In_Time / (1000 * 3600 * 24);
var result = Number.isNaN(Difference_In_Days);


if(result != true){
  getTotalPrice(Difference_In_Days);
}

}

function getTotalPrice(totalDate1){
var totalDate = parseFloat(totalDate1);
var price = parseFloat(document.getElementById("roomPrice").value);

var newValue = totalDate * price;

document.getElementById("totalPrice").value=newValue;

getDownPayment(newValue);
}
function getDownPayment(totalPrice){
var downpayment = totalPrice * .1;
document.getElementById("downPayment").value = downpayment;
}

</script>
    </div>
</body>
</html>