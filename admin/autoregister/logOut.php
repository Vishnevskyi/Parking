<?php
require_once "../../db/db.php"
?>
<?php
unset($_SESSION['admin']);
header("Location: autorize.php");
?>