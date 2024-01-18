<?php
 include_once "connect.php";
$idp_key=$username="";
    // session_start();
    if( !isset($_COOKIE["user"])){
      header("location: login.php");
    }
    $username = $_COOKIE["user"];
   
    $result = get_idp_key($username);
    if($result){
        while($row = $result->fetch_assoc()){
            $idp_key = $row["idp_key"];                  
        }
    }
    // var_dump($idp_key);
?>