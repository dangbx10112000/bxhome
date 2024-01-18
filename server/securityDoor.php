<?php
    include_once "connect.php";
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
        <div class="contentTitle h1 text-primary text-center mx-auto display-inline-block"><h2>Door controler</h2></div>
        
        </div>
    <div class="col-lg contentOTA">
        <div class="contentTitle h1 text-primary text-center mx-auto display-inline-block"><h2></h2></div>
        
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
</script>