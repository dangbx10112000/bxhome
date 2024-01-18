<?php
    $server = "localhost";
    $usernameDB = "root";
    $passwordDB = "";
    $database = "user";
    $connect = new mysqli($server,$usernameDB,$passwordDB,$database);
    if ($connect ->connect_error) {
        die("Connection failded! :".$connect->connect_error);
    }
?>