<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Login</title>
</head>
<body>
<?php
//database connection added 
$dbServerName="localhost";
$dbusername="root";
$dbpassword="";
$dbName="tfits";
$conn=mysqli_connect($dbServerName,$dbusername,$dbpassword,$dbName);

// If form submitted, insert values into the database.
if (isset($_POST['username'])){
        // removes backslashes
 $username = stripslashes($_POST['username']);
        //escapes special characters in a string
 $username = mysqli_real_escape_string($conn,$username);
 $password = stripslashes($_POST['password']);
 $password = mysqli_real_escape_string($conn,$password);
 //Checking is user existing in the database or not
        $query = "SELECT * FROM userinfo WHERE userName='$username'
and password='".$password."'";
 $result = mysqli_query($conn,$query) or die(mysql_error());
 $rows = mysqli_num_rows($result);
        if($rows==1){
     $_SESSION['username'] = $username;
     //need to chage this after the page is made
     header("Location: wardrobe.html");
         }
       }
       else{
 echo "<div class='form'>
<h3>Username/password is incorrect.</h3>
<br/>Click here to <a href='login.php'>Login</a></div>";
         }
?>
</body>
</html>

