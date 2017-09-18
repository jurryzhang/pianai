<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="/Public/Admin/images/metinfo.css" />
<link rel="stylesheet" type="text/css" href="/Public/Admin/css/table.css"/>
<script charset="utf-8" src="/Public/Home/js/jquery-1.8.3.js"></script>
<link rel="stylesheet" href="/Public/Admin/kindeditor-4.1.10/themes/default/default.css" />
	<link rel="stylesheet" href="/Public/Admin/kindeditor-4.1.10/plugins/code/prettify.css" />
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
     <style>

.imglist{clear:both;height:40px; }

.imgitem{position:relative;  width: 40px;height: 40px; float:left;}

.imglistid{clear:both;height:40px; }

.imgitemid{position:relative;  width: 40px;height: 40px; float:left;}
.imgdelete{position:absolute; top: 4px; right: 4px; width: 10px; z-index: 1;}
  </style>
</style>
<script type="text/javascript">
	var n=0;
	KindEditor.ready(function(K) {
				var editor2 = K.editor({
					 allowImageRemote : false,
					allowFileManager : false
				});
				K('#image2').click(function() {

					editor2.loadPlugin('image', function() {
						editor2.plugin.imageDialog({
							imageUrl : K('#urlid').val(),
							clickFn : function(url) {
								
							
								K('#urlid').val(K('#urlid').val()+","+url.replace('/pahl/Public/Admin/kindeditor-4.1.10/attached/image',''));
						n++;
								K('#imgliid').append('<li class="imgitem" ><img src='+url+'  style="width:100%; height: 100%;"><a class="deleteimg" href="javascript:void(0);" data-id='+url+'><img src="/Public/Home/image/delete.png" class="imgdelete"></a></li>');
								
                                     K('#image2').hide();
									
								editor2.hideDialog();
							}
						});
					});
				});
			
			
			});
</script>
</head>

<body>
<div class="metinfotop">
	<div class="position">简体中文：后台管理 > <a href="javascript:">用户列表</a></div>
</div>
<div class="clear"></div>
<div id="tablecontent">
	<table cellpadding="2" cellspacing="1" id ="list_table">
		<tr class="th">
			<th width="50px">编号</th>
			<th width="60px">用户名</th>
			<th width="80px">用户昵称</th>
			<th width="50px">性别</th>
			<th width="50px">年龄段</th>
			<th width="80px">学历</th>
			<th width="100px">上次登陆时间</th>
			<th width="100px">登陆IP</th>
			<th width="100px">视频名字</th>
			<th width="80px">是否是会员</th>
            <th width="100px">推荐</th>
                  

			<th width="100px">操作</th>
		</tr>
		<?php if(is_array($user)): $i = 0; $__LIST__ = $user;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr> 
	        <td align="center"><?php echo ($vo["id"]); ?></td>
	        <td align="center"><?php echo ($vo["name"]); ?></td>
	        <td align="center"><?php echo ($vo["nickname"]); ?></td>
	        <td align="center"><?php if($vo['sex']=='1'){ echo "男";}else{ echo "女";}?></td>
	        <td align="center"><?php echo ($vo["age"]); ?></td>
	        <td align="center"><?php echo ($vo["qualification"]); ?></td>
	        <td align="center"><?php echo (date('Y-m-d H:i',$vo["logintime"])); ?></td>
	        <td align="center"><?php echo (long2ip($vo["loginip"])); ?></td>
	          <td align="center"><?php echo ($vo["vcrpath"]); ?></td>
	        
	        <!--是否是会员--> 
			<td align="center">
	        <?php if($vo['ismember'] == '1'): ?><input name="isuserm<?php echo ($vo['id']); ?>" type="radio" value="1" checked />是 
	        <input name="isuserm<?php echo ($vo['id']); ?>" type="radio" value="0"  />否</td>
	        <?php else: ?>
            <input name="isuserm<?php echo ($vo['id']); ?>" type="radio" value="1"  />是 
	        <input name="isuserm<?php echo ($vo['id']); ?>" type="radio" value="0" checked/>否</td><?php endif; ?>
			  

	        <td align="center">

	        <?php if($vo['isrecom'] == '1'): ?><input name="isrecom<?php echo ($vo['id']); ?>" type="radio" value="1" checked />是 
	        <input name="isrecom<?php echo ($vo['id']); ?>" type="radio" value="0"  />否</td>
	        <?php else: ?>
            <input name="isrecom<?php echo ($vo['id']); ?>" type="radio" value="1"  />是 
	        <input name="isrecom<?php echo ($vo['id']); ?>" type="radio" value="0" checked/>否</td><?php endif; ?>

	         <td align="center"><a class="addvcr" data-id="<?php echo ($vo["id"]); ?>" href="javascript:void(0)">上传vcr</a> |
	       <a href="<?php echo U('User/edit',array('id'=>$vo['id']));?>">查看</a> | <a data-id="<?php echo ($vo["id"]); ?>" class="delete" href="javascript:void(0)">删除</a></td>
	    </tr><?php endforeach; endif; else: echo "" ;endif; ?>
	    <tr class="pagenation">
	    	<td colspan="10"><?php echo ($page); ?></td>
	    </tr>
	</table>
 </div>

