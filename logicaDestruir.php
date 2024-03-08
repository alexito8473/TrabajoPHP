<?php
if (!empty($_POST) && isset($_POST)) {
    unset($_SESSION["inicioSesion"]);
    session_destroy();
    header("Location: index.php");
}
?>