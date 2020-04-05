//created the data base in mysql.
<!DOCTYPE html>
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
echo "Connected successfully";

$clothesType=$_POST['cType'];

$size=$_POST['size'];

$activity=$_POST['act'];

$season=$_POST['season'];

$sql="INSERT INTO wardrobe(userId, clothesId, clothesType, size, activity, Season) VALUES (1,3,'$clothesType','$size','$activity','$season');";
mysqli_query($conn,$sql);


?>
</body>
</html>
