<?php
session_start();
session_destroy();
session_unset();
unset($_SESSION["admin"]);
$_SESSION = array();
// setcookie('nik', '', time() - 36000);
// setcookie('key', '', time() - 36000);

header("Location: ../../../application/views/login/login.php");
exit;
