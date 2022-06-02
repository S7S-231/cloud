<?php

if (isset($_POST["sub"])){
   $name = $_POST["txt"];
   $email = $_POST["email"];
   $pwd = $_POST["pswd"];
   $r = $_POST["rpswd"];
   
   require_once 'conn.inc.php'; 
   require_once 'functions.inc.php';

    if (emptyip($name , $email , $pwd , $r ) !== false){
        header("location: ../index.php?error=emptyinput");
        exit();
    }
    
    
    if (invalidemail($email) !== false){
        header("location: ../index.php?error=invalideamil");
        exit();
    }
    if (pwdmat($pwd , $r ) !== false){
        header("location: ../index.php?error=passwordnotmatch");
        exit();
    }
    if (uidExist($name ,$email , $conn ) !== false){
        header("location: ../index.php?error=usernametaken");
        exit();
    }

    createUser($conn , $name ,$email , $pwd );

}
else {
    header("location: ../index.php");
}