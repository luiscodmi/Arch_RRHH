<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>index</title>

    <style>
    table, th {
        border-top: 1px solid #111;
        border-bottom: 1px solid #111;
    }
    td {
        /* border-top: 1px solid #111; */
        border-bottom: 1px solid #111;
    }
    </style>
</head>

<body>
    <h5 style = "text-align:right"><a href="cerrar_sesion.php"> Cerrar Sesión </a></h5>

    <?php
    session_start();
    if (!isset($_SESSION["usuario"])) {
        header("Location:login.php");
    }
    
    echo "Bienvenido: " . "<b><u>" . $_SESSION["usuario"] . "</b></u>" . "; eres el puto amo! jejeje";
    
    ?>

    <br><br><br><br>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolore facilis itaque ullam odio iusto eligendi, iure a consectetur est debitis tempore totam quae! Itaque soluta aut at culpa voluptatibus numquam!</p>
    
    <?php 
    try {
        $base = new PDO("mysql:host=localhost; dbname=Arch_RRHH", "root", "");
        $base -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // $base -> exec("set character set utf8");

        $sql = "SELECT * FROM usuarios_pass";

        $resultado = $base -> prepare($sql);      
        $resultado -> execute(array());
        
        $a = $resultado->fetchAll(PDO::FETCH_ASSOC);
        ?>

        <table>
            <thead>
                <h4>Usuarios Registrados:</h4>
                <tr>
                    <th>Username</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($a as $user) {
                    ?>
                    <tr>
                        <td>
                            <?php echo $user["usuario"] ?>
                        </td>
                    </tr>
                    <?php
                }
                ?>
            </tbody>
        </table>
    
    <?php    
    } catch (\Throwable $th) {
        die("Error: " . $th -> getMessage());
    } finally {
        $base = null;
    }
    ?>

</body>
</html>

