<style>

/* .boardOfDevice{
    width: 100%;
    height: 100px;
    justify-content: center !important;
    font-size: 2.8rem;
    position: relative;
}*/
/*-----------------Class of On/Off Devices----------------------- */

/*-----------------------------------------------------------------*/
/*-------------------Class of ranger Devices-----------------------*/
/*-----------------------------------------------------------------*/

.deleteDevice a{
    color: darkgrey;
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
.switch {
    position: relative;
    display: inline-block;
    width: 100px;
    height: 50px;
}
.switch input {
    display: none; 
}

.slider {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: #949494;
    border-radius: 35px;
}

.slider:before {
    position: absolute;
    content: "";
    height: 35px;
    width: 35px;
    left: 8px; bottom: 8px;
    background-color: #fff;
    -webkit-transition: .4s;
    transition: .4s;
    border-radius: 35px;
}

input:checked+.slider {
    background-color: #00cec9;
    
}

input:checked+.slider:before {
    -webkit-transform: translateX(52px);
    -ms-transform: translateX(52px);
    transform: translateX(52px);
}

input[type=text], input[type=number], select {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}
.infoDevice button{
    border: none !important;
    background-color: white;
    color: lightgray;
}
/*-------------------------Ranger slider------------------------------ */
.sliderRang {
  -webkit-appearance: none;
  width: 80%;
  height: 30px;
  border-radius: 30px;
  background: lightslategrey;
  outline: none;
  opacity: 0.7;
  -webkit-transition: .2s;
  transition: opacity .2s;
}

.sliderRang:hover {
  opacity: 1;
}

.sliderRang::-webkit-slider-thumb {
  -webkit-appearance: none;
  appearance: none;
  width: 40px;
  height: 40px;
  border-radius: 50%;
  background: #01DFD7;
  cursor: pointer;
}

.sliderRang::-moz-range-thumb {
  width: 50px;
  height: 50px;
  border-radius: 50%;
  background: #01DFD7;
  cursor: pointer;
}
/*--------------------------------------------------------------------*/
.nameDeviceTable{
    font-family: 'Antic';
    padding-top: 20px;
    justify-content: center;
    width: 20%;
    position: relative;

}
.nameDevices{
    position: relative;
    top: 10px;
}
.deleteDeviceTable{
    justify-content: center;
    float: right;
 
}
.rangeInput{
    width: 300%;
    min-width: 100%;
}
@media only screen and (max-width: 768px) {
    .rangeInput{
    width: 100%;
    
}

}
@media only screen and (max-width: 1080px) {
    .rangeInput{
    width: 200px;
    
}

}
.rangeDeviceTable{
    position: relative;
}
.rangeInput{
    position: relative;
    top: 15px;
    
}
@media all and (min-width: 200px) and (max-width: 400px) {
  .rangeDeviceTable{
    width: 10px;
    }
    .menuList{
        margin: 20px;
        margin-top: -20px;
        margin-bottom: 0%;
        cursor: pointer;
    }
    .rangeInput{
    position: relative;
    width:auto;
    top:2px;
    
}
.switch {
    position: relative;
    display: inline-block;
    width: 90px;
    height: 40px;
}
.slider:before {
    position: absolute;
    content: "";
    height: 25px;
    width: 25px;
    left: 8px; bottom: 8px;
    background-color: #fff;
    -webkit-transition: .4s;
    transition: .4s;
    border-radius: 25px;
}
.nameDevices{
    position: relative;
    top: 0px;
    width:100px;
}
}
/* @media screen and (max-width: 2000px) {
Định dạng của các khối khi màn hình có chiều rộng nhỏ hơn 2000px;
} */
</style>

<div class=" p-2 rounded mx-auto bg-light shadow containercontrol" id="refreshDivID" style="margin-top: -15px;">
    <!-- App title section -->
    
    <!-- Create todo section -->
    <div class="row m-1 p-3">
        <div class="col col-15 mx-auto">
          
            <div class="row bg-white rounded shadow-sm p-2  align-items-center">
            <div class="row m-1 p-1">
        <div class="col">
            <div class=" h1 text-primary text-left mx-auto display-inline-block">
                <h2><b>Control devices </b> <i class="	fas fa-power-off text-blue rounded "></i></h2>
            </div>
        </div>
    </div>       
            </div>
            <?php
        $kind1=1;
        $kind2=2;
        include_once "check_session.php";
        $result = get_key_room($idp_key,$username);
        if($result){
            kind_device($kind1,$key_room,$idp_key);
            kind_device($kind2,$key_room,$idp_key);
        }

    ?>
  </div>   
    </div>   
      </div>   
<script>
        function updateDevices(element) {
            var idp_key = <?php echo json_encode($idp_key) ?>;
            var username = <?php echo json_encode($username) ?>;
            var xhttp = new XMLHttpRequest();
            if(element.checked){
                xhttp.open("GET", "action.php?action=update_status&id="+element.id+"&statusDevice=1&idp_key="+idp_key+"&username="+username, true);
            }
            else {
                xhttp.open("GET", "action.php?action=update_status&id="+element.id+"&statusDevice=0&idp_key="+idp_key+"&username="+username, true);
            }
            xhttp.send();
        }
        function getValues_device(element){
            var idp_key = <?php echo json_encode($idp_key) ?>;
            var username = <?php echo json_encode($username) ?>;
            var x = document.getElementById(element.id).value;
            var xhttp = new XMLHttpRequest();
            xhttp.open("GET","action.php?action=update_status&id="+element.name+"&statusDevice="+x+"&idp_key="+idp_key+"&username="+username,true);
            xhttp.send();
        }
    </script>