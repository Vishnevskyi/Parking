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
$query = mysqli_query($app,"SELECT a.car_number,a.model,b.place,b.id FROM car as a,parking as b WHERE a.car_number = b.car AND a.owner IN(SELECT id FROM users WHERE login = '{$_SESSION['user']}')");
echo "<table>
<tr><th>id</th><th>car_number</th><th>model</th><th>place</th></tr>";
foreach ($query as $key => $value) {
    echo "<tr style=text-align:center><td>".$value['id'] ."</td><td>" . $value['car_number'] ."</td><td>" . $value['model'] ."</td><td>".$value['place'] ."</td>";
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