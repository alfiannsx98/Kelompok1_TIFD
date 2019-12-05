<?php
session_start();
$_SESSION = [];
session_unset($_SESSION["login_pembeli"] = true);
session_destroy();
setcookie('nik', '', time() - 36000);
setcookie('key', '', time() - 36000);

header("Location: ../../views/sipadi/");
exit;
