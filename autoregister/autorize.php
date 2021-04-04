<?php
require_once "../db/db.php"
?>
<?php
if (isset($_SESSION['user']) or isset($_SESSION['admin']))
{
    header("Location: ../index.php");
}
else
{
if (isset($_POST['on_auto']))
{
    $login = $_POST['login'];
    $password = $_POST['psw'];
    if (mysqli_fetch_row(mysqli_query($app,"SELECT id FROM users WHERE login='$login'")) > 0)
    {
        if ($password == '')
        {
            $errors[] = 'Enter password';
        }
        $psw = mysqli_fetch_assoc(mysqli_query($app,"SELECT password FROM users WHERE login='$login'"));
        if (password_verify($password,$psw['password']))
        {
            $_SESSION['user'] = $login;
            echo '<div style="color:green;">'."Ви авторизовані можете перейти на " . 
            '<a href=../index.php style="color:red; text-decoration:none">Головну сторінку</a>' .'</div><hr>';  
        }
        else
        {
            $errors[] = 'Password is false enter';
        }
    }
    else
    {
        $errors[] = 'Autorization false';
    }
    if (!empty($errors))
    {
        echo '<div style="color:red;">'.array_shift($errors) .'</div><hr>';   
    }
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form method="POST" style="margin:0 auto;width:250px">
    <p><p><strong>Введіть логін</strong></p>
    <input type="text" name="login" id="login" value="<?php if (isset($_POST['on_auto'])) {echo $_POST['login'];} else {}?>"></p>
    <p><p><strong>Введіть пароль</strong></p>
    <input type="password" name="psw" value="<?php if (isset($_POST['on_auto'])) {echo $_POST['psw'];} else {}?>"></p>
    <p><a href="register.php">Зареєструватися</a></p>
    <p><a href="../admin/autoregister/autorize.php">Ввійти як адмін</a></p>
    <input type="submit" name="on_auto">
</form>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="../jquery/jquery.maskedinput.min.js"></script>
<script src="../jquery/mask.js"></script>
</body>
</html>