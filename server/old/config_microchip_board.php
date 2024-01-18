<?php 

  include_once "connect.php";
  $key_room = $board_id = $id = $btnSearchGpio = $listGpio = $check_input = $check_yes = $show_input = $show_output = $check_no = $check_output = $use_gpio=$status_gpio_available = $status_gpio_dissable=$status_row=$status_show=$status_gpio_used="";
  $result1 = get_key_room($idp_key,$username);
  if($result1){
    while($row=$result1->fetch_assoc()){
      $board_id=$row["board_id"];
      $key_room = $row["key_room"];
     // var_dump($key_room);
     $id = $row["id"];
     
    }
    $btnSearchGpio .= '<button type="button" class="btn btn-primary btnShearch" id="'.$id.'" onclick="show_list_gpio(this)"><i class="fas fa-search"></i> Search</button>';
  }

  $result = get_list_gpio($board_id,$idp_key);
  $status_gpio_available .='<div><button type="button" class="btn btn-success" >enabled</button></div>';
  $status_gpio_dissable .='<div><button type="button" class="btn btn-danger">disabled</button></div>';
  $status_gpio_used .='<div><button type="button" class="btn btn-primary">working</button></div>';
  $check_yes .='<div><i class="fas fa-check-circle" style="color:green;"></i></button></div>';
  $check_no .='<div><i class="fas fa-times-circle"style="color:red;"></i></button></div>';
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
<div class="p-2 rounded mx-auto bg-light shadow" id="refreshDivID1" style="margin-top: -15px;">
    <!-- App title section -->
   
    <!-- Create todo section -->
    <div class="row m-1 p-3">
        <div class="col col-15 mx-auto">
          
            <div class="row bg-white rounded shadow-sm p-2  align-items-center justify-content-center">
            <div class="row m-1 p-1">
        <div class="col">
            <div class=" h1 text-primary text-center mx-auto display-inline-block">
                <h2><b>Main board</b> <i class="	fab fa-steam-square text-blue rounded"></i></h2>
            </div>
        </div>
    </div>
                <div class="col">
                    <input class="form-control form-control-lg border-0 bg-transparent rounded selectRoom" id="search_board" type="search" placeholder="Searching by board id ...">
                    </div>
                <div class="col-auto px-0 mx-0 mr-2">
                  <?php echo $btnSearchGpio; ?>
                </div>
            </div>            
            </div>

            <div class="table-responsive" >   
            <table class="table table-hover justify-content-center">
    <thead>
      <tr>
        <th>GPIO</th>
        <th>Description</th>
        <th>Input</th>
        <th>Output</th>
        <th>Status</th>
        <th>Delete</th>
      </tr>
    </thead>
    <?php 
      if($result){
        while($row = $result -> fetch_assoc()){
          $status_row = $row["use_gpio"];
          $check_input = $row["input_gpio"];
          $check_output = $row["output_gpio"];
          if($check_input=="OK"){
            $show_input = $check_yes;
          }
          else{
            $show_input = $check_no;
          }
          if($check_output =="OK"){
            $show_output = $check_yes;
          }
          else{
            $show_output = $check_no;
          }
          if($status_row == 0){
            $status_show = $status_gpio_dissable;
          }
          else if($status_row==1){
            $status_show = $status_gpio_available;
          }
          else{
            $status_show= $status_gpio_used;
          }
          if($status_row==2){
            $listGpio .= '<tbody>
                        <tr>
                          <td>'.$row["gpioDevice"].'</td>
                          <td>'.$row["descriptions"].'</td>
                          <td>'.$show_input.'</td>
                          <td>'.$show_output.'</td>
                          <td>'.$status_show.'</td>
                          <td class="deleteDeviceTable"><a class="deleteDevice" onclick="deleteDevices(this)" href="javascript:void(0);" id="'.$row["gpioDevice"].'"><i class="fas fa-trash-alt recycle"></i></a></i></td>
                        </tr>
                      </tbody>';
          }
          else{
            $listGpio .= '<tbody>
                        <tr>
                          <td>'.$row["gpioDevice"].'</td>
                          <td>'.$row["descriptions"].'</td>
                          <td>'.$show_input.'</td>
                          <td>'.$show_output.'</td>
                          <td>'.$status_show.'</td>
                          <td class="deleteDeviceTable"><a class="deleteDevice" onclick="deleteGpio(this)" href="javascript:void(0);" id="' . $row["id"] .'"><i class="fas fa-trash-alt recycle"></i></a></i></td>
                        </tr>
                      </tbody>';
          }
        }
        echo $listGpio;
      }
    ?>
  </table>
  </div>   
</div>
</div>
<?php 
  
?>
<script>
  function show_list_gpio(e){
    var listGpio = document.getElementById('search_board').value;
    var idp_key = <?php echo json_encode($idp_key); ?>; 
    var username = <?php echo json_encode($username); ?>;
    var xhttp = new XMLHttpRequest();
    xhttp.open("GET","action.php?action=show_list_gpio&board_id="+listGpio+"&idp_key="+idp_key+"&username="+username,true);
    xhttp.send();
    location.reload();
    return false;
  }

  function deleteGpio(element){
    var idp_key = <?php echo json_encode($idp_key); ?>; //alert(idp_key);
    var result = confirm("This gpio will be removed from the main board!\nAre you sure you want to delete it?");
    if(result){
        var xhttp = new XMLHttpRequest();
        xhttp.open("GET","action.php?action=delete_gpio&id="+element.id+"&idp_key="+idp_key, true);
        xhttp.send();
        alert("This gpio has been deleted");
        setTimeout(function(){window.location.reload();});
    }
  }
  function deleteDevices(element){

    var board_id = <?php echo json_encode($board_id); ?>;
    var idp_key = <?php echo json_encode($idp_key); ?>; //alert(idp_key);
    var result = confirm("This device will be removed from the control panel!\nAre you sure you want to delete it?");
    if(result){
        var xhttp = new XMLHttpRequest();
        
        xhttp.open("GET","action.php?action=delete_device&gpioDevice="+element.id+"&boardDevice="+board_id+"&idp_key="+idp_key, true);
        xhttp.send();
        alert("This device has been deleted");
        setTimeout(function(){window.location.reload();});
    }
  }
</script>