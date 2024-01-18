<?php
  $showfile1=$showfile2=$version_firmware=$status_firmware=$descript_new_ver="";
include_once "header.php";
include_once "connect.php";
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    //Bước 1: Tạo thư mục lưu file
    $version_firmware = $_POST["version_firmware"];
    $status_firmware = $_POST["status_firmware"];
    $descript_new_ver = $_POST["descript_new_ver"];
    update_new_firmware($version_firmware,$status_firmware,$descript_new_ver);
    $error = array();
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES['fileUpload']['name']);
    // Kiểm tra kiểu file hợp lệ
    $type_file = pathinfo($_FILES['fileUpload']['name'], PATHINFO_EXTENSION);
    $type_fileAllow = array('bin');
    if (!in_array(strtolower($type_file), $type_fileAllow)) {
        $error['fileUpload'] = "File bạn vừa chọn hệ thống không hỗ trợ, bạn vui lòng chọn file .bin";
    }
    //Kiểm tra kích thước file
    $size_file = $_FILES['fileUpload']['size'];
    if ($size_file > 52428800) {
        $error['fileUpload'] = "File bạn chọn không được quá 50MB";
    }
// Kiểm tra file đã tồn tại trê hệ thống
    if (file_exists($target_file)) {
        $error['fileUpload'] = "File bạn chọn đã tồn tại trên hệ thống";
    }
//
    if (empty($error)) {
        if (move_uploaded_file($_FILES["fileUpload"]["tmp_name"], $target_file)) {
            echo "Bạn đã upload file thành công";
            $flag = true;
        } else {
            echo "File bạn vừa upload gặp sự cố";
        }
    }
    
}
?>
<style>
    .uploadBoard{
        justify-content: center;
        width: 500px;
        height: auto;
        background-color: lavenderblush;
        margin: 120px auto;
        border-radius: 15px;
        box-shadow:10px 10px 5px #aaaaaa;
    }
    .contentBody{
        padding: 20px 15px;
    }
</style>

<div class="uploadBoard">
    <br>
    <center><h1 style="padding: 20px auto;">Upload OTA</h1></center>
    <div  id="content"  class="contentBody">
    <center><form id="form_upload" method="POST" enctype="multipart/form-data"><br/>
    <span class="btn btn-primary" onclick="$(this).parent().find('input[type=file]').click();">Browse</span>
        <input type="file" class = "file" data-Browse-on-zone-click = "true" name="fileUpload"  id="fileUpload" onchange="$(this).parent().parent().find('.form-control').html($(this).val().split(/[\\|/]/).pop());"  style="display: none;">
        
        <button class="btn btn-primary"  type="submit" name="submit">Upload</button><br/>
        <br>
        <div class="input-group mb-3">
        <div class="input-group-append">
        <span class="input-group-text">Version</span>
        </div>
        <input type="text" class="form-control" placeholder="Version of firmware..." name="version_firmware"  id="version_firmware">
        </div>
        <div class="input-group mb-3">
        <div class="input-group-append">
        <span class="input-group-text">Status</span>
        </div>
        <input type="text" class="form-control" placeholder="Status..." name="status_firmware"  id="status_firmware">
        </div>
        <div class="input-group mb-3">
        <div class="input-group-append">
        <span class="input-group-text">Description</span>
        </div>
        <input type="text" class="form-control" placeholder="Description..." name="descript_new_ver"  id="descript_new_ver">
        </div>
    </form></center><br>
    <?php
    $showfile1 .='<center><img src="https://cdn.pixabay.com/photo/2016/01/03/00/43/upload-1118929_1280.png" alt="" width="200" height="200"></center>';
    if (isset($flag) && $flag == true) {
       $showfile2 .= '<center><img src="https://iconarchive.com/download/i65474/icojam/blue-bits/document-arrow-up.ico" alt="" width="200" height="200"></center>';
       $showfile1="";
       echo $showfile2;
    }
    echo $showfile1;
    ?>
    </div>
</div>
