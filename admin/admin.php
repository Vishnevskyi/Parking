<?php
require_once "../db/db.php"
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
$parking = mysqli_query($app,"SELECT b.car_number,b.model,b.owner,data_in,data_out,a.place,a.id FROM car as b,parking as a WHERE b.id = a.car AND a.stated = '1'");
echo "<table>
<tr><th>id</th><th>place</th><th>owner</th><th>model</th><th>number</th><th>data_in</th><th>data_out</th></tr>";
foreach ($parking as $key => $value) {
    echo "<tr style=text-align:center><td>". $value['id'] ."</td><td>" . $value['place'] ."</td><td>". $value['owner'] ."</td><td>" . $value['model'] ."</td><td>". $value['car_number'] ."</td><td>". $value['data_in'] ."</td><td>". $value['data_out'] ."</td></tr>";
}
echo "</table>";
?>
<form action="../functions/func.php" method="POST" enctype="multipart/form-data">
    <p><b><br>Parking:</br></b><input type="text" name='park'></p>
    <p><input type="submit" name="delete" value='delete'></p>
    <hr>
    <p>Place</p><input type="text" name="place">
    <p>Download</p>
    <input type="file" name="img_upload"><p><input type="submit" name="upload" value="updatePlace"></p>
    <hr>
    <p><b><br>Price:</br></b><input type="text" name='price'></p>
    </p>
    <input type="file" name="img_add"><p><input type="submit" name="add" value="add">
    <input type="submit" name="delete_image" value="delete">
    <hr>
</form>
<form action="excel.php" method="POST">
<input type="submit" name="export_excel_on_this_month" value="Звіт(за місяць)">
<input type="submit" name="export_excel_on_this_year" value="Звіт(за рік)">
</form>