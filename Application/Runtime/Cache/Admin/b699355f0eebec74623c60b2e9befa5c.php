<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
			var love = K.create('textarea[name="love"]', {
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
<!--自动跳转js-->
<script type="text/javascript" src="/Public/Admin/js/jquery.min.js"></script>
<script type="text/javascript" src="/Public/Admin/js/skip.js"></script>
</head>
<body>
	<div class="metinfotop">
		<div class="position">简体中文：后台管理 > <a href="javascript:void(0)">添加用户配对</a>
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
<form method="POST" name="myform" enctype="multipart/form-data" action="<?php echo U('Userpd/add');?>" target="_self">

	<table cellpadding="2" cellspacing="1" class="table">
    	<tr>
	        <td class="text"><span class="bi_tian">*</span>男方姓名：</td>
	        <td class="input"><input required="required" name="user1name" class="text" /></td>
	    </tr>
	    <tr>
	        <td class="text"><span class="bi_tian">*</span>男方会员账号：</td>
	        <td class="input"><input required="required" name="user1id" class="text" /></td>
	    </tr>
	    <tr>
	        <td class="text"><span class="bi_tian">*</span>女方姓名：</td>
	        <td class="input"><input required="required" name="user2name" class="text" /></td>
	    </tr>
	    <tr>
	        <td class="text"><span class="bi_tian">*</span>女方会员账号：</td>
	        <td class="input"><input required="required" name="user2id" class="text" /></td>
	    </tr>
	    <tr> 
	        <td class="text"><span class="bi_tian">*</span>牵手时间：</td>
	        <td class="input">
				<select name="userpdn">
				  <option value="请选择">请选择</option>
				  <option value="2017年">2017年</option>
				  <option value="2018年">2018年</option>
				  <option value="2019年">2019年</option>
				  <option value="2020年">2020年</option>
				  <option value="2021年">2021年</option>
				  <option value="2022年">2022年</option>
				  <option value="2023年">2023年</option>
				  <option value="2024年">2024年</option>
				  <option value="2025年">2025年</option>
				  <option value="2026年">2026年</option>
				</select>&nbsp;
				<select name="userpdy">
				  <option value="请选择">请选择</option>
				  <option value="1月">1月</option>
				  <option value="2月">2月</option>
				  <option value="3月">3月</option>
				  <option value="4月">4月</option>
				  <option value="5月">5月</option>
				  <option value="6月">6月</option>
				  <option value="7月">7月</option>
				  <option value="8月">8月</option>
				  <option value="9月">9月</option>
				  <option value="10月">10月</option>
				  <option value="11月">11月</option>
				  <option value="12月">12月</option>
				</select>&nbsp;
				<select name="userpdr">
				  <option value="请选择">请选择</option>
				  <option value="1日">1日</option>
				  <option value="2日">2日</option>
				  <option value="3日">3日</option>
				  <option value="4日">4日</option>
				  <option value="5日">5日</option>
				  <option value="6日">6日</option>
				  <option value="7日">7日</option>
				  <option value="8日">8日</option>
				  <option value="9日">9日</option>
				  <option value="10日">10日</option>
				  <option value="11日">11日</option>
				  <option value="12日">12日</option>
				  <option value="13日">13日</option>
				  <option value="14日">14日</option>
				  <option value="15日">15日</option>
				  <option value="16日">16日</option>
				  <option value="17日">17日</option>
				  <option value="18日">18日</option>
				  <option value="19日">19日</option>
				  <option value="20日">20日</option>
				  <option value="21日">21日</option>
				  <option value="22日">22日</option>
				  <option value="23日">23日</option>
				  <option value="24日">24日</option>
				  <option value="25日">25日</option>
				  <option value="26日">26日</option>
				  <option value="27日">27日</option>
				  <option value="28日">28日</option>
				  <option value="29日">29日</option>
				  <option value="30日">30日</option>
				  <option value="31日">31日</option>
				</select>
			</td>
	    </tr>
	    <tr>
	        <td class="text"><span class="bi_tian">*</span>红娘姓名：</td>
	        <td class="input"><input required="required" name="lovem" class="text" /></td>
	    </tr>
	    <tr>
	        <td class="text"><span class="bi_tian">*</span>红娘ID：</td>
	        <td class="input"><input required="required" name="lovemid" class="text" /></td>
	    </tr>
		<tr> 
	        <td class="text"><span class="bi_tian">*</span>爱情宣言：</td>
	        <td colspan="2" class="text">
			<textarea name="love" style="width:800px;height:300px;">
			</textarea></td>
	    </tr>

		<tr> 
		    <td class="submit" colspan="2">
				<input type="submit" value="添加" class="submit"/>&nbsp;&nbsp;
				<input type="reset" value="重置" class="submit"/>
			</td>
	    </tr>
	</table>
</form><?php endif; ?>
</body>
</html>