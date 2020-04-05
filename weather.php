<html>
    <body>
    <?php
    //database connection added 
include 'Login_form.php';
include 'databaseconnect.php';

$temperature= isset($_POST['temp']) ? $_POST['temp']:' ';
$temperature = stripslashes($_POST['temp']);
$temperature = mysqli_real_escape_string($conn,$username);

$activity= isset($_POST['act']) ? $_POST['act']:' ';
$activity = stripslashes($_POST['act']);
$activity = mysqli_real_escape_string($conn,$activity);

$weather= isset($_POST['weather']) ? $_POST['weather']:' ';
$weather = stripslashes($_POST['weather']);
$weather = mysqli_real_escape_string($conn,$weather);

$sql="Select * from wardrobe where userId=1 and season=`$weather` and acticity=`$activity`;";
    $result = mysqli_query($conn,$sql);
    $resultCheck=mysqli_num_rows($result);
    if ($resultCheck>0){
        
      echo "<table>
      <tr>
      <th> Types Of Clothes</th>
      <th> Size </th>
      <th> Brand </th>";
      
      echo"
      <tr>
        <td>".$row['clothesType']."</td>
        <td>".$row["size"]."</td>
        <td>".$row["brand"]."</td>
    </tr>";
      
      echo "</table>";
    }
mysqli_close($conn);
    ?>
</body>
</html>