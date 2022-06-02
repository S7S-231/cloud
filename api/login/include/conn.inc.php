<?php
 $sname = "localhost";
 $dbuser = "root";
 $dbpass = "";
 $dbname = "test";

$conn = mysqli_connect($sname , $dbuser , $dbpass , $dbname);

// If Connection Failed
if (!$conn){
        
        die("Connection Failed ".mysqli_connect_error());
    }

 