<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Registration</title>
<link rel="stylesheet" href="style.css">
<?php
include('main.css') ?>

</head>
<body>
<?php
//include('main.css');
// This script performs an INSERT query to add a record to the reservations table.
if ($_SERVER['REQUEST_METHOD'] =='POST') {
    //open database
    require('db.php');
    //Make query and reservation details
    $firstname ="firstname";
    $lastname="lastname";
    $phonenumber="phonenumber";
    $email="email";
    $rd="reservationdate";
    $rt="reservationtime";
    $guests="guests";
    $allergens="alergens";
    $tables="tables";
    //insert values into the database
    $firstname =$con->real_escape_string($_POST["firstname"]?? '');
    $lastname=$con->real_escape_string($_POST["lastname"]?? '');
    $phonenumber=$con->real_escape_string($_POST["phonenumber"]?? '');
    $email=$con->real_escape_string($_POST["email"]?? '');
    $rd=$con->real_escape_string($_POST["reservationdate"]?? '');
    $rt=$con->real_escape_string($_POST["reservationtime"]?? '');
    $guests=$con->real_escape_string($_POST["guests"]?? '');
    $allergens=$con->real_escape_string($_POST["alergens"]?? '');
    $tables=$con->real_escape_string($_POST["tables"]?? '');
    //


    $query="INSERT into `reservations`(firstname,lastname,phonenumber,email,date,time,guests,allergens,tables)VALUES
    ('$firstname','$lastname','$phonenumber','$email','$rd','$rt','$guests','$allergens','$tables')";
    $result=mysqli_query($con,$query);
    if($result){
    echo '<h2>Thank you!
    <br>
    Your request is now registered.
    <br>  
    <a href="index.php">Find logout</a></h2>';
}else{
    echo "ERROR:Sorry $query . " . mysqli_error($con);
}

mysqli_close($con);
}

?>
</body>
</html>