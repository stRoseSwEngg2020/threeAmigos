<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="styles.css">
    <title>WardRobe</title>
  </head>
  <body>
     <?php
     $dbServerName="id13297166_wp_f211dbb09afa392a20eb201cb42fbbf3";
     $dbusername="root";
     $dbpassword="";
     $dbName="tfits";
     $conn=mysqli_connect($dbServerName,$dbusername,$dbpassword,$dbName);
     if ($conn->connect_error) {
         die("Connection failed: " . $conn->connect_error);
     }
     $sql="Select * from wardrobe;";
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
