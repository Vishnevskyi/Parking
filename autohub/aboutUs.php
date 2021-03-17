<?php 
require_once "../db/db.php"
?>
<?php
if (isset($_SESSION['admin'])):
?>
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
<p><a href="../admin/admin.php" style="color:hotpink; text-decoration:none">Admin</a></p>
<div style="background-color:black;text-align:center;font-size:35px;margin:10px 30px">
<a href="../index.php"style="color:red;text-decoration:none;margin-right:2em">Parking</a>
<a href="aboutUs.php"style="color:red;text-decoration:none">About Us</a>
</div>
</header>
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
<a href="../index.php"style="color:red;text-decoration:none;margin-right:2em">Parking</a>
<a href="aboutUs.php"style="color:red;text-decoration:none">About Us</a>
</div>
</header>
<?php endif;?>