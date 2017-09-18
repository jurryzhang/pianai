<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="/Public/Admin/images/metinfo.css" />

<link rel="stylesheet" type="text/css" href="/Public/Admin/css/success.css" />

<!--自动跳转js-->
<script type="text/javascript" src="/Public/Admin/js/jquery.min.js"></script>
<script type="text/javascript" src="/Public/Admin/js/skip.js"></script>

</head>

<body>

	<div class="metinfotop">
		<div class="position">简体中文：后台管理 > <a href="javascript:void(0)">偏爱精选分类</a>
		</div>
	</div>
	<div class="clear"></div>
<?php if($status == 1): ?><div class="main">
		<div class="suc">
			<p class="suc_alert"><img src="/Public/Admin/images/suc.png">信息添加成功！ <span id = "skip"><b class="jump">3</b> 秒钟后自动跳转回信息列表...</span></p>
			<p>【<a href="check">信息列表</a>】【<a href="add">继续添加</a>】</p>
		</div>
	</div>
	<script>skip("<?php echo U('Lovetype/index');?>");</script>
<?php else: ?>
<div class="stat_list">
	<ul>
		<li class="now"><a href="javascript:void(0)" title="偏爱精选分类">偏爱精选分类</a></li>
	</ul>
</div>
<form method="POST" name="myform" action="">
	<table cellpadding="2" cellspacing="1" class="table">
	    <tr> 
	        <td class="text"><span class="bi_tian">*</span>偏爱精选分类名称：</td>
	        <td class="input"><input required="required" name="name" type="text" class="text" /></td>
	    </tr>
		<tr> 
	        <td class="text"></td>
		    <td class="submit">
				<input type="submit" value="保存" class="submit"/>	
			</td>
	    </tr>
	</table>
</form><?php endif; ?>
</body>
</html>