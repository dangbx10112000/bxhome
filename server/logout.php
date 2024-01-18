<?php
    session_start ();
    session_unset ();
    session_destroy ();
    setcookie('user','',time() - 30*24*60*60,'/');
    header("location:login.php");
?>