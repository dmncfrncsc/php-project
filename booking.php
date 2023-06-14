
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">
    </style>
    
</head>
<body>
    
    <div class="navbar">
        <a href="#"><img src="img/wangshuinn.png" alt="" class="logoNav"> </a>
        <a href="#" class="logo"> WANGSHU INN</a>
        <ul class="nav">
            <li><a href="customer-home.php" class="home">Home</a></li>
            <li><a href="customer-home.php #about"class="about">About Us</a></li>
            <li><a href="customer-home.php #rooms"class="rooms">Rooms</a></li>
            <li><a href="#" class="booking">Book Now</a></li>
            <li><a href="login.php"class="login">Logout</a></li>
        </ul>
    </div>
    <div class="header-area">
        <div class="fade-header">
            <h1 class="booking-title">BOOKING</h1>
        </div>
    </div>
    <div class="booking-area">
        <div class="booking-container">
           
            <table class="booking-form">
                <form action="booking.php" method="POST">
                    <tr>
                        <td colspan="2" class="table-data"><span class="subtext">NAME:</span></td> 
                    </tr>

                    <tr>
                        <td class="table-data"><input type="text" name="firstName" id="firstName" placeholder="First Name" class="input"></td>
                        <td class="table-data"><input type="text" name="lastName" id="lastName" placeholder="Last Name" class="input"></td>
                    </tr>
                    <tr>
                        <td colspan="1" class="table-data"><span class="subtext">ADDRESS:</span></td> 
                        <td class="table-data"><span class="subtext">CONTACT NO.:</span></td> 
                    </tr>
                    <tr>
                        <td colspan="1" class="table-data"><input type="text" name="address" id="address" placeholder="Full Address" class="input"></td>
                        <td class="table-data"><input type="text" name="contact" id="contact" placeholder="Contact Number" class="input"></td>
                    </tr>
                    <tr>
                        <td class="table-data"><span class="subtext">ROOM TYPE:</span></td> 
                        <td class="table-data"><span class="subtext">NUMBER OF GUEST/S:</span></td> 
                    </tr>
                    <tr>
                        <td class="table-data">
                            <select name="roomclass" id="roomclass" class="roomclass" onchange="roomSelect(this.value)" >
                                <option hidden selected>Room Type</option>
                                <option value="standard">Classic</option>
                                <option value="classic">Deluxe</option>
                                <option value="superior">Premium</option>
                                <option value="deluxe">Exclusive</option>
                                <option value="executive">Ultimate</option>
                            </select>
                        </td>
                        <td class="table-data"><input type="number" name="guests" id="guests" placeholder="Number of Guests" class="input"></td>
                        
                    </tr>
                    <tr>

                        <td class="table-data"><span class="subtext">ROOM NUMBER:</span></td> 
                        <td class="table-data"><span class="subtext">ROOM PRICE:</span></td> 
                    </tr>
                    <tr>
                       
                        <td class="table-data">
                            <!-- <input type="text" name="roomNum" id="roomNum" placeholder="Room Number" class="input" > -->
                            <!-- <select name="roomclass" id="roomclass" class="roomclass" onchange="roomSelect(this.value)" >
                                <option hidden selected>Room Type</option>
                                <option value="standard">Standard</option>
                                <option value="classic">Classic</option>
                                <option value="superior">Superior</option>
                                <option value="deluxe">Deluxe</option>
                                <option value="executive">Executive</option>
                            </select> -->

                            <?php
                                
                                echo "<select name='roomNum' id='roomNum' class='roomNum' onchange='roomSelect(this.value)'>";
                                echo "<option hidden selected>Room Number</option>";
                                $con = mysqli_connect("localhost","root");
                                if(!$con){
                                    echo("Can't connect!");
                                }
                                $status = 'available';
                                mysqli_select_db($con,"hotelreservation");
                                $result = mysqli_query($con,"SELECT RoomNum FROM room_info where Status='$status'");
                                while($row = mysqli_fetch_array($result)){
                                    $num=$row['RoomNum'];
                                    echo "<option>$num</option>";
        
                                }
                                mysqli_close($con);
                                echo" </select>";
                            ?>
                        </td>
                        <td class="table-data"><input type="text" name="roomPrice" id="roomPrice" placeholder="Room Price" class="input" ></td> 
                    </tr>

                    <tr>
                        <td class="table-data"><span class="subtext">CHECK IN:</span></td> 
                        <td class="table-data"><span class="subtext" >CHECK OUT:</span></td> 
                    </tr>
                    
                    <tr>
                        <td class="table-data"><input type="date" name="checkIn" id="checkIn" placeholder="" class="input" onchange="calculateDate()"></td>
                        <td class="table-data"><input type="date" name="checkOut" id="checkOut" placeholder="" class="input" onchange="calculateDate()"></td>
                    </tr>

                    <tr>
                        
                        <td class="table-data"><span class="subtext">DOWNPAYMENT PRICE:</span></td>
                        <!-- <td colspan="1" class="table-data"><span class="subtext">CREDIT CARD NUMBER</span></td>      -->
                        <td class="table-data">
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
                        <td class="table-data" id="reserveButton" colspan="2">
                            <input type="submit" value="RESERVE" class="btn" name="btnSubmit">
                        </td> 
                     </tr>
                </form>
            </table>
        </div>
        
    </div>
    

    <?php
      if (isset($_POST['btnSubmit'])){
         
        $con = mysqli_connect("localhost","root");
        if(!$con){
            echo("Can't connect!");
        }
        
        mysqli_select_db($con,"hotelreservation");
        
        $roomPrice = $_POST['roomPrice'];
        $downPays  =  (int)$_POST['downPayment'];
        $totalPrice = $_POST['totalPrice'];
        $statusRoom = 'reserved';
        $roomNumber = $_POST['roomNum'];
        $sql = "INSERT INTO customer_Info(FName,LName,Cust_Address, ContactNo, RoomType, NumberOfGuest, RoomNum, RoomPrice, CheckIn, CheckOut, DownPayment, TotalPrice) VALUES ('$_POST[firstName]','$_POST[lastName]','$_POST[address]','$_POST[contact]','$_POST[roomclass]','$_POST[guests]','$_POST[roomNum]','$roomPrice','$_POST[checkIn]','$_POST[checkOut]','$downPays','$totalPrice')";
        mysqli_query($con,$sql);
        $sql2=   ("UPDATE room_info set Status='$statusRoom' where RoomNum='$roomNumber'");
        mysqli_query($con,$sql2);
        mysqli_close($con);
        echo '<script>alert("Reservation Sucessful!")</script>';      

        
      }
    ?>



    <script type="text/javascript">


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
</body>

</html>