<?php
session_start();
?>
<!DOCTYPE html>
<link rel="stylesheet" type="text/css" href="styles.css">
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
<?php
$dbServerName="localhost";
$dbusername="root";
$dbpassword="";
$dbName="tfits";
$conn=mysqli_connect($dbServerName,$dbusername,$dbpassword,$dbName);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$clothesType= isset($_POST['cType']) ? $_POST['cType']:' ';
$brand= isset($_POST['brand']) ? $_POST['brand']:' ';
$size= isset($_POST['size']) ? $_POST['size']:' ';
$activity= isset($_POST['activity']) ? $_POST['activity']:' ';
$season= isset($_POST['season']) ? $_POST['season']:' ';
$userId=$_SESSION["usernum"];
$sql="INSERT INTO wardrobe(userId, clothesId, clothesType, Brand, size, activity, Season) VALUES ('{$userId}',NULL,'{$clothesType}','{$brand}','{$size}','{$activity}','{$season}')";
if(!mysqli_query($conn,$sql)){
  die("Unable to add data.");
}else{
  header("Location: wardrobe_mainpage.php");
}

 mysqli_close($conn);
?>
</body>
</html>
