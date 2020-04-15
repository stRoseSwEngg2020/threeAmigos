<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<link rel="stylesheet" type="text/css" href="styles.css">
  <head>
    <meta charset="utf-8">

    <title>WardRobe</title>
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
    
     $userId=$_SESSION["usernum"];
     $sql="Select * from wardrobe where userId='$userId';";
    $result = mysqli_query($conn,$sql);
    $resultCheck=mysqli_num_rows($result);
    if ($resultCheck>0){
      echo "<table>
      <tr>
      <th> Types Of Clothes</th>
      <th> Size </th>";
      while ($row=mysqli_fetch_assoc($result)){
      echo"
      <tr>
        <td>".$row['clothesType']."</td>
        <td>".$row["size"]."</td>
        </tr>";
      }
      echo "</table>";
    }?>
  </body>
</html>
