<?php 
  include_once "check_session.php";
  $board_id = $table_input=$id=$username1=$btnGetBoard=$idp_key1=$listRoom="";
  $result = get_key_room($idp_key,$username);

  if($result){
      while($row = $result->fetch_assoc()){
          $board_id=$row["board_id"];
          $id= $row["id"];
      }

      // var_dump($id);
  }
  $result1 = get_room_info($idp_key);
// var_dump($idp_key);var_dump($username);
?>
<style>
  .deleteDevice a{
    color: darkgrey;
    text-align: center;
    justify-content: center;
}
.deleteDevice a:hover{
    color: red;
}
.deleteDevice {
      transition: transform .2s;
    }
.recycle:hover {
      -ms-transform: scale(1.9); /* IE 9 */
      -webkit-transform: scale(1.9); /* Safari 3-8 */
      transform: scale(1.9);
      color: lightsalmon;
    }
.recycle {
    color: darkgrey;
        font-size: 2rem;
    }
</style>
<div class="p-2 rounded mx-auto bg-light shadow" id="refreshDivID" style="margin-top: -15px;">
    <!-- App title section -->
    
    <!-- Create todo section -->
    <div class="row m-1 p-3">
        <div class="col col-15 mx-auto">
          
            <div class="row bg-white rounded shadow-sm p-2  align-items-center justify-content-left">
            <div class="row m-1 p-1">
        <div class="col">
            <div class=" h1 text-primary text-left mx-auto display-inline-block">
                <h2><b>Create new room </b> <i class="fas fa-th-large text-blue rounded"></i></h2>
            </div>
        </div>
    </div>                  
            </div>            
            </div>
    
    <?php 
        $table_input .='<input class="form-control form-control-lg border-0 bg-transparent rounded selectRoom" id="roomName" type="text" placeholder="Room name ..." required>
            <input class="form-control form-control-lg border-0 bg-transparent rounded selectRoom" id="key_room" type="number"  placeholder="key_room ..." required>
            <input class="form-control form-control-lg border-0 bg-transparent rounded selectRoom" id="link_image" type="url"  placeholder="URL image ..." required>';
        
    echo $table_input;
    ?>
  <button type="button" class="btn btn-primary btn-lg btn-block" onclick="add_room(this)">Create <i class='fas fa-long-arrow-alt-right text-white rounded'></i></button>
  </div>   
</div>
<div class="p-2 rounded mx-auto bg-light shadow" id="refreshDivID" style="margin-top: 30px;">
    <!-- App title section -->
    
    <!-- Create todo section -->
    <div class="row m-1 p-3">
        <div class="col col-15 mx-auto">
          
            <div class="row bg-white rounded shadow-sm p-2  align-items-center">
            <div class="row m-1 p-1">
        <div class="col">
            <div class=" h1 text-primary text-left mx-auto display-inline-block">
                <h2><b>Room list</b> <i class="fas fa-door-open text-blue rounded "></i></h2>
            </div>
        </div>
    </div>       
            </div>
            <div class="table-responsive-sm">   
            <table class="table table-hover justify-content-center">
    <thead>
      <tr>
        <th>Room name</th>
        <th>Room ID</th>
        <th>Devices connected</th>
        <th>Delete</th>
      </tr>
    </thead>
    <?php 
      if($result1){
        while($row = $result1 -> fetch_assoc()){
          $listRoom .= '<tbody>
                        <tr>
                          <td>'.$row["roomName"].'</td>
                          <td>'.$row["key_room"].'</td>
                          <td>'.$row["device_connect"].'</td>
                          <td class="deleteDeviceTable"><a class="deleteDevice" onclick="deleteroom(this)" href="javascript:void(0);" id="' . $row["id"] .'"><i class="fas fa-trash-alt recycle"></i></a></i></td>
                        </tr>
                      </tbody>';
        }
        echo $listRoom;
      }
    ?>
  </table>
  </div>   
</div>
    </div>
<script>
  function add_room(e){
    var idp_key = <?php echo json_encode($idp_key) ?>; 
    var username = <?php echo json_encode($username) ?>;
    var roomName = document.getElementById('roomName').value;
    var key_room = document.getElementById('key_room').value;
    var link_image = document.getElementById('link_image').value;
    alert("Created successful!")
    var xhttp = new XMLHttpRequest();
    xhttp.open("GET","action.php?action=add_room&roomName="+roomName+"&key_room="+key_room+"&link_image="+link_image+"&idp_key="+idp_key+"&username="+username,true);
    xhttp.send();
    location.reload();
    return false;
  }
  function deleteroom(element){
    var idp_key = <?php echo json_encode($idp_key); ?>;// alert(element.id);
    var result = confirm("This room will be removed from the database!\nAre you sure you want to delete it?");
    if(result){
        var xhttp = new XMLHttpRequest();
        xhttp.open("GET","action.php?action=delete_room&id="+element.id+"&idp_key="+idp_key, true);
        xhttp.send();
        alert("This gpio has been deleted");
        setTimeout(function(){window.location.reload();});
    }
  }
</script>