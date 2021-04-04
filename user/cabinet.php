<?php
require_once "../db/db.php"
?>
<?php
if (isset($_SESSION['user'])):
?>
<p style="text-align: right;"><a href="../autoregister/logOut.php" style="color:hotpink;text-decoration:none;font-size:20px">logOut</a></p>
<p style="text-align: right;"><a href="../index.php" style="color:hotpink;text-decoration:none;font-size:20px">Main</a></p>
<hr>
<div style="font-size: 30px; margin-bottom: 2em">Ваш особистий кабінет</div>
<div style="color:red;">Стоянка</div>
<?php
$user = $_SESSION['user'];
$owner = mysqli_fetch_assoc(mysqli_query($app,"SELECT id,name FROM users WHERE login='$user'"));
$id = $owner['id'];
$car = mysqli_fetch_assoc(mysqli_query($app,"SELECT model,car_number,id FROM car WHERE owner = '$id'"));
$res = mysqli_query($app,"SELECT a.model,a.car_number,a.id,b.place,b.data_in,b.data_out FROM car as a,parking as b WHERE a.owner = '$id' AND a.id = b.car AND b.stated = '1'");
echo "<table>
<tr><th>id</th><th>car</th><th>model</th><th>place</th><th>data_in</th><th>data_out</th></tr>";
foreach ($res as $key => $value) {
    echo "<tr style=text-align:center><td>" . $value['id'] ."</td><td>" . $value['car_number'] ."</td><td>". $value['model'] ."<td>". $value['place'] ."</td><td>". $value['data_in'] ."</td><td>". $value['data_out'] ."</td></tr>";
}
echo "</table>";
?>
<?php
else:
?>
<?php
header("Location: ../index.php");
?>
<?php endif;?>