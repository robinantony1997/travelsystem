<?php
session_start();
$_SESSION['user_id'] = "";
$_SESSION = [];
session_unset();
header ("location:index.php");
?>