<?php
session_start();
$_SESSION = [];
session_unset();
session_destroy();

setcookie('id', '', time() - 600000);
setcookie('key', '', time() - 600000);

header("Location: login.php");
exit;
?>