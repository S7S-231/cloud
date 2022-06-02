<?php

function emptyip ($name , $email , $pwd , $r ) {

    $res = false;
    
    if(empty($name) || empty($email) || empty($pwd) || empty($r) ){

        $res = true ;

    }
    
    return $res ;

}


function invalidemail($email) {

    $res = false;
    
    if (!filter_var($email , FILTER_VALIDATE_EMAIL)) {

        $res = true ;

    }
    
    return $res ;

}

function pwdmat($pwd , $r) {

    $res = false;
    
    if (filter_var($pwd !== $r)) {

        $res = true ;

    }
    
    return $res ;

}

function uidExist($name ,$email ,$conn ) {
    $sql = "Select * From acc WHERE email=? OR user=?  ";
    $stmt = mysqli_stmt_init($conn);
    
    if (!mysqli_stmt_prepare($stmt,$sql)){

        header("location: ../index.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt , "ss" , $name ,$email);
    mysqli_stmt_execute($stmt);

    $resdata = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resdata) ){

        return $row ;

    }
    else {
        $res = false;
        return $res ;
    }
    mysqli_stmt_close($stmt);
}
function createUser($conn , $name ,$email , $pwd ) {
    $sql = "INSERT INTO acc (email ,user ,pass ) VALUES (? ,? ,?)";
    $stmt = mysqli_stmt_init($conn);
    
    if (!mysqli_stmt_prepare($stmt,$sql)){

        header("location: ../index.php?error=stmtfailed");
        exit();
    }
    $hash = password_hash($pwd , PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt , "sss" , $name ,$email , $hash);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../index.php?error=none");
        exit();
}

function emptyiplogin($pass, $email ){
    $res = false;
    
    if(empty($pass) || empty($email)  ){

        $res = true ;

    }
    
    return $res ;

}
function  loginuser($conn , $email , $pass){

    $emailE = uidExist($email  ,$email ,$conn );
    if ($emailE == false ){
        header("location: ../index.php?error=wronglogin");
        exit();
    }
    $hash = $emailE["pass"];
    $checkpass = password_verify($pass , $hash);
    
    if($checkpass == false) {

        header("location: ../index.php?error=wronglogin");
        exit();
    }

    else if ($checkpass == true ){
        session_start();
        $_SESSION["id"] = $emailE["id"];
        $_SESSION["user"] = $emailE["name"];
        header("location: ../index.php");
        exit();
    }

}