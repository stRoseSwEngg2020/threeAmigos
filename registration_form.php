<html>
<link rel="stylesheet" type="text/css" href="styles.css">
<?php
//database connection 
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
 $username = mysqli_real_escape_string($conn,$username);

$email= isset($_POST['email']) ? $_POST['email']:' ';
 $email = stripslashes($_POST['email']);
 
 $email = mysqli_real_escape_string($conn,$email);
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
                if ($row['email']==$email or $row['userName']==$username ){
                        echo('account exists');
                        echo("<p> Already registered <a href='LogIn.html'> Log In here </a></p>");
                break;
                }
                else if ($row['userName']==$username){
                        echo("username exists");
                        echo("<p> Already registered <a href='LogIn.html'> Log In here </a></p>");
                        echo("<p> Try a diffrent username <a href='registration.html'> Log In here </a></p>");
                break;
                }
                elseif ($row['email']==$email){
                        echo('Email exist');
                        echo("<p> Already registered <a href='LogIn.html'> Log In here </a></p>");
                        echo("<p> Try a diffrent email <a href='registration.html'> register here </a></p>");
                break;
                }
    
     }
}
     else{
        $sql="INSERT INTO userInfo(userId, userName, `password`,email,zipcode) VALUES (NULL,'{$username}','{$password}','{$email}',12084)";
        if(!mysqli_query($conn,$sql)){
          die("Unable to add data.");
        }else{
          echo "The username added";
          header("Location: LogIn.html");
        }

     }
     mysqli_close($conn);
     
   ?>
   </html>
 