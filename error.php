<!doctype html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="err.css">

    <title>Document</title>

</head>
<body>
<div class="error-container">
    <h1>
        <?php echo $_GET['tipoError']; ?>
    </h1>
    <a href="<?php echo $_GET['destino']; ?>">Volver</a>
</div>
</body>
</html>
<?php
