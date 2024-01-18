<?php 
// $idp_key_check= $key_room_check=$temp=$humd=$gas=$lux=$people=$version_now=$boardDevice="";
require_once 'connect.php';
    $idp_key_check = $_POST['idpkey'];
    $key_room_check = $_POST['keyroom'];
    $boardDevice = $_POST['boardDevice'];
    $ssid_check = $_POST['ssid'];
    $version_now = $_POST['version_now'];
    $temp     = $_POST['temp'];
    $humd     = $_POST['humd'];
    $gas      = $_POST['gas'];
    $lux      = $_POST['lux'];
    $people   = $_POST['people'];
    update_status_to_server($temp,$humd,$gas,$lux,$people,$key_room_check,$idp_key_check);
    update_current_version_info_on_ESP32($idp_key_check,$boardDevice,$version_now,$key_room_check,$ssid_check);
?>