<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Login</title>
<link rel="stylesheet" href="style.css">
<style>
    <?php include('main.css'); ?>
</style>
</head>
<body>
    <!--header>
       <input type="checkbox" name="" id="toggler">
        <label for="toggler" class="fa fa-bars"></label>
        <a href="#" class="logo">RUBY'S<span>.</span></a>
        <nav class="navbar">
            <a href="index.html">Home</a>
            <a href="menu.html">Menu</a>
            <a href="reserve.html">Reserve</a>
            <a href="about.html">About</a>
        </nav>
       <div class="icons">
        <a href="reserve.html" class="fa fa-user"> </a>
        <a href="menu.html" class="fa fa-shopping-cart"></a>
       </div>
    </header-->
<?php
require('db.php');
if(isset($_POST['username'])){
    //removes backslashes
    $username=stripslashes($_REQUEST['username']);
    //escapes special chaacters in a string
    $username = mysqli_real_escape_string($con,$username);
	$password = stripslashes($_REQUEST['password']);
	$password = mysqli_real_escape_string($con,$password);
    //Checking is user existing in the database or not
    $query="SELECT * FROM `registration`where username='$username' and
    password='" . md5($password) . "'"; 
     $result = mysqli_query($con,$query) or die(mysqli_error($con));
     $rows = mysqli_num_rows($result);
     if($rows==1){
         $_SESSION['username'] = $username;
             // Redirect user to index.php
         header("Location: index.php");
         exit();
          }else{
     echo "<div class='form'>
 <h3>Username/password is incorrect.</h3>
 <br/>Click here to <a href='loginn.php'>Login</a></div>";
     }
}
else{
?>
<div class="form">
<h1>Log In</h1>
<form action="" method="post" name="login">
<input type="text" name="username" placeholder="Username" required /><br>
<input type="password" name="password" placeholder="Password" required /><br>
<input name="submit" type="submit" value="Login" />
</form>
<br>
<p>Not registered yet? <a href='reserve.html'>Register Here</a></p>
</div>
<?php } ?>
</body>
</html>