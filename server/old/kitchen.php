<?php
include_once "check_session.php";
    include_once "header.php";
    $key_room= 3;
    send_key_room($key_room,$idp_key,$username);
    include_once "inRoom.php";
?>
