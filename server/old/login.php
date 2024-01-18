<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="image/hauiLogo.jpg">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	  <link href="https://use.fontawesome.com/releases/v5.0.4/css/all.css" rel="stylesheet">  
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Sofia' rel='stylesheet'>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous"></head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> 
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="http://rilwis.googlecode.com/svn/trunk/weather.min.js"></script>

    <link rel="stylesheet" href="styleLogin.css">
	<title>HaUI-Đồ án tốt nghiệp-Smart Home</title>
</head>
<body>
    <div class="slogan">Complicated to be ..... simpler!</div><br>
    <div class="layoutLogin">
    
        <div class="rightLayoutLogin">
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                    <a class="nav-link active" href="#loginAccount">Login</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="#registerAccount">Register</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="#resetPwd">Reset</a>
                    </li>
                </ul>
                <div class="tab-content">
            <div id="loginAccount" class="container tab-pane active"><br>
                <div class="shadow-lg p-3 mb-5 bg-white rounded">
                    <form action="loginaction.php" class="needs-validation" novalidate method="POST">
                        <div class="form-group">
                        <label for="username">Username:</label>
                        <input type="text" class="form-control" id="username" placeholder="Enter username" name="username" required>
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">Please fill out this field.</div>
                        </div>
                        <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" class="form-control" id="password" placeholder="Enter password" name="password" required>
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">Please fill out this field.</div>
                        </div>

                        <div class="form-group form-check">
                        <label class="form-check-label">
                        <input class="form-check-input" type="checkbox" name="remember" checked> Remember me.
                        <div class="valid-feedback"></div>
                        <div class="invalid-feedback">Check this checkbox to continue.</div>
                        </label>
                        </div>
                        <center><button type="submit" class="btn btn-primary" name="btnlogin">Login</button></center>              
                    </form>
                </div>
            </div>
            <div id="registerAccount" class="container tab-pane fade"><br>
                <div class="shadow-lg p-3 mb-5 bg-white rounded">
                <form action="loginaction.php" class="needs-validation" novalidate method="POST">
                        <div class="form-group">
                            <label for="fullname">Fullname:</label>
                            <input type="text" class="form-control" id="fullname" placeholder="Enter fullname" name="fullname" required>
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">Please fill out this field.</div>
                        </div>
                        <div class="form-group">
                            <label for="idp">IDP key:</label>
                            <input type="password" class="form-control" id="idp" placeholder="Enter IDP key" name="idp" required>
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">Please fill out this field.</div>
                        </div>
                        <div class="form-group">
                            <label for="username">Username:</label>
                            <input type="text" class="form-control" id="username" placeholder="Enter username" name="username" required>
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">Please fill out this field.</div>
                        </div>
                        <div class="form-group">
                            <label for="password">Password:</label>
                            <input type="password" class="form-control" id="password" placeholder="Enter password" name="password" required>
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">Please fill out this field.</div>
                        </div>
                        <div class="form-group">
                            <label for="confirmpassword">Confirm password:</label>
                            <input type="password" class="form-control" id="confirmpassword" placeholder="Enter confirm password" name="confirmpassword" required>
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">Please fill out this field.</div>
                        </div>

                        <center><button type="submit" class="btn btn-primary" name="btnregister">Register</button></center>
                    </form>
                </div>
            </div>

            <div id="resetPwd" class="container tab-pane fade"><br>
                <div class="shadow-lg p-3 mb-5 bg-white rounded">
                <form action="loginaction.php" class="needs-validation" novalidate method="POST">
                    <div class="form-group">
                            <label for="username">Username:</label>
                            <input type="text" class="form-control" id="username" placeholder="Enter username" name="username" required>
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">Please fill out this field.</div>
                        </div>
                        <div class="form-group">
                            <label for="idp">IDP key:</label>
                            <input type="password" class="form-control" id="idp" placeholder="Enter IDP key" name="idp" required>
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">Please fill out this field.</div>
                        </div>
                        <div class="form-group">
                            <label for="password">Password:</label>
                            <input type="password" class="form-control" id="password" placeholder="Enter password" name="password" required>
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">Please fill out this field.</div>
                        </div>
                        <div class="form-group">
                            <label for="confirmpassword">Confirm password:</label>
                            <input type="password" class="form-control" id="confirmpassword" placeholder="Enter confirm password" name="confirmpassword" required>
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">Please fill out this field.</div>
                        </div>
                            <div class="form-group form-check">
                            <label class="form-check-label">
                            <input class="form-check-input" type="checkbox" name="remember" required> I agree.
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">Check this checkbox to continue.</div>
                            </label>
                        </div>
                        <center><button type="submit" class="btn btn-primary" name="btnreset">Reset password</button></center>
                    </form>
                </div>
            </div>

        </div>
    </div>
    <script>
(function() {
  'use strict';
  window.addEventListener('load', function() {
    var forms = document.getElementsByClassName('needs-validation');
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();

$(document).ready(function(){
  $(".nav-tabs a").click(function(){
    $(this).tab('show');
  });
});
</script>
</body>
</html>