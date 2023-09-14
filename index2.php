<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index2</title>
</head>
<body>
    <h5 style = "text-align:right"><a href="cerrar_sesion.php"> Cerrar Sesión </a></h5>

    <?php
    session_start();
    if (!isset($_SESSION["usuario"])) {
        header("Location:login.php");
    }

    ?>
    
    <?php echo "Bienvenido: " . $_SESSION["usuario"] . "; qué desea hacer???" ?>

    
</body>
</html>