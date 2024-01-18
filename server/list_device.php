<?php 
  include_once "connect.php";
  $listDevices="";
  $result=getAllOutputs($key_room,$idp_key);
?>
<div class="p-2 rounded mx-auto bg-light shadow" id="refreshDivID" style="margin-top: -15px;">
    <!-- App title section -->
    
    <!-- Create todo section -->
    <div class="row m-1 p-3">
        <div class="col col-15 mx-auto">
          
            <div class="row bg-white rounded shadow-sm p-2  align-items-center">
            <div class="row m-1 p-1">
        <div class="col">
            <div class=" h1 text-primary text-left mx-auto display-inline-block">
                <h2><b>Device list</b> <i class="fas fa-rss-square text-blue rounded "></i></h2>
            </div>
        </div>
    </div>       
            </div>
            <table class="table table-hover justify-content-center">
    <thead>
      <tr>
        <th>Name</th>
        <th>Board</th>
        <th>GPIO</th>
        <th>Room</th>
      </tr>
    </thead>
    <?php 
      if($result){
        while($row = $result -> fetch_assoc()){
          $listDevices .= '<tbody>
                        <tr>
                          <td>'.$row["nameDevice"].'</td>
                          <td>'.$row["boardDevice"].'</td>
                          <td>'.$row["gpioDevice"].'</td>
                          <td>'.$row["roomDevice"].'</td>
                        </tr>
                      </tbody>';
        }
        echo $listDevices;
      }
    ?>
  </table>
  </div>   
</div>