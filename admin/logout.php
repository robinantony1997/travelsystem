<?php
session_start();
$_SESSION['admin'] = "";
$_SESSION = [];
session_unset();
header ("location:../adminLogin/index.html");
?>