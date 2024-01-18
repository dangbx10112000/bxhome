<?php
    include_once "check_session.php";
?>
<style>
    .mainStatus{
        background-color: #F0F2F5;
    }
    .card{
        width: 20%;
        margin-left: 10%;
        margin-top: 20px;
        margin-bottom: 20px;
        float: left;
        padding: 10px;
        box-shadow: 5px 10px 18px #888888;
        border-radius: 5px;
        cursor: pointer;
    }
    .luxCard .tempCard{
        clear: left;
    }
    .deviceCard .gasCard{
        clear: right;
    }
    * {
      box-sizing: border-box;
    }
 
    .contentCard{
        background-color: lightskyblue;
        margin-top: 10px;
        padding: 5px;
        font-size: 2rem;
        border-radius: 5px;
        font-family: 'Advent Pro';
    }
    @media all and (min-width: 200px) and (max-width: 400px) {
        .card{
        width: 150px;
        margin-left:10px;
        margin-top: 10px;
        margin-bottom: 10px;
    }
        .contentCard{
        background-color: lightskyblue;
        margin-top: 10px;
        padding: 5px;
        font-size: 1.5rem;
        border-radius: 5px;
        font-family: 'Advent Pro';
    }
    }
</style>
<?php 
    $key_room = "";
    $result1=get_key_room($idp_key,$username);
    if($result1){
        while($row = $result1->fetch_assoc()){
            $key_room=$row["key_room"];
        }
    }
    $result=getStatus_update($key_room,$idp_key);
    $html_show_status = null;
    if ($result) {
        while ($row = $result->fetch_assoc()) {
            $html_show_status .='<div class="mainStatus" >
            <div class="card tempCard">
                <img src="image/temp.png" alt="">
                <div class="contentCard">Temp: '.$row["temp"].'<sup>o</sup>C</div>
            </div>
            <div class="card humdCard">
                <img src="image/humd.png" alt="">
                <div class="contentCard">Humd: '.$row["humd"].'%</div>
            </div>
            <div class="card gasCard">
                <img src="image/gas.png" alt="">
                <div class="contentCard">Gas: '.$row["gas"].'%</div>
            </div>
            <div class="card luxCard">
                <img src="image/lux.png" alt="">
                <div class="contentCard">Lux 1: '.$row["lux"].'cd</div>
            </div>
            <div class="card humanCard">
                <img src="image/human.png" alt="">
                <div class="contentCard">People: '.$row["people"].'</div>
            </div>
            <div class="card deviceCard">
                <img src="image/devices.png" alt="">
                <div class="contentCard">Devices: '.$row["device_connect"].'</div>
            </div>
        </div>';
        }   
            echo $html_show_status;     
    }
?>
