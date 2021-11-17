<?php
session_start();
$_SESSION['adminLogin']='';
header('location:login.php');
?>