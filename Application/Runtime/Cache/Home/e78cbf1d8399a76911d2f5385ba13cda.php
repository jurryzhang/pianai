<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>偏爱婚恋官网</title>
		<meta name="Keywords"  />
        <meta name="Description"/>

		<link type="text/css" rel="stylesheet" href="/Public/Home/css/style.css"/>
		<link rel="stylesheet" type="text/css" href="/Public/Home/css/index.css"/>

		<script type="text/javascript"  src="/Public/Home/js/jquery-1.9.1.js"></script>
        <script type="text/javascript" src="/Public/Home/js/comment.js"></script>
        <script type="text/javascript" src="/Public/Home/js/popup.mini.js"></script>
		<style>
			.sequence .sort_a .current {
				color:red;
			}
		</style>
	</head>

	<body>
<div class="top_title">
	<ul>
		<a href="<?php echo U('Index/index');?>">
			<li class="logo"><img src="/Public/Home/image/logo.png"></li>
		</a>

	<?php if($_SESSION['uid']== ''): ?><li class="login_box">
		<input type="text"  placeholder="手机号/用户名" class="username" />
		<input type="password" placeholder="密码" class="password"/>
		<input type="button"  value="登录" class="login_button"/>

	</li>

	<li class="select_box">
		<!-- <a href="Password_reset.html" class="password">忘记密码</a> -->
		<a href="<?php echo U('Index/register_no1');?>" class="register">注册账户</a>
	</li>

	<?php else: ?>
	<li class="select_box">
		<a href="<?php echo U('Userinfo/index',array('u'=>'1'));?>" class="password">个人中心</a>
		<a href="<?php echo U('Login/exitlogin');?>" class="register">退出登录</a>
	</li><?php endif; ?>
	<div class="clearfix"></div>
</ul>
</div>

<script type="text/javascript">
	$(".login_button").click(function(){
   var username=$('.username').val();
   var password=$('.password').val();
   var url="<?php echo U('Login/dologin');?>";
   if(!username || !password){
   	 alert('用户名或密码不能为空');
   	 return false;
   }
   $.post(url,{password:password,username:username},function(data){
        if(data.success=='1'){
        	alert(data.msg);
        	location.href="<?php echo U('Index/Index');?>";
        }else{
        	alert(data.msg);
        	return false;
        }
   },'json')

});
</script>
	</ul>
</div>	
		
<div class="search_box">
  <form action="<?php echo U('Search/find_accurate');?>" method="get" id="seform">	
	<div class="search-top"></div>
  </form>
</div>			
	<!--	<div class="main"></div>-->
			
			<div class="main-box1">
			<div class="main-left">
				<ul class="sequence">
					<?php if($_GET): ?><li><a href="javascript:void(0)" class="sort_a"><i class="sort_a1">综合排序</i></a></li>
						<?php else: ?>
						<li><a href="javascript:void(0)" class="sort_a"><i class="sort_a1 current">综合排序</i></a></li><?php endif; ?>
					<?php if($_GET['sid']!= ''): ?><li><a href="javascript:void(0)" class="sort_a"><i class="sort_a1 current">最新会员  </i></a></li>
						<?php else: ?>
						<li><a href="javascript:void(0)" class="sort_a"><i class="sort_a1">最新会员  </i></a></li><?php endif; ?>
					<?php if($_GET['sage']!= ''): ?><li><a href="javascript:void(0)" class="sort_a"><i class="sort_a1 current">年龄</i></a></li>
						<?php else: ?>
						<li><a href="javascript:void(0)" class="sort_a"><i class="sort_a1">年龄</i></a></li><?php endif; ?>
					<?php if($_GET['sheight']!= ''): ?><li><a href="javascript:void(0)" class="sort_a"><i class="sort_a1 current">身高</i></a></li>
						<?php else: ?>
						<li><a href="javascript:void(0)" class="sort_a"><i class="sort_a1">身高</i></a></li><?php endif; ?>
					<?php if($_GET['smonthly']!= ''): ?><li><a href="javascript:void(0)" class="sort_a"><i class="sort_a1 current">收入</i></a></li>
						<?php else: ?>
						<li><a href="javascript:void(0)" class="sort_a"><i class="sort_a1">收入</i></a></li><?php endif; ?>

					<div class="clearfix"></div>
				</ul>

	    <script>
	       $('.sequence>li').click(function(){
	       	  var i=$(this).index();
	       	  var ul='';
	       	  switch (i){
	       	  	case 0:
                break;
                case 1:
                   ul='sid';
                break;
                case 2:
                    ul='sage';
                break;
                case 3:
                    ul='sheight';
                break;
                default:
                    ul='smonthly';
                break;
	       	  }
	       	  tr="<input type='hidden' name='"+ul+"' value='"+ul+"'>";
	       	  $('.search-top').after(tr);
	       	  $('#seform').submit();
	       })
	    </script>


				<ul class="main-member">
				 <?php if(is_array($user)): $i = 0; $__LIST__ = $user;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li>
					 <?php $piclist = explode(",",substr($vo['photo'],1,strlen($vo['photo']))); ?>
						<a href="<?php echo U('Userinfo/index',array('uid'=>$vo['id']));?>">
						  	<img src="<?php echo ($piclist[0]); ?>" style="width:262px;height:262px;"/>
							<div class="name_title">
								<h1><?php echo ($vo['nickname']); ?></h1>
								<img src="/Public/Home/image/img01_06.png"/>
								<span>v2</span>
								<div class="clearfix"></div>
							</div>
							
							<p>会员号：<?php echo ($vo['id']); ?></p>
                            <p style=" padding: 5px 0 10px;"><?php echo ($vo['agenow']); ?>岁    <?php echo ($vo['wordad']); ?>    <?php echo ($vo['marriage']); ?></p>
                            <p style="padding: 10px 0 20px; border-top: 1px dashed #D9D9D9;">自我介绍：<?php echo (mb_substr($vo['intro'],0,9,'utf-8')); ?>...</p>
                           
                          <div class="member_button">
                          	<img src="/Public/Home/image/img01_30.png"/>
                          	<span id="likeit" data-id="<?php echo ($vo['id']); ?>" onclick="checkD(<?php echo ($vo['id']); ?>)">暗恋她</span>
                          </div> 
					    </a>
					</li><?php endforeach; endif; else: echo "" ;endif; ?>
					<div class="clearfix"></div>
				</ul>
								
			</div>
		

	</div>
	
			<div class="page"><?php echo ($page); ?></div>