<style>
.addcon{background:#fff;display: none;width:300px;height: 100px;border:1px solid #eee;position: absolute; top: 20%;left: 30%;}
</style>
 <div class="addcon">
<form method="POST" name="myform" enctype="multipart/form-data" action="<?php echo U('User/doAddvcr');?>" target="_self">
<input name="uid" type="text" id="aimuid" value="" />
<<!-- input type="hidden" style="margin-left:10px;" id="urlid" name="idcardpic" value="">
                     <input style="margin-left:5px; margin-right:50px;padding:0 10px; line-height:20px; border-radius:4px;" type="button" id="image2" value="选择图片">
                     <div class="imglistid"> <ul id="imgliid"></ul></div> -->

<input name="thumb" type="file" id="file_upload" />

			<script type='text/javascript'>
				$(document).ready(function(){
					metuploadify('#file_upload','upimage','met_logo');
				});
			</script>
		<input type="submit" name="submit1" value="添加" class="submit"  />
</form>
</div>

 <script>
 	$("a.delete").click(
 		function(){
 			var _this = $(this);
 			var id = $(this).attr('data-id');
 			var url="<?php echo U('User/delete');?>";
 			if(confirm('删除后不可恢复,您确认要删除吗？')){
 				$.ajax({
 					type : 'post',
 					data : "id="+id,
 					url  : url,
 					
 					success : function(msg){
 						if(msg == 1){
 							alert('删除成功！');
 							_this.parent().parent('tr').remove();
 						}else{
 							alert("删除失败！");
 						}
 					}
 				});
 			}	
 		}
 	);

 

  $(":radio").click(function(){
   var id = $(this).attr('name');
			if(id.indexOf("user") > 0 ){
			    var type = "1";
			}else{
				var type = "2";
			}
 			var isrecom = $(this).val();
 			var z=id.indexOf('m')+1;
 			var aimid=id.substring(z,id.length);
 			alert(aimid+"//"+isrecom);
         var url="<?php echo U('User/updaterecom');?>";
 			 $.ajax({
 					type : 'post',
 					data : "uid="+aimid+"&isrecom="+isrecom+"&type="+type,
 					url  : url,
 					success : function(msg){
 						if(msg == 1){
 						//	alert('成功！');
 							
 						}else{
 						alert('失败！');
 						}
 					}
 				});
  });

$(".imglistid ul").on("click","li a", function() { 
            var _this = $(this);
           //  var aim1 = _this.attr('data-id').replace(',/pahl/Public/Admin/kindeditor-4.1.10/attached/image','');
           //  alert(aim1);
           // var aimurl= $("#urlid").val().replace(aim1, "");
           // alert(aimurl);
            var aimurl= $("#urlid").val().replace(","+_this.attr('data-id').replace('/pahl/Public/Admin/kindeditor-4.1.10/attached/image',''), "");
             $("#urlid").val(aimurl);
 			var imgsrc = _this.attr('data-id').replace("/pahl", ".");
 			//alert(imgsrc.replace("/pahl", "."));
 			var url="<?php echo U('User/deleteimg');?>";
               	$.ajax({
 					type : 'post',
 					data : "imgsrc="+imgsrc,
 					url  : url,
 					//dataType : 'json',
 					success : function(msg){
 						if(msg != 0){
 							
                               $('#image2').show();
							
 							alert('成功！');
 							_this.parent('li').remove();
 						}else{
 							alert('出错了！');
 						}
 					}
 				});
 			

 });

	$("a.addvcr").click(function () {
 		 $(".addcon").show();
 		  var id = $(this).attr('data-id');
 		  $("#aimuid").val(id);
 	});
 </script>
</body>
</html>