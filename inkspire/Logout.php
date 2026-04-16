<?php
    session_name("inkspire_s");
    session_start();
    session_destroy();
    header("Location: https://127.0.0.1/inkspire/Login.php");
    exit();

?>