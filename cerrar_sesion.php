<?php
    session_start();

    session_destroy();

    header("location:comprueba_login.php");

?>