<?php
    include_once "connect.php";
?>
<div>
        <h2 for="">question: </h2><input type="text" id="add_questions" name="add_questions" style="width: 100%; font-size:2rem;"><br>
        <h2 for="">link anwser: </h2><input type="" id="add_link" name="add_link" style="width: 100%;font-size:2rem;"><br><br>
        <h2 for="">content anwser: </h2><input type="" id="content_question" name="content_question" style="width: 100%;font-size:2rem;"><br><br>
        <button type="button" onclick="addQuestion(this)">add</button>
</div>
<script>
    function addQuestion(element){
    
    var xhttp = new XMLHttpRequest();
    xhttp.open("POST", "action.php",true);
    xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhttp.onreadystatechange = function(){
      if (this.readyState === XMLHttpRequest.DONE && this.status===200){
        alert("A new question has been added");
        // setTimeout(function(){window.location.reload();});
      }
    }
    var add_questions = document.getElementById("add_questions").value;
    var add_link = document.getElementById("add_link").value;
    var content_question = document.getElementById("content_question").value;
    var httpRequestData = "action=create_questions&add_questions="+add_questions+"&add_link="+add_link+"&content_question="+content_question;
    xhttp.send(httpRequestData);
    location.reload();
    return false
  }
</script>