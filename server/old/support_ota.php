<?php
    include_once "connect.php";
    include_once "check_session.php";
    $status_firmware = $wifi_name = $show_boardID = $board_id = $versions_new = $status_show =$board_id=$version_now=$versions_show=$descript_new_ver=$key_room_board=$room_name_board="";
    $result=get_info_new_firmware();
    if($result){
        while($row = $result-> fetch_assoc()){
           $status_firmware = $row["status_OTA"];
           $versions_new = $row["versions"];
           $descript_new_ver = $row["descript_new_ver"];
        }
    }
    $result1 = get_key_room($idp_key,$username);
    if($result1){
        while($row = $result1->fetch_assoc()){
            $board_id=$row["board_id"];
            $show_boardID .='<input type="text" class="form-control" placeholder="..." value="'.$board_id.'" name="check_info_ver" id="check_info_ver">';
        }
    }
    if($status_firmware == "available"){
        $status_show .='<button type="button" class="btn btn-success" >avaliable</button>';
    }
    else{$status_show .='<button type="button" class="btn btn-danger ">not avaliable</button>';}
    
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $board_id = $_POST["check_info_ver"];
        $result2=get_info_current_version($idp_key,$board_id);
        if($result2){
            while($row = $result2 ->fetch_assoc()){
                $version_now = $row["version_now"];
                $key_room_board = $row["key_room"];
                $wifi_name = $row["wifi_name"];
            }
            if($key_room_board){
                $result3 = check_room_name($key_room_board,$idp_key);
                if($result3){
                    while($row = $result3 -> fetch_assoc()){
                        $room_name_board = $row["roomName"];
                    }
                }
            }
        }
    }
    if($versions_new == $version_now){
        $versions_show .='<button type="button" class="btn btn-secondary" >updated</button>';
    }
    else{
        $versions_show .='<button type="button" class="btn btn-danger " >new</button>';
    }
?>
<style>
    .contentTitle{
        text-align: center;
    }
    .contentOTA{
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        margin: 20px;
        border-radius: 10px;
        padding: 5px;
    }
    .image{
        border-radius: 10px;
    }
.ellipsis {

  word-wrap: break-word;
  width: 100px;
}
.btn_ota{
    text-align: center;
}
</style>
<div class="row">
  <div class="col-lg contentOTA">
        <div class="contentTitle h1 text-primary text-center mx-auto display-inline-block"><h2>Update new version</h2></div>
        <div class="row m-1">
        <div class="col-3 m-2 p-2"><img src="image/ota.png" class="image img-fluid active" alt=""></div>
        <div class="col-6 m-2 p-2 ellipsis"><h5>Descript about update:</h5>
            <p><?php echo $descript_new_ver; ?></p>
        </div>        
            <div class="col-12 m-2 p-2 ">
                <h4>Status: <?php echo $status_show; ?></h4>
                <h4>version: <?php echo $versions_new; echo $versions_show;?></h4>
                <form action="" method="post">
                <div class="input-group mb-3">
                    <div class="input-group-append">
                        <span class="input-group-text">Board id:</span>
                    </div>
                    <?php echo $show_boardID; ?>
                    <button class="btn btn-primary"  type="submit" name="submit" onclick="check_main_board(this)">Check</button><br>
                </div>
                </form>
                <h5>Current version: <?php echo $version_now; ?></h5>
                <div class="btn_ota">
                <button type="button" class="btn btn-warning" onclick="update_a_main_board(this)">Update now</button>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg contentOTA">
        <div class="contentTitle h1 text-primary text-center mx-auto display-inline-block"><h2>Reset box</h2></div>
        <div class="row m-1">
        <div class="col-3 m-2 p-2"><img src="image/box.png" class="image img-fluid active" alt=""></div>
        <div class="col-6 m-2 p-2 ellipsis">
            <h5>Wifi connected:<?php echo $wifi_name; ?></h5>
            <h5>Room: <?php echo $room_name_board; ?></h5>
            <h5>Board ID: <?php echo $board_id; ?></h5>
            <h5>IDP key: <?php echo $idp_key; ?></h5>
        </div>        
            <div class="col-12 m-2 p-2 ">
                <form action="" method="post">
                <div class="input-group mb-3">
                    <div class="input-group-append">
                        <span class="input-group-text">Board id:</span>
                    </div>
                    <?php echo $show_boardID; ?>
                    <button class="btn btn-primary"  type="submit" name="submit" onclick="check_main_board(this)">Check</button><br>
                </div>
                </form>
                <div class="btn_ota">
                <button type="button" class="btn btn-danger" onclick="Reset_a_main_board(this)">Reset now</button>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function check_main_board(e){
        var board_id = document.getElementById('check_info_ver').value;
        var idp_key = <?php echo json_encode($idp_key); ?>; 
        var username = <?php echo json_encode($username); ?>;
        var xhttp = new XMLHttpRequest();
        xhttp.open("GET","action.php?action=show_list_gpio&board_id="+board_id+"&idp_key="+idp_key+"&username="+username,true);
        xhttp.send();
        location.reload();
        return false;
    }
    function update_a_main_board(e){
        var idp_key = <?php echo json_encode($idp_key); ?>;
        var username = <?php echo json_encode($username); ?>;
        var xhttp = new XMLHttpRequest();
        xhttp.open("GET","action.php?action=get_update_command&update_command=111020&idp_key="+idp_key+"&username="+username,true);
        xhttp.send();
        location.reload();
        return false;
    }
    function Reset_a_main_board(e){
        var idp_key = <?php echo json_encode($idp_key); ?>;
        var username = <?php echo json_encode($username); ?>;
        var xhttp = new XMLHttpRequest();
        xhttp.open("GET","action.php?action=get_update_command&update_command=161020&idp_key="+idp_key+"&username="+username,true);
        xhttp.send();
        location.reload();
        return false;
    }
</script>