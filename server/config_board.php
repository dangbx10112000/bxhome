<?php include_once "header.php"; ?>
<style>
    .menuList{
        margin: 5%;
        margin-top: -20px;
        margin-bottom: 0%;
        cursor: pointer;
    }
    .config_board{
      padding-top: 90px;
    }
    @media all and (min-width: 200px) and (max-width: 768px) {
    .menuList{
        margin: 5px;
        margin-top: -20px;
        margin-bottom: 0%;
        cursor: pointer;
    }
}
  </style>
<div  class="config_board">
  <div class="menuNav">
  <div class="roomName" style="color:white;"><h9>List Item</h9></div>
  <ul class="nav nav-tabs justify-content-center menuA">
  
    <li class="nav-item menuList">
      <a class="nav-link active" data-toggle="tab" data-trigger="hover" data-placement="right" title="Add new board" href="#addBoard"><h1><i class='	fas fa-server'></i></h1></a>
    </li>
    <li class="nav-item menuList">
      <a class="nav-link" data-toggle="tab" data-trigger="hover" data-placement="right" title="Microchip board" href="#microchipBoard"><h1><i class='fas fa-microchip'></i></h1></a>
    </li>
    <li class="nav-item menuList">
      <a class="nav-link" data-toggle="tab" data-trigger="hover" data-placement="right" title="Add new device" href="#addDevice"><h1><i class='	fas fa-laptop'></i></h1></a>
    </li>
    <li class="nav-item menuList">
      <a class="nav-link" data-toggle="tab" data-trigger="hover" data-placement="right" title="Add new room" href="#addRoom"><h1><i class='	far fa-building'></i></h1></a>
    </li>
  </ul>
  </div>
  <!-- Tab panes -->
  <div class="tab-content">
  <div id="addBoard" class="container tab-pane active"><br>
        <?php include_once "addBoard.php" ?>
    </div>
    <div id="microchipBoard" class="container tab-pane fade"><br>
      <?php include_once "config_microchip_board.php" ?>
    </div>
    
    <div id="addDevice" class="container tab-pane fade"><br>
        <?php include_once "addDevice.php" ?>
    </div>
    <div id="addRoom" class="container tab-pane fade"><br>
        <?php include_once "add_room.php" ?>
    </div>
  </div>
</div>
<?php include_once "footer.php"; ?>
