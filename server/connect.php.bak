<?php
    $server = "localhost";
    $usernameDB = "id16722723_root";
    $passwordDB = "D@nggD@ngg1234";
    $database = "id16722723_user";
//=====================================Kind of devices================================================================//
function kind_device($kind,$key_room,$idp_key){
    //    $sql = "SELECT id, nameDevice, statusDevice, boardDevice, gpioDevice, roomDevice, kindDevice, valueDevice FROM datajson_bxhome WHERE key_room = '".$key_room."'";
        $result=getAllOutputs($key_room,$idp_key);
        $html_remote = null;
        if ($result) {
            while ($row = $result->fetch_assoc()) {
                if ($row["statusDevice"] == "1"){
                    $button_checked = "checked";
                }
                else {
                    $button_checked = "";
                }
                if($row["kindDevice"] == $kind && $kind == 1){
                    $html_remote .='<center>
                    <table class="table table-borderless" style="width:100%;"><hr style="height:5px">
                      <tr class="showControl">
                        <td class="nameDeviceTable"><h4 class="nameDevices">'.$row["nameDevice"].'</h4></td>
                        <td class="btnDeviceTable"><label class="switch"><input type="checkbox" onchange="updateDevices(this)" id="' . $row["id"] . '" ' . $button_checked . '><span class="slider"></span></label></td>
                        <td class="rangeDeviceTable"></td>
                      </tr>
                    </table>
                    </center>';
                }
                else if($row["kindDevice"] == $kind && $kind == 2)
                {        
                    $html_remote .='<center>
                    <table class="table table-borderless" style="width:100%;"><hr style="height:5px">
                    <tr  class="showControl">
                        <td class="nameDeviceTable"><h4 class="nameDevices">'.$row["nameDevice"].'</h4></td>
                        <td class="rangeDeviceTable"><form><label class=""><input class="rangeInput sliderRang" type="range" min="0" max="100" value="'.$row["statusDevice"].'" step="5" id="'.$row["id"].'" name="'.$row["id"].'" oninput="getValues_device(this)"></label></form></td>
                    </tr>
                    </table>
                    </center>';
                }
            }   
                echo $html_remote;
                 
        }
    }
  //===================================================================================================================================//
  
  function connectResult($sql) {
    global $server, $usernameDB, $passwordDB,$database;
        $connect = new mysqli($server, $usernameDB, $passwordDB,$database);
        if($connect->connect_error){
            die("Connection failed:".$connect->connect_error);
        }
        if($result = $connect->query($sql)){
            return $result;
        }
        else{
            return false;
        }
        $connect->close();
    }
    function connectNoResult($sql){
        global $server, $usernameDB, $passwordDB,$database;
        $connect = new mysqli($server, $usernameDB, $passwordDB,$database);
        if($connect->connect_error){
            die("Connection failed:".$connect->connect_error);
        }
        mysqli_query($connect, $sql);
        $connect->close();
    }
//==========================================================ESP32====================================================================//

  function getDataJson($boardDevice_check,$idp_key_check){
      $sql = "SELECT statusDevice, gpioDevice FROM datajson_bxhome WHERE boardDevice = '".$boardDevice_check."' AND idp_key = '".$idp_key_check."'";
      $result = connectResult($sql);
      return $result;
  }

  function update_status_to_server($temp,$humd,$gas,$lux,$people,$key_room_check,$idp_key_check){
    $sql = "UPDATE update_status_bxhome SET temp ='".$temp."',humd = '".$humd."',gas = '".$gas."',lux = '".$lux."',people = '".$people."' WHERE key_room='".$key_room_check."' AND idp_key = '".$idp_key_check."'";
    connectNoResult($sql);
  }
  function update_current_version_info_on_ESP32($idp_key_check,$boardDevice,$version_now,$key_room_check,$ssid_check){
    $sql = "UPDATE esp32_board SET version_now = '".$version_now."', key_room = '".$key_room_check."', wifi_name = '".$ssid_check."' WHERE board_id='".$boardDevice."' AND idp_key = '".$idp_key_check."'";
    connectNoResult($sql);
  }
