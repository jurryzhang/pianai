<?php
//图片上传函数

function msubstr($str, $start=0, $length, $charset="utf-8", $suffix=true)  
{  
      if(function_exists("mb_substr")){  
          if($suffix)  
          return mb_substr($str, $start, $length, $charset)."...";  
          else
               return mb_substr($str, $start, $length, $charset);  
     }  
     elseif(function_exists('iconv_substr')) {  
         if($suffix)  
              return iconv_substr($str,$start,$length,$charset)."...";  
         else
              return iconv_substr($str,$start,$length,$charset);  
     }  
     $re['utf-8']   = "/[x01-x7f]|[xc2-xdf][x80-xbf]|[xe0-xef]
              [x80-xbf]{2}|[xf0-xff][x80-xbf]{3}/";  
     $re['gb2312'] = "/[x01-x7f]|[xb0-xf7][xa0-xfe]/";  
     $re['gbk']    = "/[x01-x7f]|[x81-xfe][x40-xfe]/";  
     $re['big5']   = "/[x01-x7f]|[x81-xfe]([x40-x7e]|xa1-xfe])/";  
     preg_match_all($re[$charset], $str, $match);  
     $slice = join("",array_slice($match[0], $start, $length));  
     if($suffix) return $slice."…";  
     return $slice;
}
 function uploadImage($imageName,$imagePath,$thumb=array()){
           if(isset($_FILES[$imageName]) && $_FILES[$imageName]['error'] == 0){
            $rootPath=C('IMG_ROOTPATH');
            $upload = new \Think\Upload();// 实例化上传类
                $upload->maxSize = (int)C('IMG_MAXSIZE') * 1024 * 1024;// 设置附件上传大小
                $upload->exts = C('IMG_EXTS');// 设置附件上传类型
                $upload->rootPath = $rootPath; // 设置附件上传根目录
                $upload->savePath = $imagePath.'/'; // 图片二级目录的名称
                // 上传文件 
                $info = $upload->upload();
                if(!$info)
                {
                    // 先把上传失败的错误信息存到模型中，由控制器最终再获取这个错误信息并显示
                    return array('ok'=>0,
                                 'error' => $upload->getError());
                } else {
                    $ret['ok']=1;
                    $ret['image'][0]=$logoName = $info[$imageName]['savepath'] . $info[$imageName]['savename'];
                    // 拼出缩略图的文件名
                    if($thumb){
                        // 生成缩略图
                    $image = new \Think\Image();
                    // 打开要处理的图片
                    $image->open($rootPath.$logoName);
                        foreach($thumb as $k=>$v){
                            $ret['image'][$k+1] = $info[$imageName]['savepath'] . 'thumb_'.$k."_" .$info[$imageName]['savename'];
                            $image->thumb($v, $v)->save($rootPath.$ret['image'][$k+1]);

                        }
                    }

                } 
                return $ret;
            }
   }
   //webuploads处理文件名函数
   function uploadsPic($path){
    header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
    header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
    header("Cache-Control: no-store, no-cache, must-revalidate");
    header("Cache-Control: post-check=0, pre-check=0", false);
    header("Pragma: no-cache");
 
    if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
      exit; // finish preflight CORS requests here
    }
    if ( !empty($_REQUEST[ 'debug' ]) ) {
      $random = rand(0, intval($_REQUEST[ 'debug' ]) );
      if ( $random === 0 ) {
        header("HTTP/1.0 500 Internal Server Error");
        exit;
      }
    }
 
    // header("HTTP/1.0 500 Internal Server Error");
    // exit;
    // 5 minutes execution time
    @set_time_limit(5 * 60);
    // Uncomment this one to fake upload time
    // usleep(5000);
    // Settings
    // $targetDir = ini_get("upload_tmp_dir") . DIRECTORY_SEPARATOR . "plupload";
    $targetDir = "./Uploads/".$path;
    $uploadDir = './Uploads/'.$path.'/'.date('Ymd');
    $cleanupTargetDir = true; // Remove old files
    $maxFileAge = 5 * 3600; // Temp file age in seconds
    // Create target dir
    if (!file_exists($targetDir)) {
      @mkdir($targetDir);
    }
    // Create target dir
    if (!file_exists($uploadDir)) {
      @mkdir($uploadDir);
    }
    // Get a file name
    if (isset($_REQUEST["name"])) {
      $fileName = $_REQUEST["name"];
    } elseif (!empty($_FILES)) {
      $fileName = $_FILES["file"]["name"];
    } else {
      $fileName = uniqid("file_");
    }
    $oldName = $fileName;
    $filePath = $targetDir . $fileName;
    // $uploadPath = $uploadDir . DIRECTORY_SEPARATOR . $fileName;
    // Chunking might be enabled
    $chunk = isset($_REQUEST["chunk"]) ? intval($_REQUEST["chunk"]) : 0;
    $chunks = isset($_REQUEST["chunks"]) ? intval($_REQUEST["chunks"]) : 1;
    // Remove old temp files
    if ($cleanupTargetDir) {
      if (!is_dir($targetDir) || !$dir = opendir($targetDir)) {
        die('{"jsonrpc" : "2.0", "error" : {"code": 100, "message": "Failed to open temp directory."}, "id" : "id"}');
      }
      while (($file = readdir($dir)) !== false) {
        $tmpfilePath = $targetDir . DIRECTORY_SEPARATOR . $file;
        // If temp file is current file proceed to the next
        if ($tmpfilePath == "{$filePath}_{$chunk}.part" || $tmpfilePath == "{$filePath}_{$chunk}.parttmp") {
          continue;
        }
        // Remove temp file if it is older than the max age and is not the current file
        if (preg_match('/\.(part|parttmp)$/', $file) && (@filemtime($tmpfilePath) < time() - $maxFileAge)) {
          @unlink($tmpfilePath);
        }
      }
      closedir($dir);
    }
 
    // Open temp file
    if (!$out = @fopen("{$filePath}_{$chunk}.parttmp", "wb")) {
      die('{"jsonrpc" : "2.0", "error" : {"code": 102, "message": "Failed to open output stream."}, "id" : "id"}');
    }
    if (!empty($_FILES)) {
      if ($_FILES["file"]["error"] || !is_uploaded_file($_FILES["file"]["tmp_name"])) {
        die('{"jsonrpc" : "2.0", "error" : {"code": 103, "message": "Failed to move uploaded file."}, "id" : "id"}');
      }
      // Read binary input stream and append it to temp file
      if (!$in = @fopen($_FILES["file"]["tmp_name"], "rb")) {
        die('{"jsonrpc" : "2.0", "error" : {"code": 101, "message": "Failed to open input stream."}, "id" : "id"}');
      }
    } else {
      if (!$in = @fopen("php://input", "rb")) {
        die('{"jsonrpc" : "2.0", "error" : {"code": 101, "message": "Failed to open input stream."}, "id" : "id"}');
      }
    }
    while ($buff = fread($in, 4096)) {
      fwrite($out, $buff);
    }
    @fclose($out);
    @fclose($in);
    rename("{$filePath}_{$chunk}.parttmp", "{$filePath}_{$chunk}.part");
    $index = 0;
    $done = true;
    for( $index = 0; $index < $chunks; $index++ ) {
      if ( !file_exists("{$filePath}_{$index}.part") ) {
        $done = false;
        break;
      }
    }
 
 
 
    if ( $done ) {
      $pathInfo = pathinfo($fileName);
      $hashStr = substr(md5($pathInfo['basename']),8,16);
      $hashName = time() . $hashStr . '.' .$pathInfo['extension'];
      $uploadPath = $uploadDir . DIRECTORY_SEPARATOR .$hashName;
 
      if (!$out = @fopen($uploadPath, "wb")) {
        die('{"jsonrpc" : "2.0", "error" : {"code": 102, "message": "Failed to open output stream."}, "id" : "id"}');
      }
      if ( flock($out, LOCK_EX) ) {
        for( $index = 0; $index < $chunks; $index++ ) {
          if (!$in = @fopen("{$filePath}_{$index}.part", "rb")) {
            break;
          }
          while ($buff = fread($in, 4096)) {
            fwrite($out, $buff);
          }
          @fclose($in);
          @unlink("{$filePath}_{$index}.part");
        }
        flock($out, LOCK_UN);
      }
      @fclose($out);
      $response = array(
        'success'=>true,
        'oldName'=>$oldName,
        'filePath'=>$uploadPath,
        //'fileSize'=>$data['size'],
        'fileSuffixes'=>$pathInfo['extension']
        //'file_id'=>$data['id'],
        );
 
      return (json_encode($response));
    }
 
   // Return Success JSON-RPC response
    die('{"jsonrpc" : "2.0", "result" : null, "id" : "id"}');
   }
   //正则匹配出视频源函数
   function preg_video($file){
     $arr=array();
     preg_match_all("/src=\"(.*)\"/U",$file,$arr);
     return $arr[1];
   }
  
  function success($msg, $url){
    header('content_type:text/html;charset=utf-8');
    echo "<script type='text/javascript'>
      alert('$msg');
      location.href='$url';
      </script>";
    die;
  }
  
   function error($msg, $url){
    header('content_type:text/html;charset=utf-8');
    echo "<script type='text/javascript'>
      alert('$msg');
      location.href='$url';
      </script>";
    die;
  }
  /**
 * 判断后台管理员是否登陆
 */
   function thumb_img($img_path, $thumb_w, $save_path, $is_del = true){
    $image = new \Think\Image(); 
    $image->open($img_path);
    $width = $image->width(); // 返回图片的宽度
    if($width > $thumb_w){
    $width = $width/$thumb_w; //取得图片的长宽比
    $height = $image->height();
    $thumb_h = ceil($height/$width);
    //如果文件路径不存在则创建
    $save_path_info = pathinfo($save_path);
    if(!is_dir($save_path_info['dirname'])) mkdir ($save_path_info['dirname'], 0777);
    $image->thumb($thumb_w, $thumb_h)->save($save_path);
    if($is_del) @unlink($img_path); //删除源文件
}
}
if(!function_exists('check_admin_login')){
  function check_admin_login($url){
    $is_login = empty($_SESSION['aid']) ? 0 : 1;
    if($is_login == 0){
      header('content_type:text/html;charset=utf-8');
      echo "<script type='text/javascript'>
        location.href='$url';
        </script>";
      die;
    }
  }
}
   if(!function_exists('is_mobile')){
    function is_mobile(){ 
      $user_agent = $_SERVER['HTTP_USER_AGENT']; 
      $mobile_agents = Array("240x320","acer","acoon","acs-","abacho","ahong",
      "airness","alcatel","amoi","android","anywhereyougo.com","applewebkit/525",
      "applewebkit/532","asus","audio","aumic","avantogo","becker","benq","bilbo",
      "bird","blackberry","blazer","bleu","cdm-","compal","coolpad","danger",
      "dbtel","dopod","elaine","eric","etouch","fly ","fly_","fly-","go.web",
      "goodaccess","gradiente","grundig","haier","hedy","hitachi","htc","huawei",
      "hutchison","inno","ipad","ipaq","ipod","jbrowser","kddi","kgt","kwc",
      "lenovo","lg ","lg2","lg3","lg4","lg5","lg7","lg8","lg9","lg-","lge-",
      "lge9","longcos","maemo","mercator","meridian","micromax","midp","mini",
      "mitsu","mmm","mmp","mobi","mot-","moto","nec-","netfront","newgen",
      "nexian","nfbrowser","nintendo","nitro","nokia","nook","novarra","obigo",
      "palm","panasonic","pantech","philips","phone","pg-","playstation","pocket",
      "pt-","qc-","qtek","rover","sagem","sama","samu","sanyo","samsung","sch-",
      "scooter","sec-","sendo","sgh-","sharp","siemens","sie-","softbank","sony",
      "spice","sprint","spv","symbian","tablet","talkabout","tcl-","teleca",
      "telit","tianyu","tim-","toshiba","tsm","up.browser","utec","utstar",
      "verykool","virgin","vk-","voda","voxtel","vx","wap","wellco","wig browser",
      "wii","windows ce","wireless","xda","xde","zte"); 
      $is_mobile = false; 
      foreach ($mobile_agents as $device) { 
          if (stristr($user_agent, $device)) { 
              $is_mobile = true; 
              break; 
          } 
      } 
      return $is_mobile; 
   } 
 }
