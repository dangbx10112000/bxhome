<?php 
    include_once "header.php";
?>
<style>
    .menuList{
        margin: 10%;
        margin-top: -20px;
        margin-bottom: 0%;
        cursor: pointer;
    }
    .security{
      padding-top: 90px;
    }
  </style>
<div  class="security">
  <div class="menuNav">
  <div class="roomName" style="color:white;"><h9>Dream Home</h9></div>
  <ul class="nav nav-tabs justify-content-center menuA">
  <li class="nav-item menuList">
      <a class="nav-link active" data-toggle="tab" data-trigger="hover" data-placement="right" title="Control Board" href="#controlUsers"><h1><i class='fas fa-door-closed'></i></h1></a>
    </li>
    <li class="nav-item menuList">
      <a class="nav-link" data-toggle="tab" data-trigger="hover" data-placement="right" title="Status Board" href="#controlCamera"><h1><i class='fas fa-video'></i></h1></a>
    </li>
  </ul>
  </div>
  <!-- Tab panes -->
  <div class="tab-content">
  <div id="controlUsers" class="container tab-pane active"><br>
        <?php include_once "securityDoor.php"; ?>
    </div>
    <div id="controlCamera" class="container tab-pane fade"><br>
    <?php include_once "securityCamera.php"; ?>
    </div>
    </div>
</div>
<?php include_once "footer.php"; ?>
