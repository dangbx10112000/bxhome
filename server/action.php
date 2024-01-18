<?php
    include_once "connect.php";  
   $action =$boardDevice_check = $update_command = $idp_key_check = $idp_key = $username = $id = $nameDevice =$boardDevice = $roomName = $link_image = $boardDevice1 = $gpioDevice1 =$add_questions = $add_link = $content_question = $statusDevice =$gpioDevice=$check_gpio = $roomDevice = $key_room = $kindDevice = $valueDevice = $device_number =$board_id = $gpio_board = $descriptions = $input_gpio = $output_gpio = $use_gpio = "";
//==================================METHOD = "POST"===================================================================//
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $use_gpio=2;
        $action = test_input($_POST["action"]);
        if($action == "create_device"){
            $nameDevice = test_input($_POST["nameDevice"]);
            $statusDevice = test_input($_POST["statusDevice"]);
            $boardDevice = test_input($_POST["boardDevice"]);
            $gpioDevice = test_input($_POST["gpioDevice"]);
            $roomDevice = test_input($_POST["roomDevice"]);
            $key_room = test_input($_POST["keyRoom"]);
            $kindDevice = test_input($_POST["kindDevice"]);
            $idp_key = test_input($_POST["idp_key"]);
            $result1= getStatus_update($key_room,$idp_key);
            if($result1){
                while ($row = $result1->fetch_assoc()) {
                $device_number=$row["device_connect"];
                $device_number=$device_number+1;
                }
            }
            $result2 = update_status_gpio($gpioDevice,$boardDevice,$use_gpio,$idp_key);
            $result = createDevices($nameDevice, $statusDevice, $boardDevice, $gpioDevice, $roomDevice, $key_room, $kindDevice,$device_number,$idp_key);
            echo $result;    
        }
        else if($action=="create_questions"){
            $add_questions = test_input($_POST["add_questions"]);
            $add_link = test_input($_POST["add_link"]);
            $content_question = test_input($_POST["content_question"]);
            $result = addQuestions($add_questions,$add_link,$content_question);
            echo $result;
        }
    }
//===============================METHOD = "GET"=========================================================================//
    if($_SERVER["REQUEST_METHOD"] == "GET"){
        $action = test_input($_GET["action"]);
        if($action == "get_data_json"){
            $boardDevice_check = test_input($_GET["boardDevice"]);
            $idp_key_check = test_input($_GET["idp_key"]);
            $result1 = get_update_command($idp_key_check);
            if($result1){
                while($row = $result1 -> fetch_assoc()){
                    $update_command = $row["update_command"];
                }
            }
            if($update_command == NULL){
                $result = getDataJson($boardDevice_check,$idp_key_check);
                if ($result) {
                    while ($row = $result->fetch_assoc()) {
                        $rows[$row["gpioDevice"]] = $row["statusDevice"];
                    }
                }
            }
            else if($update_command == "111020"){
                $rows["111020"] = "1";
            }
            else if($update_command == "161020"){
                $rows["111020"] = "2";
            }
            echo json_encode($rows);
            clear_command_OTA($idp_key_check);
        }
        else if($action == "get_update_command"){
            $update_command = $_GET["update_command"];
            $idp_key = $_GET["idp_key"];
            $result = update_command_OTA($update_command,$idp_key);
            echo $result;
        }
        else if($action == "update_status"){
            $id = test_input($_GET["id"]);
            $statusDevice = test_input($_GET["statusDevice"]);
            $idp_key = test_input($_GET["idp_key"]);
            $result = update_status($id,$statusDevice,$idp_key);
            echo $result;
        }
        else if($action == "delete_device"){
            $use_gpio=1;
            $boardDevice1 = test_input($_GET["boardDevice"]);
            $gpioDevice1 = test_input($_GET["gpioDevice"]);
            $key_room = test_input($_GET["key_room"]);
            $idp_key = test_input($_GET["idp_key"]);
            $result4 = get_keyRoom_device($gpioDevice1,$boardDevice1,$idp_key);
            if($result4){
                while($row=$result4 -> fetch_assoc()){
                    $key_room = $row["key_room"];
                }
                $result3= update_status_gpio($gpioDevice1,$boardDevice1,$use_gpio,$idp_key);
                $result1= getStatus_update($key_room,$idp_key);
                if($result1){
                while ($row = $result1->fetch_assoc()) {
                $device_number=$row["device_connect"];
                $device_number=$device_number-1;
                }
            }
            $result = delete_device($gpioDevice1,$boardDevice1,$device_number,$key_room,$idp_key);
            }
            echo $result;
        }
        else if($action == "delete_gpio"){
            $id = test_input($_GET["id"]);
            $idp_key = test_input($_GET["idp_key"]);
            $result = delete_gpio($id,$idp_key);
            echo $result;
        }
        else if($action == "show_list_device"){
            $key_room = test_input($_GET["key_room"]);
            $idp_key = test_input($_GET["idp_key"]);
            $username = test_input($_GET["username"]);
            $result = send_key_room($key_room,$idp_key,$username);
            echo $result;
        }
        else if($action == "show_list_gpio"){
            $board_id = test_input($_GET["board_id"]);
            $idp_key = test_input($_GET["idp_key"]);
            $username = test_input($_GET["username"]);
            $result = send_board_id($board_id,$idp_key,$username);
            echo $result;
        }
        else if($action == "add_board"){
            $board_id = test_input($_GET["board_id"]);
            $idp_key = test_input($_GET["idp_key"]);
            $username = test_input($_GET["username"]);
            $result = send_board_id($board_id,$idp_key,$username);
            echo $result;
        }
        else if($action == "add_gpio"){
            $gpio_board = test_input($_GET["gpioDevice"]);
            $descriptions = test_input($_GET["descriptions"]);
            $input_gpio = test_input($_GET["input_gpio"]);
            $output_gpio = test_input($_GET["output_gpio"]);
            $use_gpio = test_input($_GET["use_gpio"]);
            $board_id = test_input($_GET["board_id"]);
            $idp_key = test_input($_GET["idp_key"]);
            $username = test_input($_GET["username"]);
            $result = update_new_board($gpio_board,$descriptions,$input_gpio,$output_gpio,$use_gpio,$board_id,$idp_key);
            echo $result; 
        }
        else if($action == "add_room"){
            $roomName = test_input($_GET["roomName"]);
            $key_room = test_input($_GET["key_room"]);
            $link_image = test_input($_GET["link_image"]);
            $idp_key = test_input($_GET["idp_key"]);
            $username = test_input($_GET["username"]);
            $result = add_new_room($key_room,$idp_key,$link_image,$roomName);
            echo $result;
        }
        else if($action == "delete_room"){
            $id = test_input($_GET["id"]);
            $idp_key = test_input($_GET["idp_key"]);
            $result = delete_room($id,$idp_key);
            echo $result;
        }
        else if($action == "come_room"){
            $key_room = test_input($_GET["id"]);
            $idp_key = test_input($_GET["idp_key"]);
            $username = test_input($_GET["username"]);
            send_key_room($key_room,$idp_key,$username);
        }
    }
//=====================================TEST INPUT=======================================================================//
?>