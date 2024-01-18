<?php
 include_once "config.php";
 include_once "connect.php";
    $idp_key=$key_room1=$link_image=$roomName="";
    // session_start();
   
    if( isset($_POST["btnregister"])){
        $fullname = $_POST["fullname"];
        $idp_key = $_POST["idp"];
        $username = $_POST["username"];
        $passwordd = $_POST["password"];
        $confirmpassword = $_POST["confirmpassword"];
        if($passwordd != $confirmpassword){
            echo "Mat khau khong khop";
        }
        else{
            $sql = "SELECT * FROM user_bxhome WHERE username = '$username'";
            $old = mysqli_query($connect,$sql);
            $passwordd = md5($passwordd);
            if(mysqli_num_rows($old) > 0){
                echo "Tai khoan da ton tai";
            }
            else{
                $sql = "SELECT * FROM user_bxhome WHERE idp_key = '$idp_key'";
                $old = mysqli_query($connect,$sql);
                if(mysqli_num_rows($old) > 0){
                    $sql = "INSERT INTO user_bxhome(fullname,username,idp_key,passwordd) VALUES('".$fullname."','".$username."','".$idp_key."','".$passwordd."')";
                    connectNoResult($sql);
                    header("location:login.php");
                  }
                  else{
                    $sql = "INSERT INTO user_bxhome(fullname,username,idp_key,passwordd) VALUES('".$fullname."','".$username."','".$idp_key."','".$passwordd."')";
                    connectNoResult($sql);
                    for ($key_room1 = 1; $key_room1 <= 5; $key_room1++) {
                    if($key_room1 == 1){$link_image = "image/livingroom1_static.png"; $roomName = "Livingroom";}
                    else if($key_room1 == 2){$link_image = "image/bedroom1_static.png"; $roomName = "Bedroom";}
                    else if($key_room1 == 3){$link_image = "image/kitchen1_static.png"; $roomName = "Kitchen";}
                    else if($key_room1 == 4){$link_image = "image/bathroom_static.png"; $roomName = "Bathroom";}
                    else if($key_room1 == 5){$link_image = "image/home_out.png"; $roomName = "Outside";}
                    add_new_room($key_room1,$idp_key,$link_image,$roomName);
                }
                header("location:login.php");
           }
                }
        }
    }
    else if( isset($_POST["btnlogin"])){
        $username = $_POST["username"];
        $passwordd = $_POST["password"];
        $passwordd = md5($passwordd);
        $sql = "SELECT * FROM user_bxhome WHERE username = '".$username."' AND passwordd = '".$passwordd."'";
        $user = mysqli_query($connect,$sql);
        if(mysqli_num_rows($user) > 0){
            $result = get_idp_key($username);
            if($result){
                while($row = $result->fetch_assoc()){
                    $idp_key = $row["idp_key"];                    
                }
            }
            // $_SESSION["user"] = $username;
            setcookie('user',$username,time() + 30*24*60*60,'/');
            header("location:index.php");
        }
        else{
            echo "Sai mat khau hoac ten dang nhap";
        }
    }
    else if(isset($_POST["btnreset"])){
        $username = $_POST["username"];
        $idp_key = $_POST["idp"];
        $passwordd = $_POST["password"];
        $confirmpassword = $_POST["confirmpassword"];
        if($passwordd != $confirmpassword){
            echo "Mat khau khong khop";
        }
        else{
            $sql = "SELECT * FROM user_bxhome WHERE username = '$username' AND idp_key = '$idp_key'";
            $old = mysqli_query($connect,$sql);
            $passwordd = md5($passwordd);
            if(mysqli_num_rows($old) < 0){
                echo "Sai ten dang nhap hoac ma IDP khong dung";
            }
            else{
                $sql = "UPDATE user_bxhome SET passwordd = '".$passwordd."' WHERE username = '$username' AND idp_key = '$idp_key'";
                mysqli_query($connect,$sql);
                header("location:login.php");
           }
        }
    }