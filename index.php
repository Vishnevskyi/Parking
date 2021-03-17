<?php
require_once "db/db.php";
?>
<?php
if (isset($_SESSION['admin'])):?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>Document</title>
</head>
<body>
<header style="text-align: right">
<p><a href="admin/admin.php" style="color:hotpink; text-decoration:none">Admin</a></p>
<div style="background-color:black;text-align:center;font-size:35px;margin:10px 30px">
<a href="autoregister/autorize.php"style="color:red;text-decoration:none;margin-right:2em">Parking</a>
<a href="autohub/aboutUs.php"style="color:red;text-decoration:none">About Us</a>
</div>
</header>
<main class="wrap">
<?php
$query = mysqli_query($app,"SELECT a.place,b.place_id,b.image FROM parking as a,parkplace as b");
$count = mysqli_num_rows($query);
if (mysqli_query($app,"SELECT place_id,image FROM parkplace WHERE place_id IN(SELECT place FROM parking)"))
{
    $sale = mysqli_query($app,"SELECT place_id,image FROM parkplace WHERE place_id IN(SELECT place FROM parking)");
    while ($row = mysqli_fetch_assoc($sale)) {
        $image = base64_encode($row['image']);
        echo "<button style=background-color:red><a href=order/order.php style=font-size:50px;color:black;pointer-events:none;cursor:default> <img src=data:image/jpeg;base64,". $image ." style=width:500px>". $row['place_id'] ."</a></button>";
     }
}
if (mysqli_query($app,"SELECT place_id,image FROM parkplace WHERE place_id NOT IN(SELECT place FROM parking)") or $count == 0)
{
    $free = mysqli_query($app,"SELECT place_id,image FROM parkplace WHERE place_id NOT IN(SELECT place FROM parking)");
    while ($row = mysqli_fetch_assoc($free)) {
    $image = base64_encode($row['image']);
    echo "<button style=background-color:aqua><a href=order/order.php style=font-size:50px;color:black> <img src=data:image/jpeg;base64,". $image ." style=width:500px>". $row['place_id'] ."</a></button>";
 }
}
?>
</main>
</body>
</html>
<?php else:?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>Document</title>
</head>
<body>
<header style="text-align: right">
<p><a href="user/cabinet.php" style="color:hotpink; text-decoration:none">Cabinet</a></p>
<p><a href="autoregister/register.php" style="color:hotpink;text-decoration:none">Register</a></p>
<p><a href="autoregister/autorize.php"style="color:hotpink;text-decoration:none">Autorize</a></p><hr>
<div style="background-color:black;text-align:center;font-size:35px;margin:10px 30px">
<a href="autoregister/autorize.php"style="color:red;text-decoration:none;margin-right:2em">Parking</a>
<a href="autohub/aboutUs.php"style="color:red;text-decoration:none">About Us</a>
</div>
</header>
<main class="wrap">
<?php
$query = mysqli_query($app,"SELECT a.place,b.place_id,b.image FROM parking as a,parkplace as b");
$count = mysqli_num_rows($query);
if (mysqli_query($app,"SELECT place_id,image FROM parkplace WHERE place_id IN(SELECT place FROM parking)"))
{
    $sale = mysqli_query($app,"SELECT place_id,image FROM parkplace WHERE place_id IN(SELECT place FROM parking)");
    while ($row = mysqli_fetch_assoc($sale)) {
        $image = base64_encode($row['image']);
        echo "<button style=background-color:red><a href=order/order.php style=font-size:50px;color:black;pointer-events:none;cursor:default> <img src=data:image/jpeg;base64,". $image ." style=width:500px>". $row['place_id'] ."</a></button>";
     }
}
if (mysqli_query($app,"SELECT place_id,image FROM parkplace WHERE place_id NOT IN(SELECT place FROM parking)") or $count == 0)
{
    $free = mysqli_query($app,"SELECT place_id,image FROM parkplace WHERE place_id NOT IN(SELECT place FROM parking)");
    while ($row = mysqli_fetch_assoc($free)) {
    $image = base64_encode($row['image']);
    echo "<button style=background-color:aqua><a href=order/order.php style=font-size:50px;color:black> <img src=data:image/jpeg;base64,". $image ." style=width:500px>". $row['place_id'] ."</a></button>";
 }
}
?>
</main>
</body>
</html>
<?php endif;?>
