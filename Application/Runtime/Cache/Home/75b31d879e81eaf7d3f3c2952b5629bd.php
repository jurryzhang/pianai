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
		
		<div class="main">
			<div class="main-box1">
				
				
				<div class="main-left"><!--left-->
					<div class="s-address">当前位置：<a href="">首页 </a>&gt; 个人形象
					&婚恋教育</div>
					<ul class="success">
						<?php if(is_array($newslist)): $i = 0; $__LIST__ = $newslist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li>
							<a href="" class="success-pic">
							<img style="width:180px;height:160px;" src="/Public/Uploads/news/<?php echo ($vo['thumb']); ?>" ></a>

							<div class="success-text">
            	               <a href=""><?php echo ($vo['title']); ?></a>
                               <h5>时间：<?php echo ($vo['upTime']); ?><span style="color: #bbb;">|</span>来源：<?php echo ($vo['tags']); ?></h5>
                               <p> <?php echo ($vo['cons']); ?></p>        
                               <p><a href="" class="cf60">[查看详情]</a></p>
							</div>
						</li><?php endforeach; endif; else: echo "" ;endif; ?>
					</ul>
					
					<div class="page">
					
				    	<div colspan="10"><?php echo ($page); ?></div>
				    <div>
					
				</div><!--left-->
			</div>
			

		</div>
	
		
	
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

	
		  <script>
        $(".css3-animated-example").collapse({
          accordion: true,
          open: function() {
            this.addClass("open");
            this.css({ height: this.children().outerHeight() });
          },
          close: function() {
            this.css({ height: "0px" });
            this.removeClass("open");
          }
        });
      </script>