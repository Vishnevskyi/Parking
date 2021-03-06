<?php
require_once "../db/db.php"
?>
<?php 
if (!isset($_SESSION['user']))
{
    header("Location: ../autoregister/autorize.php");
}
else
{
if (isset($_POST['on_add']))
{
    
    if (trim($_POST['car']) == '')
    {   
        $error[] = 'Enter car-number';
    }
    if (trim($_POST['id']) == '')
    {   
        $error[] = 'Enter number-place';
    }
    if (trim($_POST['model']) == '')
    {   
        $error[] = 'Enter car-model';
    }
    if ($_POST['in'] < date('Y-m-d') or $_POST['out'] <= date('Y-m-d') or $_POST['in'] > $_POST['out'])
    {
        $error[] = 'Incorect date';
    }
    if (mysqli_fetch_row(mysqli_query($app,"SELECT place FROM parking WHERE place = '{$_POST['id']}' AND stated = '1'")))
    {
        $in = date('Y-m-d',strtotime($_POST['in']));
        $out = date('Y-m-d',strtotime($_POST['out'])); 
        $used = mysqli_num_rows(mysqli_query($app,"SELECT place from parking where place = '{$_POST['id']}' AND ('$in' between data_in and data_out OR '$out' between data_in and data_out)"));
        if ($used > 0)
            {
            $error[] = 'This place is is used on this day'; 
         }
    }
    if (empty($error))
    { 
        $in = date('Y-m-d',strtotime($_POST['in']));
        $out = date('Y-m-d',strtotime($_POST['out']));
        $owner = mysqli_fetch_assoc(mysqli_query($app,"SELECT id FROM users WHERE login='{$_SESSION['user']}'"));
        $car = mysqli_num_rows(mysqli_query($app,"SELECT id FROM car WHERE car_number = '{$_POST['car']}' AND owner = '{$owner['id']}'"));
        if ($car > 0)
        {
            $car_id = mysqli_fetch_assoc(mysqli_query($app,"SELECT id FROM car WHERE owner = '{$owner['id']}' AND car_number = '{$_POST['car']}'"));
            $res = mysqli_query($app,"INSERT INTO parking (car,place,data_in,data_out,stated) VALUES ('{$car_id['id']}','{$_POST['id']}','{$_POST['in']}','{$_POST['out']}','1')");
            if ($res)
            {
            echo '<div style="color:green;">'.'Замовлення прийнятто' .'</div><hr>';
            }
            else
            {
                echo $app->error;
            }     
        }
        else
        {
            mysqli_query($app,"INSERT INTO car (car_number,model,owner) VALUES ('{$_POST['car']}','{$_POST['model']}','{$owner['id']}')");
            $car_id = mysqli_fetch_assoc(mysqli_query($app,"SELECT id FROM car WHERE owner = '{$owner['id']}' AND car_number = '{$_POST['car']}'"));
            $res = mysqli_query($app,"INSERT INTO parking (car,place,data_in,data_out,stated) VALUES ('{$car_id['id']}','{$_POST['id']}','{$_POST['in']}','{$_POST['out']}','1')");
            if ($res)
            {
            echo '<div style="color:green;">'.'Замовлення прийнятто' .'</div><hr>';
            }
            else
            {
                echo $app->error;
            }
        }
    }
    else
    {
        echo '<div style="color:red;">'.array_shift($error) .'</div><hr>';
    }
}
}
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
<p><a href=../user/cabinet.php>Cabinet</a></p>
<p><a href=../autoregister/register.php>Register</a></p>
<p><a href=../autoregister/autorize.php>Autorize</a></p><hr>
</header>
<main class="wrap">
<form method="POST">
<p>Введіть номер місця:</p>
<p><input type="text" name="id" value="<?php if (!empty($_POST['on_add'])) echo $_POST['id']?>"></p>
<p>Введіть номер автомобіля:</p>
<p><input type="text" name="car" id="car" value="<?php if (!empty($_POST['on_add'])) echo $_POST['car']?>"></p>
<p>Введіть марку автомобіля:</p>
<p><input type="text" name="model" value="<?php if (!empty($_POST['on_add'])) echo $_POST['model']?>"></p>
<p>Введіть дату ймовірного заїзду:</p>
<p><input type="date" name="in" value="<?php echo date('Y-m-d');?>"></p>
<p>Введіть дату ймовірного виїзду:</p>
<p><input type="date" name="out" value="<?php echo date('Y-m-d');?>"></p>
<p style="text-align: center"><input type="submit" name='on_add' value="Замовити"></p>
</form>
</main>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="../jquery/jquery.maskedinput.min.js"></script>
<script src="../jquery/mask.js"></script>
</body>
</html>