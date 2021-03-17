<?php
$app = mysqli_connect('localhost','root','','autoparking');
session_start();
mysqli_query($app,"DELETE parking, car FROM parking INNER JOIN car
WHERE parking.car=car.car_number AND parking.data_out < now() - interval 1 hour");
?>

