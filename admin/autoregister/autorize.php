<?php
require_once "../../db/db.php"
?>
<?php
if (isset($_SESSION['admin']))
{
    header("Location: ../admin.php");
}
else
{
if (isset($_POST['on_auto']))
{
    $login = $_POST['login'];
    $password = $_POST['psw'];
    if (mysqli_fetch_row(mysqli_query($app,"SELECT id FROM `admins` WHERE login='$login'")) > 0)
    {
        if ($password == '')
        {
            $errors[] = 'Enter password';
        }
        $psw = mysqli_fetch_assoc(mysqli_query($app,"SELECT password FROM `admins` WHERE login='$login'"));
        if (password_verify($password,$psw['password']))
        {
            $_SESSION['admin'] = $login;
            echo '<div style="color:green;">'."Ви авторизовані можете перейти на " . 
            '<a href=../admin.php style="color:red; text-decoration:none">Головну сторінку</a>' .'</div><hr>';  
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
<form method="POST" style="margin:0 auto;width:250px">
    <p><p><strong>Введіть логін</strong></p>
    <input type="text" name="login" value="<?php if (isset($_POST['on_auto'])) {echo $_POST['login'];} else {}?>"></p>
    <p><p><strong>Введіть пароль</strong></p>
    <input type="password" name="psw" value="<?php if (isset($_POST['on_auto'])) {echo $_POST['psw'];} else {}?>"></p>
    <p><a href="../../autoregister/register.php">Ввійти як user</a></p>
    <input type="submit" name="on_auto">
</form>