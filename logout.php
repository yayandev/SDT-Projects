<?php
session_start();
$_SESSION = [];
session_unset();
session_destroy();

header("Location: landing_page/index.php");
exit;
