<?php
$usuario=$_POST["user"];
$password=$_POST["pass"];

$cifrado = password_hash($password, PASSWORD_DEFAULT);

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