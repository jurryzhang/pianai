<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="/Public/Admin/images/metinfo.css" />

<link rel="stylesheet" type="text/css" href="/Public/Admin/css/success.css" />
<!--加载编辑器-->
<link rel="stylesheet" type="text/css" href="/Public/Admin/images/metinfo.css" />
<link rel="stylesheet" href="/Public/Admin/kindeditor-4.1.10/themes/default/default.css" />
	<link rel="stylesheet" href="/Public/Admin/kindeditor-4.1.10/plugins/code/prettify.css" />
	<script charset="utf-8" src="/Public/Admin/kindeditor-4.1.10/kindeditor.js"></script>
	<script charset="utf-8" src="/Public/Admin/kindeditor-4.1.10/lang/zh_CN.js"></script>
	<script charset="utf-8" src="/Public/Admin/kindeditor-4.1.10/plugins/code/prettify.js"></script>
	<script>
		KindEditor.ready(function(K) {
			var love = K.create('textarea[name="video"]', {
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
				},
				items:['preview','media','flash']
			});
			prettyPrint();
		});
	</script>
<!--自动跳转js-->
<script type="text/javascript" src="/Public/Admin/js/jquery.min.js"></script>
<script type="text/javascript" src="/Public/Admin/js/skip.js"></script>
</head>
<body>
	<div class="metinfotop">
		<div class="position">简体中文：后台管理 > <a href="javascript:void(0)">添加视频</a>
		</div>
	</div>
	<div class="clear"></div>
<?php if($status == 1): ?><div class="main">
		<div class="suc">
			<p class="suc_alert"><img src="/Public/Admin/images/suc.png">信息添加成功！ <span id = "skip"><b class="jump">3</b> 秒钟后自动跳转回信息列表...</span></p>
			<p>【<a href="check">信息列表</a>】【<a href="add">继续添加</a>】</p>
		</div>
	</div>
	<script>skip("<?php echo U('Admin/usercheck');?>");</script>
<?php else: ?>
<div class="stat_list">
	<ul>
		<li class="now"><a href="javascript:void(0)" title="基本信息">基本信息</a></li>
	</ul>
</div>
<form method="POST" name="myform" enctype="multipart/form-data" action="<?php echo U('Video/add');?>" target="_self">

	<table cellpadding="2" cellspacing="1" class="table">
	   <tr> 
	    <td class="text"><span class="bi_tian">*</span>视频分类: </td>
	     <td class="input">
	         <select name="ltid">
                <?php if(is_array($love)): $i = 0; $__LIST__ = $love;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo['id']); ?>"><?php echo ($vo['name']); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
			  </select>  
		  </td>
	    </tr>
		<tr> 
	        <td class="text"><span class="bi_tian">*</span>添加视频：</td>
	        <td colspan="2" class="text">
			<textarea name="video" style="width:100%;height:500px;">
			</textarea></td>
	    </tr>

		<tr style="text-align:center"> 
		    <td class="submit">
				<input type="submit" value="保存" class="submit"/>	
			</td>
	    </tr>
	</table>
</form><?php endif; ?>
</body>
</html>