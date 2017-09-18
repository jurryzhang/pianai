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
  <form action="<?php echo U('Search/index');?>" method="get" id="seform">	
	<div class="search-top">
		
					<!--<div class="search">
						<input type="text" placeholder="更多心仪对象，请搜索" />
						<button class="search-btn"><img src="/Public/Home/image/search.png"/></button>
					</div>
					-->
					<h1>条件查找</h1>
					<ul class="search-find">
						<li>
							<span>性&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;别：</span>
							<select name="sex">
							<?php if($search['sex']=='1'){ ?>
								<option value="1" selected>男</option>
								<option value="2">女</option>
							<?php }else{?>
							     <option value="1">男</option>
								 <option value="2" selected>女</option>
							<?php }?>
							</select>
						</li>
						<li>
							<span>年&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;龄：</span>
							<select name="age">
							<?php if($search['age']=='35以上'){ ?>
								<option value="-1">不限</option>
								<option value="20~25">20~25</option>
								<option value="25~30">25~30</option>
								<option value="30~35">30~35</option>
								<option value="35以上" selected>35以上</option>
							<?php }else if($search['age']=='20~25'){?>
							    <option value="-1">不限</option>
								<option value="20~25" selected>20~25</option>
								<option value="25~30">25~30</option>
								<option value="30~35">30~35</option>
								<option value="35以上">35以上</option>
							<?php }else if($search['age']=='25~30'){?>
							    <option value="-1">不限</option>
								<option value="20~25">20~25</option>
								<option value="25~30" selected>25~30</option>
								<option value="30~35">30~35</option>
								<option value="35以上">35以上</option>
							<?php }else if($search['age']=='30~35'){?>
							    <option value="-1">不限</option>
								<option value="20~25">20~25</option>
								<option value="25~30">25~30</option>
								<option value="30~35" selected>30~35</option>
								<option value="35以上">35以上</option>
							<?php }else{?>
							    <option value="-1" selected>不限</option>
								<option value="20~25">20~25</option>
								<option value="25~30">25~30</option>
								<option value="30~35">30~35</option>
								<option value="35以上">35以上</option>
							<?php }?>
							</select>
						</li>
								<li>
							<span>身&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;高：</span>
							<select name="height">
							<?php if($search['height']=='180以上'){ ?>
								<option value="-1" selected>不限</option>
								<option value="170~175">170~175</option>
								<option value="175~180">175~180</option>
								<option value="180以上">180以上</option>
							<?php }else if($search['height']=='170~175'){?>
							    <option value="-1">不限</option>
								<option value="170~175" selected>170~175</option>
								<option value="175~180">175~180</option>
								<option value="180以上">180以上</option>
							<?php }else if($search['height']=='175~180'){?>
							    <option value="-1">不限</option>
								<option value="170~175">170~175</option>
								<option value="175~180" selected>175~180</option>
								<option value="180以上">180以上</option>
							<?php }else{?>
							    <option value="-1" selected>不限</option>
								<option value="170~175">170~175</option>
								<option value="175~180">175~180</option>
								<option value="180以上">180以上</option>
							<?php }?>
							</select>
						</li>
						<li>
							<span>住&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;房：</span>
							<select name="housing">
							<?php if($search['housing']=='1'){ ?>
								<option value="-1">不限</option>
								<option value="2">已购房（无贷款）</option>
								<option value="1" selected>已购房（有贷款）</option>
							<?php }else if($search['housing']=='2'){?>
							    <option value="-1">不限</option>
								<option value="2" selected>已购房（无贷款）</option>
								<option value="1">已购房（有贷款）</option>	
							<?php }else{?>	
								<option value="-1" selected>不限</option>
								<option value="2">已购房（无贷款）</option>
								<option value="1">已购房（有贷款）</option>
							<?php }?>
							</select>
						</li>
								<li>
							<span>收&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;入：</span>
							<select name="monthly">
							<?php if($search['monthly']=='20000以上'){ ?>
								<option value="-1">不限</option>
								<option value="5000以下">5000以下</option>
								<option value="5000~10000">5000~10000</option>
								<option value="10000~20000">10000~20000</option>
								<option value="20000以上" selected>20000以上</option>
							<?php }else if($search['housing']=='5000以下'){?>
							    <option value="-1">不限</option>
								<option value="5000以下" selected>5000以下</option>
								<option value="5000~10000">5000~10000</option>
								<option value="10000~20000">10000~20000</option>
								<option value="20000以上">20000以上</option>
							<?php }else if($search['housing']=='5000~10000'){?>
							    <option value="-1">不限</option>
								<option value="5000以下">5000以下</option>
								<option value="5000~10000" selected></option>
								<option value="10000~20000">10000~20000</option>
								<option value="20000以上">20000以上</option>
							<?php }else if($search['housing']=='10000~20000'){?>
							    <option value="-1">不限</option>
								<option value="5000以下">5000以下</option>
								<option value="5000~10000">5000~10000</option>
								<option value="10000~20000" selected>10000~20000</option>
								<option value="20000以上">20000以上</option>
							<?php }else{?>	
							    <option value="-1" selected>不限</option>
								<option value="5000以下">5000以下</option>
								<option value="5000~10000">5000~10000</option>
								<option value="10000~20000">10000~20000</option>
								<option value="20000以上">20000以上</option>
							<?php }?>	
							</select>
						</li>
						<li>
							<span>婚姻状况：</span>
							<select name="marriage">
							<?php if($search['marriage']=='2'){ ?>
								<option value="-1">不限</option>
								<option value="3">未婚</option>
								<option value="1">离婚</option>
								<option value="2" selected>丧偶</option>
							<?php }else if($search['marriage']=='3'){?>
							    <option value="-1">不限</option>
								<option value="3" selected>未婚</option>
								<option value="1">离婚</option>
								<option value="2">丧偶</option>
							<?php }else if($search['marriage']=='1'){?>
							    <option value="-1">不限</option>
								<option value="3">未婚</option>
								<option value="1" selected>离婚</option>
								<option value="2">丧偶</option>
							<?php }else{?>
							    <option value="-1" selected>不限</option>
								<option value="3">未婚</option>
								<option value="1">离婚</option>
								<option value="2">丧偶</option>
							<?php }?>
							</select>
						</li>
								<li>
							<span>有无小孩：</span>
							<select name="child">
							<?php if($search['child']=='2'){ ?>
								<option value="-1">不限</option>
								<option value="3">无</option>
								<option value="1">有，不同住</option>
								<option value="2" selected>有，同住</option>
							<?php }else if($search['child']=='3'){ ?>
							    <option value="-1">不限</option>
								<option value="3" selected>无</option>
								<option value="1">有，不同住</option>
								<option value="2">有，同住</option>
							<?php }else if($search['child']=='1'){ ?>
							    <option value="-1">不限</option>
								<option value="3">无</option>
								<option value="1" selected>有，不同住</option>
								<option value="2">有，同住</option>
							<?php }else{?>
							    <option value="-1" selected>不限</option>
								<option value="3">无</option>
								<option value="1">有，不同住</option>
								<option value="2">有，同住</option>
							<?php }?>
							</select>
						</li>
						<li>
							<span>籍&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;贯：</span>
							<select name="wordad">
							<?php if($search['wordad']=='郑州'){ ?>
								<option value="-1">不限</option>
								<option value="郑州" selected>河南 郑州</option>
							<?php }else{?>
							    <option value="-1" selected>不限</option>
								<option value="郑州">河南 郑州</option>
							<?php }?> 
							</select>
						</li>
						
						<div class="clearfix"></div>
					</ul>
					<div class="s-btnbox">
						<button class="s-btn">搜索</button>
					</div>				
	</div>	
  </form>