//===========================================================OTA UPDATE==============================================================//
  function update_new_firmware($version_firmware,$status_firmware,$descript_new_ver){
      $sql = "UPDATE update_ota SET status_OTA = '".$status_firmware."', versions = '".$version_firmware."', descript_new_ver = '".$descript_new_ver."' WHERE id = '1'";
      connectNoResult($sql);
  }
  function get_info_new_firmware(){
        $sql = "SELECT status_OTA, versions,descript_new_ver FROM update_ota WHERE id = '1'";
        $result = connectResult($sql);
        return $result;
  }
  function get_info_current_version($idp_key,$board_id){
      $sql = "SELECT version_now, key_room, wifi_name FROM esp32_board WHERE board_id = '".$board_id."' AND idp_key = '".$idp_key."'";
      $result = connectResult($sql);
      return $result;
  }
  function update_command_OTA($update_command,$idp_key){
    $sql = "UPDATE user_bxhome SET update_command = '".$update_command."' WHERE idp_key = '".$idp_key."'";
    connectNoResult($sql);
  }
  function clear_command_OTA($idp_key){
    $sql = "UPDATE user_bxhome SET update_command = NULL WHERE idp_key = '".$idp_key."'";
    connectNoResult($sql);
  }
  function get_update_command($idp_key){
    $sql = "SELECT update_command FROM user_bxhome WHERE idp_key = '".$idp_key."'";
    $result = connectResult($sql);
    return $result;
  }
  function check_room_name($key_room_board,$idp_key){
      $sql = "SELECT roomName FROM update_status_bxhome WHERE key_room = '".$key_room_board."' AND idp_key = '".$idp_key."'";
      $result = connectResult($sql);
      return $result;
  }
