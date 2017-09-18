<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="/Public/Admin/images/metinfo.css" />
<link rel="stylesheet" href="/Public/Admin/kindeditor-4.1.10/themes/default/default.css" />
	<link rel="stylesheet" href="/Public/Admin/kindeditor-4.1.10/plugins/code/prettify.css" />
	<script charset="utf-8" src="/Public/Admin/kindeditor-4.1.10/kindeditor.js"></script>
	<script charset="utf-8" src="/Public/Admin/kindeditor-4.1.10/lang/zh_CN.js"></script>
	<script charset="utf-8" src="/Public/Admin/kindeditor-4.1.10/plugins/code/prettify.js"></script>
	<script>
		KindEditor.ready(function(K) {
			var editor1 = K.create('textarea[name="editor01"]', {
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
	<div class="position">简体中文：店铺管理 > <a href="<?php echo U('News/edit');?>">修改店铺</a></div>
<?php echo ($data); ?>
	</div>
	<div class="clear"></div>


<div class="stat_list">
	<ul>
		<li class="now"><a href="#" title="基本信息">基本信息</a></li>
	    <li class="now"><a href="#" title="商铺列表">内容添加</a></li>
	</ul>
</div>
<form method="POST" name="myform" enctype="multipart/form-data" action="<?php echo U('News/doAdd');?>" target="_self">

<table cellpadding="2" cellspacing="1" class="table">

    <tr> 
        <td class="text"><span class="bi_tian">*</span>标题：</td>
        <td class="input"><input name="title" placeholder="请填写标题"  type="text" class="text" value="<?php echo ($data["title"]); ?>" /></td>
    </tr>
      <tr> 
        <td class="text"><span class="bi_tian">*</span>标签:</td>
        <td class="input"><input name="tags" placeholder="标签"  type="text" class="text" value="<?php echo ($data["tags"]); ?>" /></td>
    </tr>
       <tr> 
        <td class="text"><span class="bi_tian">*</span>简介：</td>
        <td class="input"><input name="cons" placeholder="简介"  type="text" class="text" value="<?php echo ($data["title"]); ?>" /></td>
    </tr>
  <tr> 
        <td class="text"><span class="bi_tian">*</span>案例图片：</td>
        <td class="input upload">
		 
			<input name="thumb" type="file" id="file_upload" />
			<script type='text/javascript'>
				$(document).ready(function(){
					metuploadify('#file_upload','upimage','met_logo');
				});
			</script>		</td>
    </tr>
	
    
    <tr> 
        <td class="text"><span class="bi_tian">*</span>类型：</td>
        <td class="input">
        <input name="type" type="radio"  value="1" checked="checked" />
			爱在旅途&nbsp;&nbsp;&nbsp;
			<input name="type" type="radio"    value="0" />个人形象&婚恋教育&nbsp;&nbsp;&nbsp;
			
			
			<input name="type" type="radio"  value="2" />个性娱乐节目&nbsp;&nbsp;&nbsp;
			<input name="type" type="radio"  value="3" />马尔代夫恋&nbsp;&nbsp;&nbsp;
			<input name="type" type="radio"  value="4" />企业介绍&nbsp;&nbsp;&nbsp;
		<input name="type" type="radio"  value="5" />会员条款&nbsp;&nbsp;&nbsp;
		<input name="type" type="radio"  value="6" />常见问题&nbsp;&nbsp;&nbsp;
		<input name="type" type="radio"  value="6" />征婚提醒&nbsp;&nbsp;&nbsp;
		
		
		</if>
		</td>
    </tr>
    <tr> 
        <td class="text"><span class="bi_tian">*</span>顺序：</td>
        <td class="input"><input name="sequence" placeholder="请填写标题"  type="text" class="text"  /></td>
    </tr>
     <!-- <tr> 
        <td class="text"><span class="bi_tian">*</span>是否推荐：</td>
        <td class="input">
        	<?php if($data['is_push'] == 0): ?><input name="is_push" type="radio"  checked="checked"  value="0" />否&nbsp;&nbsp;&nbsp;
			<input name="is_push" type="radio"  value="1" />
			是
			<?php else: ?>
            <input name="is_push" type="radio"    value="0" />否&nbsp;&nbsp;&nbsp;
			<input name="is_push" type="radio" checked="checked" value="1" />
			是<?php endif; ?>
		</td>
    </tr>
  -->
    <tr>
      <td class="text"><span class="bi_tian">*</span>内容：</td>
      <td colspan="2" class="text">
			<textarea name="editor01" style="width:800px;height:300px;">
            <?php echo ($data["intro"]); ?>
			</textarea>		
		</td>
    </tr> 	
	<tr> 
        <td class="text"></td>
	    <td class="submit">
		<input type="submit" name="submit1" value="添加" class="submit" onclick="return Smit($(this),'myform')" />		</td>
    </tr>
  </table>
</form>

</body>
</html>