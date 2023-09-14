<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        form {
            padding: 7%;
        }

        h2 {
            text-align: center;
        }

        table {
            width: 50%;
            background-color: #ada;
            margin: auto;
            padding: 1.5%;
        }

        .izq {
            text-align: right;
        }

        .der {
            text-align: left;
        }

        td {
            text-align: center;
            padding: 10px;
        }
    </style>
</head>

<body>
    
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        <h2>Introduce tus Credenciales:</h2>
        <table>
            <tr>
                <td class="izq">User:</td>
                <td class="der"><input type="text" name="login"></td>
            </tr>
            <tr>
                <td class="izq">Password:</td>
                <td class="der"><input type="password" name="password"></td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit" name="enviar" value="LOGIN"></td>
            </tr>
        </table>
    
        <?php 
        if (isset($sms)) {
            echo "<p style = 'text-align: center; color: red'><u><b> $sms </b></u></p>";
        } ?>
    
    </form>

</body>

</html>