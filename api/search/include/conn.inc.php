<?php
 $sname = "localhost";
 $dbuser = "root";
 $dbpass = "";
 $dbname = "inventory";

$conn = mysqli_connect($sname , $dbuser , $dbpass , $dbname);

// If Connection Failed
if (!$conn){
        
        die("Connection Failed ".mysqli_connect_error());
    }

 