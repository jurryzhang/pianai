<?php
  //header(“Content-Type: text/html; charset=utf-8")
if (isset($_FILES['myFile'])) {
    // Example:
    writeLog($_FILES);
    move_uploaded_file($_FILES['myFile']['tmp_name'], "../Public/Admin/kindeditor-4.1.10/attached/image/moblepic/" . $_FILES['myFile']['name']);
    echo 'successful';
    //var_dump($_FILES);
}
function writeLog($log){
	if(is_array($log) || is_object($log)){
		$log = json_encode($log);
	}
	$log = $log."\r\n";

	file_put_contents('log.log', $log,FILE_APPEND);
}
?>