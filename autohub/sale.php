<?php
require_once "../db/db.php"
?>
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <title>Document</title>
</head>
<body>
<header style="text-align: right">
<p><a href="../user/cabinet.php" style="color:hotpink; text-decoration:none">Cabinet</a></p>
<p><a href="../autoregister/register.php" style="color:hotpink;text-decoration:none">Register</a></p>
<p><a href="../autoregister/autorize.php"style="color:hotpink;text-decoration:none">Autorize</a></p><hr>
</header>
<div style="text-align:center;font-size:35px;background-color:black;margin-bottom:1em"><a href="../index.php" style="margin-right:1em;color:red;text-decoration:none">Parking</a><a href="about.php"  style="color:red;text-decoration:none">About Us</a></div>
<main class="wrap">
<?php
if (mysqli_query($app,"SELECT distinct * FROM parkplace WHERE place_id IN(SELECT place FROM parking WHERE stated = '1')"))
{
$sale = mysqli_query($app,"SELECT distinct * FROM parkplace WHERE place_id IN(SELECT place FROM parking WHERE stated = '1')");
$sale = mysqli_query($app,"SELECT a.data_in,a.data_out,a.place,b.place_id,b.image,b.price FROM parking as a,parkplace as b WHERE stated = '1' AND a.place = b.place_id");
while ($row = mysqli_fetch_assoc($sale)) {
    $image = base64_encode($row['image']);
    echo "<button style=background-color:red;margin-bottom:2em><a href=../order/order.php style=font-size:50px;color:black> <img src=data:image/jpeg;base64,". $image ." style=width:500px>". $row['place_id'] ."</a><p style=color:orange>".$row['data_in'] ."</p><p style=color:orange>".$row['data_out'] ."</p><div style=font-size:25px;color:blue>".$row['price'] . '₴' ."</div></button>";
 }
}