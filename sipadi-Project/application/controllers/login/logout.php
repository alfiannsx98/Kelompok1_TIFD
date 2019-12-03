<?php
session_start();
$_SESSION = [];
session_unset();
session_destroy();

setcookie('nik', '', time() - 36000);
setcookie('key', '', time() - 36000);

header("Location: ../../../application/views/login/login.php");
exit;
