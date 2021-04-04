<?php
require_once "../../db/db.php";
?>
<?php
if (isset($_SESSION['admin']))
{
    header("Location: ../admin.php");
}
else
{
if (isset($_POST['on_reg']))
{
    if (trim($_POST['login']) == '')
    {
        $error[] = 'Enter login';
    }
    $login = $_POST['login'];
    $sql = "SELECT * FROM `admins` WHERE login='$login'";
    $count = mysqli_fetch_row(mysqli_query($app,$sql));
    if ($count > 0)
    {
        $error[] = 'This login is used';
    }
    if (trim($_POST['name']) == '')
    {
        $error[] = 'Enter name';
    }
    if (trim($_POST['psw']) == '')
    {
        $error[] = 'Enter password';
    }
    if (trim($_POST['psw_r']) == '')
    {
        $error[] = 'Enter password';
    }
    if (trim($_POST['psw_r']) != $_POST['psw'])
    {
        $error[] = 'Password false';
    }
    if (empty($error))
    {
        $login = $_POST['login'];
        $name = $_POST['name'];
        $password = password_hash($_POST['psw'],PASSWORD_DEFAULT);
        $sql = "INSERT INTO `admins` (login,name,password)
                VALUES ('$login', '$name','$password')";
        $query = mysqli_query($app,$sql);
        header("Location: autorize.php");
    }
    else
    {
        echo '<div style="color:red;">'.array_shift($error) .'</div><hr>';
    }
}
}
?>
<form method="POST" style="margin:0 auto;width:250px">
    <p><p><strong>Введіть логін</strong></p>
    <input type="text" name="login" value="<?php if (!empty($_POST['on_reg'])) echo $_POST['login']?>"></p>
    <p><p><strong>Введіть ім'я</strong></p>
    <input type="text" name="name" value="<?php if (!empty($_POST['on_reg'])) echo $_POST['name']?>"></p>
    <p><p><strong>Введіть пароль</strong></p>
    <input type="password" name="psw" value="<?php if (!empty($_POST['on_reg'])) echo $_POST['psw']?>"></p>
    <p><p><strong>Повторіть пароль</strong></p>
    <input type="password" name="psw_r" value="<?php if (!empty($_POST['on_reg'])) echo $_POST['psw_r']?>"></p>
    <p><a href="autorize.php">Bхід</a></p>
    <p><input type="submit" name="on_reg"></p>
</form>