<?php
if (isset($_FILES['myFile'])) {
    // Example:
    writeLog($_FILES);
    move_uploaded_file($_FILES['myFile']['tmp_name'], "./uploads/" . $_FILES['myFile']['name']);
    //http://www.yxzyhz.com/Public/Admin/kindeditor-4.1.10/attached/image/20170215/
    echo 'successful';
}

?>