<!--底部栏-->
<div class="bgbox">
		<ul class="couter_box">
			<li class="foot_box">
				<dl>
					<dt>
						<img src="/Public/Home/image/img_56.png"/>
						<h2>关于我们</h2>
						<div class="clearfix"></div>
					</dt>
					<dd><a href="<?php echo U('Other/index?nid=1');?>">关于我们</a></dd>
					<!--<dd>媒体报道 </dd>
					<dd>恋爱百科 </dd>
					<dd>招商合作</dd>-->
					<div class="clearfix"></div>
				</dl>
			</li>
			
			<li class="foot_box">
				<dl>
					<dt>
						<img src="/Public/Home/image/img_58.png"/>
						<h2>帮助中心</h2>
						<div class="clearfix"></div>
					</dt>
					<dd><a href="<?php echo U('Other/index?nid=2');?>">会员条款</a></dd>
					<dd><a href="<?php echo U('Other/index?nid=3');?>">常见问题</a></dd>
					<dd><a href="<?php echo U('Other/index?nid=4');?>">征婚提醒</a></dd>
					<div class="clearfix"></div>
				</dl>
			</li>
			
			<li class="foot_box">
				<dl>
					<dt>
						<img src="/Public/Home/image/img_61.png"/>
						<h2>服务热线</h2>
						<div class="clearfix"></div>
					</dt>
					<dd>热线电话：0855-85855200 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;18085055520</dd>
					<dd>地址：贵州省凯里市永丰南路 锐馨鑫园A栋2208</dd>

					<div class="clearfix"></div>
				</dl>
			</li>
			
			<li class="foot_box foot_box4">
				<dl>
					<dt>
						<img src="/Public/Home/image/img_64.png"/>
						<h2>友情链接</h2>
						<div class="clearfix"></div>
					</dt>
					<dd>郑州交友</dd>
					<dd>情缘活动</dd>
					<dd>选秀投票</dd>
					<dd>相亲大会</dd>
					<dd>交友活动</dd>
					<dd>找对象</dd>
					<div class="clearfix"></div>
				</dl>
			</li>
			<div class="clearfix">
				
			</div>
		</ul>
</div>
<script type='text/javascript'>
	(function(){
		 new PopUp_api({el:'.s-jubao',html:'.ddd'});	 
	})()



	
	$("#likeit").click(
 		function(){
 			var _this = $(this);
 			var id = $(this).attr('data-id');
 			alert(id+"sssdf");
 			var url="<?php echo U('User/likeit');?>";
 			// if(confirm('删除后不可恢复,您确认要删除吗？')){
 			// 	$.ajax({
 			// 		type : 'post',
 			// 		data : "id="+id,
 			// 		url  : url,
 			// 		dataType : 'json',
 			// 		success : function(msg){
 			// 			if(msg == 1){
 			// 				alert('删除成功！');
 			// 				_this.parent().parent('tr').remove();
 			// 			}else{
 			// 				alert(msg.error);
 			// 			}
 			// 		}
 			// 	});
 			// }	
 		}
 	);
 	
</script>