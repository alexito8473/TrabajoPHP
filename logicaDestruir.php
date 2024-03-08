<?php
session_start();
$_SESSION["inicioSesion"]=false;
header("Location: index.php");
?>