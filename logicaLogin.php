<?php
session_start();
  if(!empty($_POST) && isset($_POST)){
    $nombre="admin";
    $contraseña=123456;
    if($_POST["username"]==$nombre&&$contraseña==$_POST["password"]){
      $_SESSION["inicioSesion"]=true;
        header("Location: principal.php");
    }else{
      $_SESSION["inicioSesion"]=false;
        header("Location: index.php?mensaje=Usuario o contraseña invalidos");
    }
  }
?>