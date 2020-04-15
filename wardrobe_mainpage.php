<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<link rel="stylesheet" type="text/css" href="styles.css">
  
<title>Wardrobe</title>
  
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

 
  <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

  
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
