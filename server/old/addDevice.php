
<?php 
  include_once "connect.php";
  $board_id = $id = $table_input=$gpio_board=$btnCreated="";
  $result = get_key_room($idp_key,$username);
  if($result){
      while($row = $result->fetch_assoc()){
          $board_id=$row["board_id"];
          $id = $row["id"];
      }
      $btnCreated .= ' <button type="button" class="btn btn-primary btn-lg btn-block" id="'.$id.'" onclick="return createDevice(this)">Create <i class="fas fa-long-arrow-alt-right text-white rounded"></i></button>';
  }

?>
<div class="p-2 rounded mx-auto bg-light shadow" id="refreshDivID" style="margin-top: -15px;">
    <div class="row m-1 p-3">
        <div class="col col-15 mx-auto">
          
            <div class="row bg-white rounded shadow-sm p-2  align-items-center justify-content-left">
            <div class="row m-1 p-1">
        <div class="col">
            <div class=" h1 text-primary text-left mx-auto display-inline-block">
                <h2><b>Add a new device </b> <i class="	fas fa-list-alt text-blue rounded"></i></h2>
            </div>
        </div>
    </div>
            </div>            
            </div>
    
    <?php 
        $table_input .='<input class="form-control form-control-lg border-0 bg-transparent rounded selectRoom" id="nameDevice" type="text" placeholder="Name device ..." required>
            <select class="form-control form-control-lg border-0 bg-transparent rounded selectRoom" id="statusDevice" name="statusDevice" type="text" required>
              <option value="0">0 = Off</option>
              <option value="1">1 = On</option>
            </select>
            <input class="form-control form-control-lg border-0 bg-transparent rounded selectRoom" id="boardDevice" name="boardDevice" value="'.$board_id.'" type="number"  placeholder="Board devices ..." required>
            <input class="form-control form-control-lg border-0 bg-transparent rounded selectRoom" id="gpioDevice" name="gpioDevice" type="number"  placeholder="GPIO ..." required>
            <input class="form-control form-control-lg border-0 bg-transparent rounded selectRoom" id="roomDevice" name="roomDevice" type="text"  placeholder="Room name ..." required>
            <input class="form-control form-control-lg border-0 bg-transparent rounded selectRoom" id="keyRoom" name="keyRoom" type="text" placeholder="Key room" required>
            <select class="form-control form-control-lg border-0 bg-transparent rounded selectRoom" id="kindDevice" name="kindDevice" type="number" required>
            <option value="#">Choose the kind of device ...</option>
            <option value="1">Toggles</option>
            <option value="2">Adjust</option>
            </select>';
    echo $table_input;
    ?>

  <?php echo $btnCreated; ?>
  </div>   
</div>

<script>
  function createDevice(element){
    var idp_key = <?php echo json_encode($idp_key) ?>;
    var username = <?php echo json_encode($username) ?>;
    var xhttp = new XMLHttpRequest();
    xhttp.open("POST", "action.php",true);
    xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhttp.onreadystatechange = function(){
      if (this.readyState === XMLHttpRequest.DONE && this.status===200){
        alert("A new device has been added");
        // setTimeout(function(){window.location.reload();});
      }
    }
    var nameDevice = document.getElementById("nameDevice").value;
    var statusDevice = document.getElementById("statusDevice").value;
    var boardDevice = document.getElementById("boardDevice").value;
    var gpioDevice = document.getElementById("gpioDevice").value;
    var roomDevice = document.getElementById("roomDevice").value;
    var keyRoom = document.getElementById("keyRoom").value;
    var kindDevice = document.getElementById("kindDevice").value;
    var httpRequestData = "action=create_device&nameDevice="+nameDevice+"&statusDevice="+statusDevice+"&boardDevice="+boardDevice+"&gpioDevice="+gpioDevice+"&roomDevice="+roomDevice+"&keyRoom="+keyRoom+"&kindDevice="+kindDevice+"&idp_key="+idp_key+"&username="+username;
    xhttp.send(httpRequestData);

  }
</script>