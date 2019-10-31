<?php
session_start();
$_SESSION = [];
session_unset();
session_destroy();

setcookie('nik', '', time() - 3600);
setcookie('key', '', time() - 3600);

header("Location: ../../../application/views/login/login.php");
exit;