//===================================================================================================================================//
  function get_idp_key($username){
    $sql = "SELECT idp_key FROM user_bxhome WHERE username = '".$username."'";
    $result = connectResult($sql);
    return $result;
  } 
  function getAllOutputs($key_room,$idp_key){
        $sql = "SELECT id, nameDevice, statusDevice, boardDevice, gpioDevice, roomDevice, kindDevice, valueDevice FROM datajson_bxhome WHERE key_room = '".$key_room."' AND idp_key = '".$idp_key."'";
        $result=connectResult($sql);
        return $result;
    }
    function getStatus_update($key_room,$idp_key){
        $sql = "SELECT temp,humd,gas,lux,people,device_connect FROM update_status_bxhome WHERE key_room='".$key_room."' AND idp_key='".$idp_key."'";
        $result = connectResult($sql);
        return $result;
    }
    function createDevices($nameDevice, $statusDevice, $boardDevice, $gpioDevice, $roomDevice, $key_room, $kindDevice,$device_number,$idp_key){
        $sql = "INSERT INTO datajson_bxhome (nameDevice,statusDevice,boardDevice,gpioDevice,roomDevice,key_room,kindDevice,idp_key) VALUES ('".$nameDevice."','".$statusDevice."','".$boardDevice."','".$gpioDevice."','".$roomDevice."','".$key_room."','".$kindDevice."','".$idp_key."')";
        connectNoResult($sql);
        update_device_number($device_number,$key_room,$idp_key);
    }

    function update_status($id,$statusDevice,$idp_key){
        $sql = "UPDATE datajson_bxhome SET statusDevice ='".$statusDevice."' WHERE id='".$id."' AND idp_key= '".$idp_key."'";
        connectNoResult($sql);
    }

    function delete_device($gpioDevice1,$boardDevice1,$device_number,$key_room,$idp_key){
        $sql = "DELETE FROM datajson_bxhome WHERE gpioDevice='".$gpioDevice1."' AND boardDevice='".$boardDevice1."' AND idp_key= '".$idp_key."'";
        connectNoResult($sql);
        update_device_number($device_number,$key_room,$idp_key);
    }

    function delete_gpio($id,$idp_key){
        $sql = "DELETE FROM esp32_board WHERE id='".$id."' AND idp_key='".$idp_key."'";
        connectNoResult($sql);
    }

    // function value_update($id,$valueDevice,$idp_key){
    //     $sql = "UPDATE datajson_bxhome SET valueDevice ='".$valueDevice."' WHERE id='".$id."' AND idp_key = '".$idp_key."'";
    //     connectNoResult($sql);
    // }
    function update_device_number($device_number,$key_room,$idp_key){
        $sql = "UPDATE update_status_bxhome SET device_connect ='".$device_number."' WHERE key_room='".$key_room."' AND idp_key = '".$idp_key."'";
        connectNoResult($sql);
    }
    //================================================Database key_set=====================================================================
    function send_key_room($key_room,$idp_key,$username){
        $sql = "UPDATE user_bxhome SET key_room ='".$key_room."' WHERE idp_key='".$idp_key."' AND username = '".$username."'";
        connectNoResult($sql);
    }
    function get_key_room($idp_key,$username){
        $sql = "SELECT id,username,idp_key,key_room,board_id,gpio_number FROM user_bxhome WHERE idp_key='".$idp_key."' AND username = '".$username."'";
        $result = connectResult($sql);
        return $result;
    }
    
    function send_board_id($board_id,$idp_key,$username){
        $sql = "UPDATE user_bxhome SET board_id ='".$board_id."' WHERE idp_key='".$idp_key."' AND username = '".$username."'";
        connectNoResult($sql);
    }
    function send_gpio_number($gpio_number,$idp_key,$username){
        $sql = "UPDATE user_bxhome SET gpio_number ='".$gpio_number."' WHERE idp_key='".$idp_key."' AND username = '".$username."'";
        connectNoResult($sql);
    }

    function insert_room_name($idp_key){
        $sql = "SELECT roomDevice FROM datajson_bxhnome";
        $result = connectResult($sql);
        return $result;
    }

    function get_list_gpio($board_id,$idp_key){
        $sql = "SELECT id,gpioDevice,descriptions,input_gpio,output_gpio,use_gpio FROM esp32_board WHERE board_id='".$board_id."' AND idp_key='".$idp_key."'";
        $result = connectResult($sql);
        return $result;
    }
    function update_new_board($gpio_board,$descriptions,$input_gpio,$output_gpio,$use_gpio,$board_id,$idp_key){
        $sql = "INSERT INTO esp32_board (gpioDevice,descriptions,input_gpio,output_gpio,use_gpio,board_id,idp_key) VALUES ('".$gpio_board."','".$descriptions."','".$input_gpio."','".$output_gpio."','".$use_gpio."','".$board_id."','".$idp_key."')";
        connectNoResult($sql);
    }

    function update_status_gpio($gpioDevice,$boardDevice,$use_gpio,$idp_key){
        $sql = "UPDATE esp32_board SET use_gpio ='".$use_gpio."' WHERE gpioDevice='".$gpioDevice."' AND board_id='".$boardDevice."' AND idp_key='".$idp_key."'";
        connectNoResult($sql);
    }

    function addQuestions($add_questions,$add_link,$content_question){
        $sql = "INSERT INTO questions (add_questions,add_link,content_question) VALUES ('".$add_questions."','".$add_link."','".$content_question."')";
        connectNoResult($sql);
    }
    function get_questions(){
        $sql = "SELECT id,add_questions,add_link,content_question FROM questions";
        $result = connectResult($sql);
        return $result;
    }
    function get_keyRoom_device($gpioDevice1,$boardDevice1,$idp_key){
        $sql = "SELECT key_room FROM datajson_bxhome WHERE gpioDevice = '".$gpioDevice1."' AND boardDevice = '".$boardDevice1."' AND idp_key='".$idp_key."'";
        $result = connectResult($sql);
        return $result;
    }
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    function add_new_room($key_room,$idpkey,$link_image,$roomName){
        $sql = "INSERT INTO update_status_bxhome(key_room,idp_key,link_image,roomName) VALUES ('".$key_room."','".$idpkey."','".$link_image."','".$roomName."')";
        connectNoResult($sql);
    }
    function get_room_info($idp_key){
        $sql = "SELECT id,key_room,device_connect,link_image,roomName FROM update_status_bxhome WHERE idp_key = '".$idp_key."'";
        $result = connectResult($sql);
        return $result;
    }
    function delete_room($id,$idp_key){
        $sql = "DELETE FROM update_status_bxhome WHERE id='".$id."' AND idp_key ='".$idp_key."'";
        connectNoResult($sql);
    }
    ?>