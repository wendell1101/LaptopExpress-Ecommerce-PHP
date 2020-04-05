<?php
    session_start();
    if(isset($_GET['register'])){
        $_SESSION['display_register'] = 'registerform';
    }
    if(isset($_GET['login'])){
        $_SESSION['display_login'] = 'loginform';
    }
    header('location:../login.php');
    exit();

?>