<?php

if (isset($_POST["subb"])){
    $email = $_POST["emaill"];
    $pass = $_POST["pssswd"];

    require_once 'conn.inc.php';
    require_once 'functions.inc.php';
     
    if (emptyiplogin($pass, $email  ) !== false){
        header("location: ../index.php?error=emptyinput");
        exit();
    }

    loginuser($conn , $email , $pass);
}