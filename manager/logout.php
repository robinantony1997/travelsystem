<?php
session_start();
$_SESSION['manager_id'] = "";
$_SESSION = [];
session_unset();
header ("location:../manager/login/");
?>