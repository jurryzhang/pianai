<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="/Public/Admin/images/metinfo.css" />
<link rel="stylesheet" type="text/css" href="/Public/Admin/css/table.css"/>

<script charset="utf-8" src="/Public/Admin/js/jquery.min.js"></script>

</head>

<body>
<div class="metinfotop">
    <div class="position">简体中文：店铺管理 > <a href="javascript:">商铺列表</a></div>
</div>
<div class="clear"></div>
<div id="tablecontent">
    <table cellpadding="2" cellspacing="1" id ="list_table">
        <tr class="th">
              <th width="20">序号</th>
            <th width="50">标题</th>
            <th width="80">内容</th>
          
            <th width="100">添加时间</th>
            <th width="100">修改时间</th>
            <th width="100">优先级</th>
            <th width="100">编辑</th>
            <th width="100">删除</th>
        </tr>
         <?php $i =1;?>
        <?php if(is_array($news)): foreach($news as $key=>$item): ?><tr> 
            <td align="center"><?php echo $i; $i++;?></td>
            <td align="center"><?php echo ($item["title"]); ?></td>
            <td align="center"><?php echo (msubstr($item["intro"],0,11,'utf-8')); ?></td>
           
         
            <td align="center"><?php echo (date("Y-m-d",$item["addTime"])); ?></td>
            <td align="center"><?php echo (date("Y-m-d",$item["upTime"])); ?></td>
            <td align="center">
             <input value="<?php echo ($item["sequence"]); ?>"  id="sequence" class="sequence" style="width:40px; background: transparent;border:none;"/>
           <input value="<?php echo ($item["id"]); ?>"  id="id" type="hidden"/>
           <input value="<?php echo ($item["sequence"]); ?>"  id="sequence1" type="hidden"/>
            </td>
         
          
            <td align="center"><a href="<?php echo U('News/edit',array('id'=>$item['id'],'type'=>$_GET['type']));?>">编辑</a> </td>
            <td align="center"> <a data-id="<?php echo U('News/del',array('id'=>$item['id']));?>" class="delete" href="javascript:void(0)">删除</a></td>
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
            var aid = $(this).attr('data-id');
            if(confirm('删除后不可恢复,您确认要删除吗？')){
                /*$.ajax({
                    type : 'post',
                    data : "aid="+aid,
                    url  : "del",
                    dataType : 'json',
                    success : function(msg){
                        if(msg.errno == 0){
                            alert('删除成功！');
                            _this.parent().parent('tr').remove();
                        }else{
                            alert(msg.error);
                        }
                    }
                });*/
            window.location.href=aid;
            }   
        }
    );
	
	$(".sequence").click(function(){
		$(this).parent().find("input").focus();
		
	}).blur(function(){
		var seq = $(this).parent().find("#sequence");
		  var seq_num = seq.val();	 
		var cid=$(this).parent().find("#id").val();
		var seqold =$(this).parent().find("#sequence1");
		if(seqold.val()!=seq_num){
		      $.ajax({
                        type : 'post',
                        data : "id="+cid+"&sequence="+seq_num,
                        url  : "<?php echo U('News/updete_seq');?>",
                        success : function(msg){
						  if(msg==1){
							  seqold.val(seq_num);
							  
							  }
                        }
                    });
		}
	});
 </script>
</body>
</html>