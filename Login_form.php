<?php 
session_start()
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Login</title>
</head>
<link rel="stylesheet" type="text/css" href="styles.css">
<body>
<?php
//database connection added 
$dbServerName="localhost";
$dbusername="root";
$dbpassword="";
$dbName="tfits";
$conn=mysqli_connect($dbServerName,$dbusername,$dbpassword,$dbName);

// If form submitted, insert values into the database.
$username= isset($_POST['username']) ? $_POST['username']:' ';
        // removes backslashes
$username = stripslashes($_POST['username']);
        //escapes special characters in a string
$password= isset($_POST['password']) ? $_POST['password']:' ';
$password = stripslashes($_POST['password']);
$password = mysqli_real_escape_string($conn,$password);
if ($conn->connect_error) {
       die("Connection failed: " . $conn->connect_error);
   }
   $sql="Select * from userInfo where userName='{$username}';";
   $result = mysqli_query($conn,$sql);
   $resultCheck=mysqli_num_rows($result);
   if ($resultCheck>0){
        while ($row=mysqli_fetch_assoc($result)){
                if ($row['userName']==$username and $row['password']==$password){
                        $_SESSION["usernum"]=$row['userId'];
                        header("Location: choice_form.html");
                }
        }
       }
       $_SESSION["username"]=$username;
?>
 <h3>Username/password is incorrect.</h3>
 <br/>Click here to <a href='registration.html'>Login</a>
</body>
</html>

