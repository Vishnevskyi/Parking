<?php
$app = mysqli_connect('localhost','root','','autohub');
session_start();
mysqli_query($app,"UPDATE parking SET stated = '0' WHERE data_out < now() - interval 1 day");
?>
