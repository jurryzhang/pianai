<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="/Public/Admin/images/metinfo.css" />
<link rel="stylesheet" href="/Public/Admin/kindeditor-4.1.10/themes/default/default.css" />
<link rel="stylesheet" type="text/css" href="/Public/Admin/css/success.css" />
<link rel="stylesheet" href="/Public/Admin/kindeditor-4.1.10/plugins/code/prettify.css" />
<script charset="utf-8" src="/Public/Admin/kindeditor-4.1.10/kindeditor.js"></script>
<script charset="utf-8" src="/Public/Admin/kindeditor-4.1.10/lang/zh_CN.js"></script>
<script charset="utf-8" src="/Public/Admin/kindeditor-4.1.10/plugins/code/prettify.js"></script>
<script type="text/javascript" src="/Public/Admin/js/jquery.js"></script>
<!--自动跳转js-->
<script type="text/javascript" src="/Public/Admin/js/jquery.min.js"></script>
<script type="text/javascript" src="/Public/Admin/js/skip.js"></script>
<script>
        KindEditor.ready(function(K) {
            var editor1 = K.create('textarea[name="content"]', {
                cssPath : '/Public/Admin/kindeditor-4.1.10/plugins/code/prettify.css',
                uploadJson : '/Public/Admin/kindeditor-4.1.10/php/upload_json.php',
                fileManagerJson : '/Public/Admin/kindeditor-4.1.10/php/file_manager_json.php',
                allowFileManager : true,
                afterCreate : function() {
                    var self = this;
                    K.ctrl(document, 13, function() {
                        self.sync();
                        K('form[name=example]')[0].submit();
                    });
                    K.ctrl(self.edit.doc, 13, function() {
                        self.sync();
                        K('form[name=example]')[0].submit();
                    });
                }
            });
            prettyPrint();
        });
    </script>
</head>
<body>
    <div class="metinfotop">
        <div class="position">简体中文：后台管理 > <a href="javascript:void(0)">添加文章</a>
        </div>
    </div>
    <div class="clear"></div>
<div class="stat_list">
    <ul>
        <li class="now"><a href="javascript:void(0)" title="基本信息">添加文章</a></li>
    </ul>
</div>
<form method="POST" name="myform" action="<?php echo U('Voteht/save');?>" enctype="multipart/form-data" >
    <table cellpadding="2" cellspacing="1" class="table">
        <tr> 
            <td class="text"><span class="bi_tian">*</span>文章标题:</td>
            <td class="input"><input required="required" name="title" type="text" class="text" /></td>
        </tr>
        <tr> 
            <td class="text"><span class="bi_tian">*</span>文章简介:</td>
            <td class="input"><input required="required" name="intro"  type="text"  class="text"/>
            </td>
        </tr>
         <tr> 
        <td class="text"><span class="bi_tian">*</span>案例图片：</td>
        <td class="input">
              <input name="thumb" type="file" id="file_upload" />
              <script type='text/javascript'>
                $(document).ready(function(){
                  metuploadify('#file_upload','upimage','met_logo');
                });
              </script>  
       </td>
    </tr>
    <tr>
        <td class="text"><span class="bi_tian">*</span>文章内容：</td>
          <td colspan="2" class="text">
              <textarea name="content" style="width:800px;height:300px;">
                   
              </textarea>   
          </td>
    </tr>   
        <tr> 
            <td class="text"></td>
            <td class="submit">
                <input type="submit" value="保存" class="submit"/>    
            </td>
        </tr>
    </table>
</form>
</body>
</html>