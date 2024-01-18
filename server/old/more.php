<?php 
    include_once "header.php";
?>
<style>
    .menuList{
        margin: 10%;
        margin-top: -20px;
        margin-bottom: 0%;
        cursor: pointer;
        z-index: 10;
    }
    .more{
      padding-top: 90px;
    }
  </style>
<div  class="more">
  <div class="menuNav">
  <div class="roomName" style="color:white;"><h9>Dream Home</h9></div>
  <ul class="nav nav-tabs justify-content-center menuA">
    <li class="nav-item menuList">
      <a class="nav-link active" data-toggle="tab" data-trigger="hover" data-placement="right" title="Status Board" href="#shop"><h1><i class='fas fa-cart-plus'></i></h1></a>
    </li>
    <li class="nav-item menuList">
      <a class="nav-link" data-toggle="tab" data-trigger="hover" data-placement="right" title="Control Board" href="#aboutUs"><h1><i class='fas fa-info-circle'></i></h1></a>
    </li>
  </ul>
  </div>
  <!-- Tab panes -->
  <div class="tab-content">
    <div id="shop" class="container tab-pane active"><br>
        <?php include_once "more_shop.php"; ?>
    </div>
    <div id="aboutUs" class="container tab-pane fade"><br>
      <?php include_once "more_info.php"; ?>
    </div>
</div>
  </div>
</div>

<?php include_once "footer.php"; ?>
