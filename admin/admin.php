<?php
require_once "../db/db.php";
?>
<?php
if (!isset($_SESSION['admin']))
{
    header("Location: autorize.php");
}
?>
<p style="text-align: right;"><a href="autoregister/logOut.php" style="color:hotpink;text-decoration:none;font-size:20px">logOut</a></p>
<p style="text-align: right;"><a href="../index.php" style="color:hotpink;text-decoration:none;font-size:20px">Main</a></p>
<hr>
<div style="color:red;">Стоянка</div>
<?php
$parking = mysqli_query($app,"SELECT b.data_in,b.data_out,b.place,b.id,b.car,a.model,a.owner FROM parking as b,car as a WHERE a.car_number = b.car");
echo "<table>
<tr>
    <th>id</th><th>place</th><th>car_number</th><th>model</th><th>owner</th><th>data_in</th><th>data_out</th>
</tr>";
foreach ($parking as $key => $value) {
    echo "<tr style=text-align:center><td>".$value['id'] ."</td><td>".$value['place'] ."</td><td>".$value['car'] ."</td><td>".$value['model'] ."</td><td>".$value['owner'] ."</td><td>".$value['data_in'] ."</td><td>".$value['data_out'] ."</td></tr>";
}
echo "</table>";
?>
<form action="../functions/func.php" method="POST" enctype="multipart/form-data">
    <p><b><br>Place:</br></b><input type="text" name='park'></p>
    <p><input type="submit" name="delete" value='delete'></p>
    <hr>
    <p>Id</p><input type="text" name="place">
    <p>Download</p>
    <input type="file" name="img_upload"><p><input type="submit" name="upload" value="updatePlace"></p>
    <hr>
    <input type="file" name="img_add"><p><input type="submit" name="add" value="add"></p>
    <hr>
    <input type="submit" name="delete_image" value="delete">
</form>
