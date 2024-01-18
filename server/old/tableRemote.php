<?php
    $html_remote .='<center>
    <table style="width:100%">
    <tr>
        <td><h4>'.$row["nameDevice"].'</h4></td>
        <td><label class="switch"><input type="checkbox" onchange="updateDevices(this)" id="' . $row["id"] . '" ' . $button_checked . '><span class="slider"></span></label></td>
        <td><form><label class=""><input class="rangeInput" type="range" min="1" max="10" value="'.$row["valueDevice"].'" id="'.$row["id"].'a" oninput="getValues_device(this)"><span class=""></span></label></form></td>
        <td><a class="deleteDevice" onclick="deleteDevices(this)" href="javascript:void(0);" id="' . $row["id"] .'"><i class="fas fa-trash-alt recycle"></i></a></i></td>
    </tr>
    </table>
    </center>';    
?>