<?php
require_once "../db/db.php"
?>
<?php
if (isset($_POST['delete']))
{
   mysqli_query($app,"DELETE parking, car FROM parking INNER JOIN car
   WHERE parking.car=car.car_number AND parking.place = '{$_POST['park']}'");
   header("Location: ../admin/admin.php");
}
if(isset($_POST['upload']))
{
    if(!empty($_FILES['img_upload']['tmp_name'])) $img = addslashes(file_get_contents($_FILES['img_upload']['tmp_name']));
    $app->query("UPDATE parkplace SET image='$img' WHERE place_id='{$_POST['place']}'");
    header("Location: ../admin/admin.php");
}
if(isset($_POST['add']))
{
    if(!empty($_FILES['img_add']['tmp_name'])) $img = addslashes(file_get_contents($_FILES['img_add']['tmp_name']));
    $app->query("INSERT INTO parkplace (image,place_id) VALUES ('$img','{$_POST['place']}')");
    header("Location: ../admin/admin.php");
}
if(isset($_POST['delete_image']))
{
    $app->query("DELETE FROM parkplace WHERE place_id='{$_POST['place']}'");
    header("Location: ../admin/admin.php");
}
?>   