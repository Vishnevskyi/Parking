<?php
require_once "../db/db.php"
?>
<?php
if (isset($_POST['delete']))
{
   mysqli_query($app,"DELETE FROM car WHERE id IN (SELECT car FROM parking WHERE place = '{$_POST['park']}')");
   mysqli_query($app,"DELETE FROM parking WHERE place = '{$_POST['park']}'");  
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
    $app->query("INSERT INTO parkplace (image,place_id,price) VALUES ('$img','{$_POST['place']}','{$_POST['price']}')");
    header("Location: ../admin/admin.php");
}
if(isset($_POST['delete_image']))
{
    $app->query("DELETE FROM parkplace WHERE place_id='{$_POST['place']}'");
    header("Location: ../admin/admin.php");
}
?>

