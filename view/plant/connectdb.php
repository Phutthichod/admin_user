<?php
    $server="localhost";
    $user="root";
    $pass="";
    $db="admin_user";

    $con=new mysqli($server,$user,$pass,$db);

    if($con->connect_error){
        die("Connection failed: ".$con->connect_error);
    }
    $con->set_charset("utf8");

?>