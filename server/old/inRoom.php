<?php 
  include_once "check_session.php";
  include_once "header.php";
  $key_room="";
  $result=get_key_room($idp_key,$username);
  if($result){
    while($row=$result->fetch_assoc()){
      $key_room = $row["key_room"];
    }
  }
?>
<style>
    .menuList{
        margin: 10%;
        margin-top: -20px;
        margin-bottom: 0%;
        cursor: pointer;
    }
    .inRoom{
      padding-top: 90px;
    }
    @media only screen and (max-width: 768px) {
    .rangeInput{
    width: 100%;
    }
}
@media all and (min-width: 200px) and (max-width: 768px) {
    .menuList{
        margin: 20px;
        margin-top: -20px;
        margin-bottom: 0%;
        cursor: pointer;
    }
}
  </style>
<div class="inRoom">
<div  class="">
  <div class="menuNav">
  <div class="roomName" style="color:white;"><h9>Dream Home</h9></div>
  <ul class="nav nav-tabs justify-content-center menuA">
    <li class="nav-item menuList">
      <a class="nav-link active" data-toggle="tab" data-trigger="hover" data-placement="right" title="Status Board" href="#statusBoard"><h1><i class='far fa-calendar-check'></i></h1></a>
    </li>
    <li class="nav-item menuList">
      <a class="nav-link" data-toggle="tab" data-trigger="hover" data-placement="right" title="Control Board" href="#controlDevice"><h1><i class='fas fa-toggle-off'></i></h1></a>
    </li>
    <li class="nav-item menuList">
      <a class="nav-link" data-toggle="tab" data-trigger="hover" data-placement="right" title="List Device" href="#listDevices"><h1><i class='fas fa-tasks'></i></h1></a>
    </li>
  </ul>
  </div>
  <!-- Tab panes -->
  <div class="tab-content">
    <div id="statusBoard" class="container tab-pane active"><br>
    <script>
      var refreshId = setInterval(function()
      {
          $('#responsecontainer').load('status.php');
      }, 1000);
      </script>
          
      <div class="container">

        <script type="text/javascript" src="assets/js/jquery-3.4.0.min.js"></script>
        <script type="text/javascript" src="assets/js/mdb.min.js"></script>
        
        <div id="responsecontainer">
        
        </div>	
      </div>
    </div>
    <div id="controlDevice" class="container tab-pane fade"><br>
      <?php
        include_once "control.php";
      ?>
    </div>
    <div id="listDevices" class="container tab-pane fade"><br>
      <?php
        include_once "list_device.php";
      ?>
    </div>
  </div>
</div>
</div>
<?php include_once "footer.php"; ?>
