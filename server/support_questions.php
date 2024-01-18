<?php 
  include_once "connect.php";
  $show_questions=$content_question="";
  $result= get_questions();
  if($result){
      while($row=$result->fetch_assoc()){
        $content_question = $row["content_question"];
        $show_questions .= '<tr><td><div class="container">
        <div id="accordion">
        <div class="card">
          <div class="card-header">
            <a class="collapsed  card-link" data-toggle="collapse" href="#'.$row["add_link"].'">
                '.$row["add_questions"].' <i class="fas fa-chevron-circle-right"></i>
            </a>
          </div>
          <div id="'.$row["add_link"].'" class="collapse" data-parent="#accordion">
            <div class="card-body">
              '.$content_question.'
            </div>
            
          </div>
            </div>
          </div>
        </div></td></tr>';
      }
  }
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
                <h2><b>Questions</b> <i class="fas fa-question-circle text-blue rounded "></i></h2>
            </div>
        </div>
    </div>       
    </div>

    </div>
  </div>   
  <h4>
  <table class="table justify-content-center">
        <tbody>
            <?php 
                echo $show_questions;
            ?>
        </tbody>
    </table>
  </h4>
<div class="card-body">
    
</div>
</div>