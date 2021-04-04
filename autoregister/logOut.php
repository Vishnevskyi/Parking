<?php
require_once "../db/db.php"
?>
<?php
unset($_SESSION['user']);
header("Location: autorize.php");
?>