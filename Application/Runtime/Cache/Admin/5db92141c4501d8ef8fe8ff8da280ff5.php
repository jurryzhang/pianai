<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="/Public/Admin/images/metinfo.css" />
<link rel="stylesheet" type="text/css" href="/Public/Admin/css/table.css"/>
<script charset="utf-8" src="/Public/Admin/js/jquery.min.js"></script>
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
</head>

<body>
<div class="metinfotop">
	<div class="position">简体中文：后台管理 > <a href="javascript:">偏爱精选分类列表</a></div>
</div>
<div class="clear"></div>
<div id="tablecontent">
	<table cellpadding="2" cellspacing="1" id ="list_table">
		<tr class="th">
			<th width="50px">编号</th>
			<th width="80px">分类名称</th>

			<th width="100px">操作</th>
		</tr>
		<?php if(is_array($love)): $i = 0; $__LIST__ = $love;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr> 
	        <td align="center"><?php echo ($vo["id"]); ?></td>
	        <td align="center"><?php echo ($vo["name"]); ?></td>
	        <td align="center"><a href="<?php echo U('Lovetype/edit',array('id'=>$vo['id']));?>">编辑</a> | <a data-id="<?php echo ($vo["id"]); ?>" class="delete" href="javascript:void(0)">删除</a></td>
	    </tr><?php endforeach; endif; else: echo "" ;endif; ?>
	    <tr class="pagenation">
	    	<td colspan="10"><?php echo ($page); ?></td>
	    </tr>
	</table>
 </div>
 <script>
 	$("a.delete").click(
 		function(){
 			var _this = $(this);
 			var id = $(this).attr('data-id');
 			var url="<?php echo U('Lovetype/delete');?>";
 			if(confirm('删除后不可恢复,您确认要删除吗？')){
 				$.ajax({
 					type : 'post',
 					data : "id="+id,
 					url  : url,
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