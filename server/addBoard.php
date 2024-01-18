<?php 
  include_once "check_session.php";
  $board_id = $table_input=$id=$username1=$btnGetBoard=$idp_key1="";
  $result = get_key_room($idp_key,$username);
  if($result){
      while($row = $result->fetch_assoc()){
          $board_id=$row["board_id"];
          $id= $row["id"];
      }
      $btnGetBoard .= '<button type="button" class="btn btn-primary btncreate" onclick="add_boardID(this)" id="'.$id.'"><i class="fas fa-magic"></i> Create</button>';
      // var_dump($id);
  }
// var_dump($idp_key);var_dump($username);
?>
<div class="p-2 rounded mx-auto bg-light shadow" id="refreshDivID" style="margin-top: -15px;">
    <!-- App title section -->
    
    <!-- Create todo section -->
    <div class="row m-1 p-3">
        <div class="col col-15 mx-auto">
          
            <div class="row bg-white rounded shadow-sm p-2  align-items-center justify-content-center">
            <div class="row m-1 p-1">
        <div class="col">
            <div class=" h1 text-primary text-center mx-auto display-inline-block">
                <h2><b>Create board main </b> <i class="fas fa-plus-square text-blue rounded"></i></h2>
            </div>
        </div>
    </div>
    <div class="col">
                    <input class="form-control form-control-lg border-0 bg-transparent rounded selectRoom" id="boardID" type="search" placeholder="Board id create...">
                    </div>
                    
                <div class="col-auto px-0 mx-0 mr-2">
                  <?php echo $btnGetBoard; ?>
                  <!-- <button type="button" class="btn btn-primary btncreate" onclick="add_boardID(this)" id=""><i class="fas fa-magic"></i> Create</button> -->
                </div>
            </div>            
            </div>
    
    <?php 
        $table_input .='<input class="form-control form-control-lg border-0 bg-transparent rounded selectRoom" id="gpio" type="number" placeholder="GPIO ..." required>
            <input class="form-control form-control-lg border-0 bg-transparent rounded selectRoom" id="descriptions" type="text"  placeholder="Description ...">
            <select class="form-control form-control-lg border-0 bg-transparent rounded selectRoom" id="input_gpio" type="text"  placeholder="Input gpio: Ok or null ..." required>
            <option value="#">This is gpio input? ...</option>
            <option value="X">Not</option>
            <option value="OK">OK</option>
            </select>
            <select class="form-control form-control-lg border-0 bg-transparent rounded selectRoom" id="output_gpio" type="text"  placeholder="Output gpio: Ok or null ..." required>
            <option value="#">This is gpio output? ...</option>
            <option value="X">Not</option>
            <option value="OK">OK</option>
            </select>
            <select class="form-control form-control-lg border-0 bg-transparent rounded selectRoom" id="use_gpio" type="number" placeholder="0 = dissable or 1 = ennable ..." required>
            <option value="#">Allow to use? ...</option>
            <option value="0">dissable</option>
            <option value="1">available</option>
            </select>
            <input class="form-control form-control-lg border-0 bg-transparent rounded selectRoom" id="board_gpio" value="'.$board_id.'" type="number"  placeholder="Board ID ..." required>';
    echo $table_input;
    ?>

<button type="button" class="btn btn-primary btn-lg btn-block" onclick="add_gpio(this)">Next <i class='fas fa-long-arrow-alt-right text-white rounded'></i></button>
  </div>   
</div>
<script>
  function add_boardID(element){
    var board_id = document.getElementById('boardID').value;
    var idp_key = <?php echo json_encode($idp_key) ?>;
    var username = <?php echo json_encode($username) ?>;
    // alert(idp_key);alert(username);
    var xhttp = new XMLHttpRequest();
    xhttp.open("GET","action.php?action=add_board&board_id="+board_id+"&idp_key="+idp_key+"&username="+username,true);
    xhttp.send();
    location.reload();
    return false;
  }
  function add_gpio(e){
    var idp_key = <?php echo json_encode($idp_key) ?>;
    var username = <?php echo json_encode($username) ?>;
    var gpioDevice = document.getElementById('gpio').value;
    var descriptions = document.getElementById('descriptions').value;
    var input_gpio = document.getElementById('input_gpio').value;
    var output_gpio = document.getElementById('output_gpio').value;
    var use_gpio = document.getElementById('use_gpio').value;
    var board_id = document.getElementById('board_gpio').value;
    var xhttp = new XMLHttpRequest();
    xhttp.open("GET","action.php?action=add_gpio&gpioDevice="+gpioDevice+"&descriptions="+descriptions+"&input_gpio="+input_gpio+"&output_gpio="+output_gpio+"&use_gpio="+use_gpio+"&board_id="+board_id+"&idp_key="+idp_key+"&username="+username,true);
    xhttp.send();
    location.reload();
    return false;
   }
</script>