</div>			
	<!--	<div class="main"></div>-->
			
			<div class="main-box1">
			<div class="main-left">
				<ul class="sequence">
					<li><a href="javascript:void(0)" class="sort_a"><i style="color: #333333;">综合排序</i></a></li>
					<li><a href="javascript:void(0)" class="sort_a"><i class="sort_a1">最新会员  </i></a></li>
					<li><a href="javascript:void(0)" class="sort_a"><i class="sort_a1">年龄</i></a></li>
					<li><a href="javascript:void(0)" class="sort_a"><i class="sort_a1">身高</i></a></li>
					<li><a href="javascript:void(0)" class="sort_a"><i class="sort_a1">收入</i></a></li>
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
	       	  $('.s-btnbox').after(tr);
	       	  $('#seform').submit();
	       })
	    </script>
				<ul class="main-member">
				 <?php if(is_array($user)): $i = 0; $__LIST__ = $user;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li>
						<a href="<?php echo U('Userinfo/index',array('uid'=>$vo['id']));?>">
						  	<img src="<?php echo ($vo['headpic']); ?>" style="width:262px;height:262px;"/>
							<div class="name_title">
								<h1><?php echo ($vo['nickname']); ?></h1>
								<img src="/Public/Home/image/img01_06.png"/>
								<span>v2</span>
								<div class="clearfix"></div>
							</div>
							
							<p>会员号：100<?php echo ($vo['id']); ?></p>
                            <p style=" padding: 5px 0 10px;"><?php echo ($vo['agenow']); ?>岁    <?php echo ($vo['wordad']); ?>    <?php echo ($vo['marriage']); ?></p>
                            <p style="padding: 10px 0 20px; border-top: 1px dashed #D9D9D9;">自我介绍：<?php echo (mb_substr($vo['intro'],0,9,'utf-8')); ?>...</p>
                            </a>
                          <div class="member_button">
                          	<img src="/Public/Home/image/img01_30.png"/>
                          	<span class="likeit" data-id="<?php echo ($vo['id']); ?>">暗恋她</span>
                          </div> 
					   
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

	$("span.likeit").click(function(){
 			var _this = $(this);
 			var hisid = $(this).attr('data-id');
 			// alert(hisid);
 			var url="<?php echo U('Search/likeit');?>";
 			if ("<?php echo (session('uid')); ?>") { 
               	$.ajax({
 					type : 'post',
 					data : "hisid="+hisid,
 					url  : url,
 					//dataType : 'json',
 					success : function(msg){
 						if(msg != 0){
 							alert('暗恋成功！');
 							//_this.parent().parent('tr').remove();
 						}else{
 							alert('不好意思！暗恋过了或出错了！');
 						}
 					}
 				});
 			}else{
 			   window.location.href="<?php echo U('Login/login');?>";	
 			};
 			
 			
 		}
 	);
</script>