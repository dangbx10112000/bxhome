<?php
    include_once "header.php";
    $id=$key_room=$link_image=$roomName=$roomCard="";
    $result = get_room_info($idp_key);
    if($result){
        while($row = $result->fetch_assoc()){
            $id=$row["id"];
            $key_room=$row["key_room"];
            $link_image = $row["link_image"];
            $roomName=$row["roomName"];
            $roomCard .= '<div class="col-sm-4 rooms">
                            <a href="inRoom.php" class="nav-band" onclick = "return come_room(this);" id="'.$row["key_room"].'">
                                <img class="image img-fluid active" src="'.$link_image.'" alt="Chania"></a>
                                <div><span><h2>'.$row["roomName"].'</h2></span></div>
                            <div class="overlay">
                                <div class="text"><div class=""> <a href="inRoom.php" onclick = "return come_room(this);" id="'.$key_room.'"><i class="fas fa-door-open fa-2x"></i> </a></div></div>
                            </div>    
                          </div>';
        }
    }
?>
<style>
  .rooms{
    margin-bottom: 30px;
  }
  .image{
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
  }
    a{
       color: white;
       text-decoration: none;
    }
    a:hover{
      color: red;
      text-decoration: none;
    }
    .setRoom{
      position: relative;
        font-family: 'Sofia';font-size: 22px;
        text-align: center;
        padding-top: 100px;
        margin-left: 10px;
        /* box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); */
    }
    .moreRoom{
        font-family: 'Sofia';font-size: 22px;
        text-align: center;
    }
    .image{
   display: block;
  width: 456px;
  height: 342px;
  object-fit: contain;

    }
.overlay {
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    background-color: #008CBA;
    overflow: hidden;
    width: 0;
    height: 100%;
    transition: .5s ease;
    /* border-top-right-radius: 50%; 
    border-bottom-right-radius: 50%;  */
}

.rooms:hover .overlay {
  width: 20%;
}
.text {
  color: white;
  font-size: 20px;
  position: absolute;
  top: 50%;
  left: 50%;
  -webkit-transform: translate(-50%, -50%);
  -ms-transform: translate(-50%, -50%);
  transform: translate(-50%, -50%);
  white-space: nowrap;
}
@media all and (min-width: 200px) and (max-width: 400px) {
      .image{
display: block;
  width: 90%;
  object-fit: contain;
    margin:auto;
  }
}
</style>
<div class="row setRoom ">
  <?php echo $roomCard; ?>
  <div class="col-sm-4">
    <div class="moreRoom">   
     <a href="config_board.php"><img class="img-fluid" src="image/more1.png" alt="Chania" width="50%"></a>
    </div>
</div>
</div> 
<script>
  function come_room(element){
    var idp_key = <?php echo json_encode($idp_key); ?>;
    var username = <?php echo json_encode($username); ?>;
    xhttp = new XMLHttpRequest();
    xhttp.open("GET","action.php?action=come_room&id="+element.id+"&idp_key="+idp_key+"&username="+username,true);
    xhttp.send();
  }
</script>