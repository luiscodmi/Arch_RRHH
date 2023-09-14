<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Usuario</title>

    <style>
        td {
            text-align: right;
        }
    </style>

</head>
<body>    
    <form action="registrar_usuario.php" method = "POST"> <!--registrar_usuario , prueba_registro-->
        <table>
            <h2>Registrar Usuarios:</h2>
            <tr>
                <!-- <td>Nombre(s) y Apellidos: <input type="text" name = "na"> </td> -->
            </tr>
            <tr>
                <td>User: <input type="text" name="user"> </td>
            </tr>
            <tr>
                <td>Password: <input type="password" name="pass"> </td> 
            </tr>
            <td> <input type="submit" name = "registrar" value = "Registrar"> </td>            
        </table>
    </form>

<?php
$usuario=$_POST["user"];
$password=$_POST["pass"];

$cifrado = password_hash($password, PASSWORD_DEFAULT);  // , array("cost"=>12)

try {
    $base = new PDO("mysql:host=localhost; dbname=Arch_RRHH", "root", "");
    $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql="INSERT INTO usuarios_pass (usuario, password) VALUES (:user, :pass)";

    $resultado = $base->prepare($sql);
    $resultado->execute(array(":user"=>$usuario, ":pass"=>$cifrado));
    
    // echo $cifrado;
    echo "Registro de " . "<b>" . $usuario . "</b>" . " insetrado correctamente.";

} catch (\Throwable $th) {
    die("<p style = 'color: red'> Error: </p>" . $th->getMessage());
}

?>
    
</body>
</html>