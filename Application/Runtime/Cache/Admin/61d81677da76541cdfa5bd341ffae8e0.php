<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="/Public/Admin/images/metinfo.css" />
<link rel="stylesheet" type="text/css" href="/Public/Admin/css/table.css"/>
<link rel="stylesheet" href="/Public/Admin/kindeditor-4.1.10/themes/default/default.css" />
<link rel="stylesheet" href="/Public/Admin/kindeditor-4.1.10/plugins/code/prettify.css" />
<script charset="utf-8" src="/Public/Admin/js/jquery.min.js"></script>
<script charset="utf-8" src="/Public/Admin/kindeditor-4.1.10/kindeditor.js"></script>
<script charset="utf-8" src="/Public/Admin/kindeditor-4.1.10/lang/zh_CN.js"></script>
<script charset="utf-8" src="/Public/Admin/kindeditor-4.1.10/plugins/code/prettify.js"></script>
<style>
    .link a{
    	text-decoration: none;
        padding:3px 5px;
        margin:0 3px;
        border:1px solid #0291d4;
        background-color:white;
    }
    .link .current{
        padding:3px 5px;
        margin:0 3px;
        border:1px solid #0291d4;
        color:white;
        background-color:#0291d4;
    }
</style>
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
	<div class="position">简体中文：后台管理 > <a href="javascript:">管理员列表</a></div>
</div>
<div class="clear"></div>
<div id="tablecontent">
	<table cellpadding="2" cellspacing="1" id ="list_table">
		<tr class="th">
			<th width="50px">编号</th>
			<th width="100px"> 文章标题</th> 
			<th width="100px">文章简介</th>
			<th width="100px"> 文章内容</th>
            <th width="100px"> 发布时间</th>       
			 
			<th width="100px">操作</th>
		</tr>
		<?php if(is_array($result)): foreach($result as $key=>$item): ?><tr> 
	        <td align="center"><?php echo ($item["tid"]); ?></td>
	        <td align="center"><?php echo ($item["title"]); ?></td>
	        <td align="center"><?php echo ($item["intro"]); ?></td>
	        <td align="center"><?php echo (msubstr($item["content"],0,30,'utf-8')); ?></td>

	        <td align="center"><?php echo (date("Y-m-d",$item["addtime"])); ?></td>


	        <td align="center"><a href="<?php echo U('Voteht/edit',array('tid'=>$item['tid']));?>">编辑</a> | <a data-id="<?php echo ($item["tid"]); ?>" class="delete" href="javascript:void(0)">删除</a></td>
	    </tr><?php endforeach; endif; ?>
	    <tr class="pagenation">
	    	<td colspan="10"><?php echo ($page); ?></td>
	    </tr>
	</table>
 </div>
 <script>
 	$("a.delete").click(
 		function(){
 			var _this = $(this);
 			var tid = $(this).attr('data-id');
 			if(confirm('删除后不可恢复,您确认要删除吗？')){
 				$.ajax({
 					type : 'post',
 					data : "tid="+tid,
 					url  : "del",
 					dataType : 'json',
 					success : function(msg){
 						if(msg == 1){
 							alert('删除成功！');
 							_this.parent().parent('tr').remove();
 						}else{
 							alert(msg.error);
 						}
 					}
 				});
 			}	
 		}
 	);
 </script>
</body>
</html>