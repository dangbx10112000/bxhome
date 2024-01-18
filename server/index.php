<?php
    include_once "header.php";
?>
<style>
   .rooms{
    margin-bottom: 30px;
  }
  .image{
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    display: block;
  width: 456px;
  height: 342px;
  object-fit: contain;

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

.static {
  position:absolute;
  background: white;
}

.static:hover {
  opacity:0;
}
.showRoom{
  clear: both;
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
<div class="col-sm-4 rooms">
  <a href="livingroom.php" class="nav-band">
      <img class="image img-fluid static" src="image/livingroom1_static.png" alt="Chania">
        <img class="image img-fluid active" src="https://cdn.dribbble.com/users/330915/screenshots/7549049/3_liviing_room.gif" alt="Chania"></a>
      <div><span><h2>Livingroom</h2></span></div>
  <div class="overlay">
      <div class="text"><div class=""> <a href="livingroom.php"><i class="fas fa-door-open fa-2x"></i> </a></div></div>
  </div>    
</div>

<div class="col-sm-4 rooms">
  <a href="bathroom.php" class="nav-band">
    <img class="image img-fluid static" src="image/bathroom_static.png" alt="Chania">
    <img class="image img-fluid active" src="https://cdn.dribbble.com/users/330915/screenshots/7621737/media/1b23a3c116f776be7663435169730695.gif" alt="Chania"></a>
      <div><span><h2>Bathroom</h2></span></div>
  <div class="overlay">
      <div class="text"><div class=""> <a href="bathroom.php"><i class="fas fa-door-open fa-2x"></i> </a></div></div>
  </div>    
</div>
<div class="col-sm-4 rooms">
<a href="kitchen.php">
      <img class="image img-fluid static" src="image/kitchen1_static.png" alt="Chania">
       <img class="image img-fluid active" src="https://cdn.dribbble.com/users/330915/screenshots/7589778/media/0fb3a9358a7716b8db20eaa6bac91041.gif" alt="Chania"> 
      </a>
      <div><span><h2>Kitchen</h2></span></div>
  <div class="overlay">
      <div class="text"><div class=""> <a href="kitchen.php"><i class="fas fa-door-open fa-2x"></i> </a></div></div>
  </div>    
</div>

<div class="col-sm-4 rooms">
<a href="bedroom.php">
      <img class="image img-fluid static" src="image/bedroom1_static.png" alt="Chania">
        <img class="image img-fluid active" src="https://cdn.dribbble.com/users/330915/screenshots/7170089/media/22a8d5c1567ac1bfec93ff4f9ead7a46.gif" alt="Chania"></a>
      <div><span><h2>Bedroom</h2></span></div>
  <div class="overlay">
      <div class="text"><div class=""> <a href="bedroom.php"><i class="fas fa-door-open fa-2x"></i> </a></div></div>
  </div>    
</div>
<div class="col-sm-4 rooms">
<a href="outside.php">
      <img class="image img-fluid static" src="image/home_out.png" alt="Chania">
        <img class="image img-fluid active" src="https://cdn.dribbble.com/users/330915/screenshots/3112152/maison_1_anim.gif" alt="Chania"></a>
      <div><span><h2>Outside</h2></span></div>
  <div class="overlay">
      <div class="text"><div class=""> <a href="outside.php"><i class="fas fa-door-open fa-2x"></i> </a></div></div>
  </div>    
</div>
<div class="col-sm-4">
    <div class="moreRoom">   
     <a href="config_board.php"><img class="img-fluid" src="image/more1.png" alt="Chania" width="50%"></a>
    </div>
</div> 
</div>
