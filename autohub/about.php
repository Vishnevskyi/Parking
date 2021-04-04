<?php
require_once "../db/db.php"
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
<p><a href="../admin/admin.php" style="color:hotpink; text-decoration:none">Admin</a></p>
</header>
<main class="wrap">
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
<p><a href="../user/cabinet.php" style="color:hotpink; text-decoration:none">Cabinet</a></p>
<p><a href="../autoregister/register.php" style="color:hotpink;text-decoration:none">Register</a></p>
<p><a href="../autoregister/autorize.php"style="color:hotpink;text-decoration:none">Autorize</a></p><hr>
</header>
<div style="text-align:center;font-size:35px;background-color:black;margin-bottom:1em"><a href="../index.php" style="margin-right:1em;color:red;text-decoration:none">Parking</a><a href="about.php"  style="color:red;text-decoration:none">About Us</a></div>
<main class="wrap">
</main>
</body>
</html>
<?php endif;?>
