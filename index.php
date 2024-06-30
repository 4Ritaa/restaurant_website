<?php
session_start();
//include('auth.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <style>
        <?php
include('main.css') ?>
    </style>

    
</head>
<body>
    <div class="form">
        <?php
        if(isset($_GET['username'])){
        ?>
        <p>Welcome <?php echo $_GET["username"];}?>!</p>
        <p>This is a secure area</p>
        <div class="form" action="" method="post">
            <h2>RESERVE A TABLE NOW</h2>
            <form name="tablereservation" action="reserve.php" method="post">
                First Name:
                <input type="text" name="Firstname" id="firstname" placeholder="First Name" required/>
                Last Name:
                <input type="text" name="Lastname" id="lastname" placeholder="Last Name" required/><br><br>
                Phone Number:
                <input type="phonenumber" name="PhoneNumber" id="phonenumber" placeholder="Phone Number" required/>
                Email:
                <input type="email" name="Email" id="email" placeholder="Email" required/><br><br>
                Date of reservation:
                <input type="date" name="ReservationDate" id="reservationdate">
                Time of reservation:
                <input type="time" name="ReservationTime" id="reservationtime" ><br><br>
                Number of guests:
                <select name="Guests" id="guests">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                    <option value="More than 10">More than 10</option>
                </select>
                Allergens:
                <input type="checkbox" name="Allergens" id="allergens"><br><br>
                Table preference:
                <select name="Tables" id="tables">
                    <option value="Indoor">Indoor</option>
                    <option value="Outdoor">Outdoor</option>
                    <option value="Booth">Booth</option>
                </select><br><br> 
                <input type="submit" name="submit" value="SUBMIT"/>
            </form>
            <br>
        </div>
        <a href="logout.php">Log Out</a>
    </div>      
</body>
</html>