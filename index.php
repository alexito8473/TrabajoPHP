<?php
session_start();
if(isset($_SESSION["inicioSesion"])){
    if($_SESSION["inicioSesion"]){
        header("Location: principal.php");
    }
}else{
    $_SESSION["inicioSesion"]=false;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Proyect 007</title>
</head>
<body>
    <div class="background">
        <div class="shape"></div>
        <div class="shape"></div>
    </div>
    <form method="post" action="logicaLogin.php">
        <h3>Inicio de sesión</h3> <label for="username">Usuario</label> <input type="text" placeholder="nombre"
            name="username" required> <label for="password">Contraseña</label> <input type="password" placeholder="contraseña"
            name="password" required> <button>Iniciar sesión</button>
            <?php
    if(!empty($_GET) && isset($_GET)){
        echo "<div class=\"error\">";
        echo $_GET["mensaje"];
        echo "</div>";
    }
    ?>
    </form>
</body>
</html>