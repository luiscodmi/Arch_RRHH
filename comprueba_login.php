<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
<?php
    if (isset($_POST["enviar"])) {
        try {
            $base = new PDO("mysql:host=localhost; dbname=Arch_RRHH", "root", "");
            $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sql = "SELECT * FROM usuarios_pass WHERE usuario= :login AND password= :password";

            $resultado = $base->prepare($sql);

            $login = htmlentities(addslashes($_POST["login"]));
            $password = htmlentities(addslashes($_POST["password"]));

            $resultado->bindValue(":login", $login);    
            $resultado->bindValue(":password", $password);
            
            $resultado->execute();

            $nu_record = $resultado->rowCount();
            
            if ($nu_record != 0) {
                session_start();
                $_SESSION["usuario"] = $_POST["password"];

                if ($_POST["login"] == "admin") {
                    header("Location:index.php");
                    die();
                } else {
                    header("Location:index2.php");
                    die();
                }

            } else {
                $sms = "-> Las credenciales están mal!!! <-";
                // echo $_POST["password"];
            }

        } catch (\Throwable $th) {
            die("Error: " . $th->getMessage());
        }
    }
?>
    <?php
    if (!isset($_SESSION["usuario"])) {
        include("login.php");
    }
    ?>

</body>
</html>