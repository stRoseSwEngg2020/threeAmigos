<html>
<link rel="stylesheet" type="text/css" href="styles.css">
    <body>
    <?php
    //database connection added
$dbServerName="id13297166_wp_f211dbb09afa392a20eb201cb42fbbf3";
$dbusername="root";
$dbpassword="";
$dbName="tfits";
$conn=mysqli_connect($dbServerName,$dbusername,$dbpassword,$dbName);

$temperature= isset($_POST['temp']) ? $_POST['temp']:' ';
$temperature = stripslashes($_POST['temp']);
$temperature = mysqli_real_escape_string($conn,$temperature);

$activity= isset($_POST['act']) ? $_POST['act']:' ';
$activity = stripslashes($_POST['act']);
$activity = mysqli_real_escape_string($conn,$activity);

$weather= isset($_POST['weather']) ? $_POST['weather']:' ';
$weather = stripslashes($_POST['weather']);
$weather = mysqli_real_escape_string($conn,$weather);
echo $weather;
$sql="Select * from wardrobe WHERE userId=1 and activity='$activity' and Season='$weather';";
if(!mysqli_query($conn,$sql)){
  die("Unable to add data.");
}else{
  $result = mysqli_query($conn,$sql);
  $resultCheck=mysqli_num_rows($result);
    if ($resultCheck>0){
      $result = mysqli_query($conn,$sql);
    $resultCheck=mysqli_num_rows($result);

    if ($resultCheck>0){
      echo "The temperature is about $temperature \n";
      echo "We reccomend you to wear any of these outfits\n";
      echo "
      <table>
      <tr>
      <th> Types Of Clothes</th>
      <th> Size </th>
      <th> Brand </th>";
      while ($row=mysqli_fetch_assoc($result)){
         echo"<tr>
         <td>".$row['clothesType']."</td>
         <td>".$row['size']."</td>
         <td>".$row['Brand']."</td>
         </tr>";
         echo "</table>";

    }
  }
    }

}

mysqli_close($conn);
    ?>
</body>
</html>
