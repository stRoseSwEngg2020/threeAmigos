//created the data base in mysql.
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
$clothesType=$_POST["ctype"];
$size=$_POST["size"];
$activity=$_POST["act"];
$season=$_POST["season"];
$sql="INSERT INTO wardrobe(userId, clothesId, clothesType, size, activity, Season) VALUES (1,2,$clothesType,$size,$activity,$season);";
mysqli_query($conn,$sql);
?>
