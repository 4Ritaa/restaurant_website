<?php
session_start();
//include('auth.php');
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Registration</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
<?php
require('db.php');
//If form is submitted,insert values into the database.
if (isset($_REQUEST['username'])){
    //remove backlashes
    $username=stripslashes($_REQUEST['username']);
    //escapes special characters in a string
    $username=mysqli_real_escape_string($con,$username);
    $email=stripslashes($_REQUEST['email']);
    $email=mysqli_real_escape_string($con,$email);
    $password=stripslashes($_REQUEST['password']);
    $password=mysqli_real_escape_string($con,$password);
    $trn_date=date("Y-m-d H:i:s");
    $query="INSERT into `registration`(username,email,password,trn_date) VALUES
    ('$username', '$email', '".md5($password)."', '$trn_date')";
     $result=mysqli_query($con,$query);
     if($result){
         echo 
         "<h3>You are registered successfully</h3><br>
        Click here to <a href='loginn.php'>Login</a>";
    }else{
        echo "ERROR:Sorry $query . " . mysqli_error($con);
    }
    mysqli_close($con);
}
?>
</body>
</html>