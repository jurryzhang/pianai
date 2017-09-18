<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE html>
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
<script type="text/javascript"  src="/Public/Home/js/jquery-1.9.1.js"></script>
<?php if($_SESSION['uid']== ''): ?><form action="<?php echo U('Index/register_no1');?>" method="post" id="loginform">
	  <div style="max-width:1200px; min-width:940px; margin:0 auto; position:relative;">
	   <dl class="registry_entry">
    	<dt>快速注册 开启寻爱之旅</dt>
    	<dd>
    		<p>性&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;别：</p>

    		<input type="radio" name="sex" value="1" class="gender" checked/>
    		<span id="">男</span>
    		<input type="radio" name="sex" value="2" class="gender" />
    		<span id="">女</span>
    		<div class="clearfix"></div>
    	</dd>

    	<dd class="years">
    		<p>出生年月：</p>
    		  <select name="year">
                </select>年
                <select name="month">
                </select>月
                <!-- <select name="day">
                </select>日 -->
    		<div class="clearfix"></div>
    	</dd>

    	  	<dd>
    		<p>工作地区：</p>
    		<input type="text" placeholder="河南 郑州" style="width: 72%;" name="workad"/>
    		<div class="clearfix"></div>
    	</dd>
    	<dd>
    		<p>婚姻状况：</p>

    		<input type="radio" name="marriage" value="3" checked/>单身
    		<input type="radio" name="marriage" value="1" />离婚
    		<input type="radio" name="marriage" value="2" />丧偶
    		<div class="clearfix"></div>
    	</dd>

		<dd class="registry_botton">
			<!-- <a href="register_no1.html" style="border: 1px solid;"> -->
				<button class="s-btn" type="submit">下一步</button>
		<!-- 	</a> -->

			<a href="<?php echo U('Login/login');?>" class="register">已有账号，立即登录>></a>
		</dd>
    </dl>
    </div>
     </form><?php endif; ?>
<!--banner-->
<div class="banner_box">
	<img src="/Public/Home/image/banner.jpg">
	<img src="/Public/Home/image/banner01.jpg">
    <img src="/Public/Home/image/banner03.png">
    <img src="/Public/Home/image/banner04.png">
    <ul class="btn">
    	<li class="current"></li>
        <li></li>
        <li></li>
        <li></li>
    </ul>
    <div class="leftarrows"><img src="/Public/Home/image/left.png"/></div>
    <div class="rightarrows"><img src="/Public/Home/image/right.png"/></div>
    <div class="conter"></div>
</div>

<!--偏爱精选-->
<div class="couter_box">
		<div class="handpick_title">
			<h1>只是因为在人群中多看了你一眼,再也没能忘掉你容颜,梦想着偶然能有一天再相见…</h1>
		</div>
		<ul class="handpick_nav">
		  <?php if(is_array($love)): $i = 0; $__LIST__ = $love;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if($i == '1'): ?><li class="current"> <?php echo ($vo['name']); ?></li>
			<?php else: ?>
			<li class=""> <?php echo ($vo['name']); ?></li><?php endif; endforeach; endif; else: echo "" ;endif; ?>
			<div class="clearfix"></div>
		</ul>
		<script>
		//选项卡切换
		$(function(){
			$('.handpick_nav li').click(function(){
		  	  var i=$(this).index();
		  	  $(this).addClass('current').siblings().removeClass('current');
		  	  $('.handpick_img').show().not('.lovepic'+i).hide();
		  })
		})
		</script>

		<!-- 优质推荐 -->
		<ul class="handpick_img lovepic0">
			<?php if(is_array($user)): $i = 0; $__LIST__ = $user;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="img_left img_box">
					<a href="<?php echo U('Userinfo/index',array('uid'=>$vo['id']));?>">
						<img src="<?php echo ($vo['headpic']); ?>" style="height:396px;">
					</a>
					<dl class="img_message">
						<dt>
						<?php echo ($vo['nickname']); ?><span><?php echo ($vo['agenow']); ?>岁  <?php echo ($vo['workad']); ?></span>
						</dt>
						<dd>
							<a class="botton">	<span class="likeit" data-id="<?php echo ($vo['id']); ?>">暗恋她</span></a>
							<a href="#" class="botton">被暗恋</a>
						</dd>
					</dl>
				</div><?php endforeach; endif; else: echo "" ;endif; ?>
			<a href="<?php echo U('Search/index');?>" class="more">查看更多>></a>
		</ul>

		<!-- 优质vcr -->
		<ul class="handpick_img lovepic1" style="display:none">
		<?php if(is_array($uvcr)): $i = 0; $__LIST__ = $uvcr;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><a href="<?php echo U('Userinfo/index',array('uid'=>$vo['id']));?>">
					<div class="img_left img_box">
						<img src="<?php echo ($vo['headpic']); ?>" style="height:396px;">
				 		<dl class="img_message">
							<dt><?php echo ($vo['nickname']); ?><span><?php echo ($vo['agenow']); ?>岁  <?php echo ($vo['workad']); ?></span></dt>
							<dd>
								<a  class="botton"><span class="likeit" data-id="<?php echo ($vo['id']); ?>">暗恋她</span></a>
								<a href="#" class="botton">被暗恋</a>
							</dd>
						</dl>
					</div>
				</a><?php endforeach; endif; else: echo "" ;endif; ?>
		<a href="<?php echo U('Search/index');?>" class="more">查看更多>></a>
		</ul>

		<!-- 婚恋家庭教育-->
		<ul class="handpick_img lovepic2" style="display:none">
		<?php if(is_array($edu)): $i = 0; $__LIST__ = $edu;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><a href="">
		<!--<a href="<?php echo U('Userinfo/index',array('uid'=>$vo['id']));?>">-->
					<div class="img_left img_box">
					E:\phpStudy\WWW\pianai\Public\Uploads\news
						<img src="/Public/Uploads/news/<?php echo ($vo['thumb']); ?>" style="height:396px;">
				 		<dl class="img_message">
							<dt><?php echo ($vo['title']); ?><span><?php echo ($vo['tags']); ?>  <?php echo ($vo['intro']); ?></span></dt>
							<dd>
								<!-- <a  class="botton"><span class="likeit" data-id="<?php echo ($vo['id']); ?>">暗恋她</span></a>
								<a href="#" class="botton">被暗恋</a> -->
							</dd>
						</dl>
					</div>
				</a><?php endforeach; endif; else: echo "" ;endif; ?>
		<!-- <a href="<?php echo U('Search/index');?>" class="more">查看更多>></a>-->
		</ul>

		<!-- 同城佳丽-->
		<ul class="handpick_img lovepic3" style="display:none">
		<?php if(is_array($women)): $i = 0; $__LIST__ = $women;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><a href="<?php echo U('Userinfo/index',array('uid'=>$vo['id']));?>">
					<div class="img_left img_box">
						<img src="<?php echo ($vo['headpic']); ?>" style="height:396px;">
				 		<dl class="img_message">
							<dt><?php echo ($vo['nickname']); ?><span><?php echo ($vo['agenow']); ?>岁
							  <?php echo ($vo['workad']); ?></span></dt>
							<dd>
								<a  class="botton"><span class="likeit" data-id="<?php echo ($vo['id']); ?>">暗恋她</span></a>
								<a href="#" class="botton">被暗恋</a>
							</dd>
						</dl>
					</div>
				</a><?php endforeach; endif; else: echo "" ;endif; ?>
		<a href="<?php echo U('Search/index');?>" class="more">查看更多>></a>
		</ul>

		<!-- 节目视频-->
		<ul class="handpick_img lovepic4" style="display:none">
		<?php if(is_array($videos)): $i = 0; $__LIST__ = $videos;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><a href="#">
					<div class="img_left img_box">
					  <video width="320" height="240" controls>
					  <source src="<?php echo ($vo['video']); ?>" type="video/mp4">
					  </object> 
					</video>
					</div>
				</a><?php endforeach; endif; else: echo "" ;endif; ?>
		<a href="<?php echo U('Search/index');?>" class="more">查看更多>></a>
		</ul>

		<!-- 活动派对-->
		<ul class="handpick_img lovepic5" style="display:none">
		<?php if(is_array($uvcr)): $i = 0; $__LIST__ = $uvcr;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><a href="<?php echo U('Userinfo/index',array('uid'=>$vo['id']));?>">
					<div class="img_left img_box">
						<img src="<?php echo ($vo['headpic']); ?>" style="height:396px;">
				 		<dl class="img_message">
							<dt><?php echo ($vo['nickname']); ?><span><?php echo ($vo['agenow']); ?>岁  <?php echo ($vo['workad']); ?></span></dt>
							<dd>
								<a  class="botton"><span class="likeit" data-id="<?php echo ($vo['id']); ?>">暗恋她</span></a>
								<a href="#" class="botton">被暗恋</a>
							</dd>
						</dl>
					</div>
				</a><?php endforeach; endif; else: echo "" ;endif; ?>
		<a href="<?php echo U('Search/index');?>" class="more">查看更多>></a>
		</ul>
		<!-- 成功案例-->
		<ul class="handpick_img lovepic6" style="display:none">
		<?php if(is_array($pds)): $i = 0; $__LIST__ = $pds;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>用户1:<?php echo ($vo['user1name']); ?>::用户2:<?php echo ($vo['user2name']); ?>---红娘姓名: <?php echo ($vo['lovem']); ?>
		<br/><?php endforeach; endif; else: echo "" ;endif; ?>
		<a href="<?php echo U('Search/index');?>" class="more">查看更多>></a>
		</ul>
</div>

<!--偏爱服务-->

<div class="bgbox">
<div class="couter_box">
	<div class="handpick_title">
		<img src="/Public/Home/image/img_24.png"/>
		<h1>只是因为在人群中多看了你一眼,再也没能忘掉你容颜,梦想着偶然能有一天再相见…</h1>
	</div>
	<ul class="serve">
		<li>
			<a href="<?php echo U('Search/find_accurate');?>">
				<img src="/Public/Home/image/img_27.png"/>
				<h1>精准推荐</h1>
				<p>只向你推荐最合适的TA</p>
			</a>
		</li>
		<li class="serve_center">
			<a href="<?php echo U('Search/find_vcr');?>">
				<img src="/Public/Home/image/img_32.png"/>
				<h1>优质	VCR</h1>
				<p>把最好的自己展现在别人面前</p>
			</a>
		</li>
		<li>
			<a href="<?php echo U('Search/find_news',array('type'=>'0'));?>">
					<img src="/Public/Home/image/img_29.png"/>
					<h1>个人形象&婚恋教育</h1>
					<p>如何追到TA? 如何提升情感？如何做到贤德......</p>
				</a>
			</li>
			<li>
				<a href="<?php echo U('Search/find_news',array('type'=>'1'));?>">
					<img src="/Public/Home/image/img_37.png"/>
					<h1>爱在旅途</h1>
					<p>来一次说走就走的恋爱旅行，我们会让大家在旅......</p>
				</a>
			</li>
			<li class="serve_center">
				<a href="<?php echo U('Search/find_news',array('type'=>'2'));?>">
					<img src="/Public/Home/image/img_39.png"/>
					<h1>个性娱乐节目</h1>
					<p>节目交友</p>
				</a>
			</li>
			<li>
				<a href="<?php echo U('Search/find_news',array('type'=>'3'));?>">
					<img src="/Public/Home/image/img_38.png"/>
					<h1>马尔代夫恋</h1>
					<p>恋爱对对碰</p>
				</a>
			</li>
			<div class="clearfix">

			</div>
		</ul>
</div>
</div>


<!--微信版-->
<div class="couter_box">

		<div class="handpick_title">
			<img src="/Public/Home/image/img_44.png"/>
			<h1>偏爱婚恋手机客户端，随时随地缘分不断</h1>
		</div>
		<div class="wachet_box">
			<img src="/Public/Home/image/wachet_b.png"/>
			<div class="qr_code">
				<img src="/Public/Home/image/qr_code.png"/>
				<p>微信客户端</p>
			</div>
			<div class="clearfix">

			</div>
		</div>

</div>

<!--底部栏-->
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
 $('document').ready(function(){
    /*
     * 生成级联菜单
     */
    var i=1945;
    var date = new Date();
    year = date.getFullYear();//获取当前年份
    var dropList;
    for(i;i<2000;i++){
        if(i == year){
            dropList = dropList + "<option value='"+i+"' selected>"+i+"</option>";
        }else{
            dropList = dropList + "<option value='"+i+"'>"+i+"</option>";
        }
    }
    $('select[name=year]').html(dropList);//生成年份下拉菜单
    var monthly;
    for(month=1;month<13;month++){
        monthly = monthly + "<option value='"+month+"'>"+month+"</option>";
    }
    $('select[name=month]').html(monthly);//生成月份下拉菜单
    var dayly;
    for(day=1;day<=31;day++){
        dayly = dayly + "<option value='"+day+"'>"+day+"</option>";
    }
    $('select[name=day]').html(dayly);//生成天数下拉菜单
    /*
     * 处理每个月有多少天---联动
     */
    $('select[name=month]').change(function(){
        var currentDay;
        var Flag = $('select[name=year]').val();
        var currentMonth = $('select[name=month]').val();
        switch(currentMonth){
            case "1" :
            case "3" :
            case "5" :
            case "7" :
            case "8" :
            case "10" :
            case "12" :total = 31;break;
            case "4" :
            case "6" :
            case "9" :
            case "11" :total = 30;break;
            case "2" :
                if((Flag%4 == 0 && Flag%100 != 0) || Flag%400 == 0){
                    total = 29;
                }else{
                    total = 28;
                }
            default:break;
        }
        for(day=1;day <= total;day++){
            currentDay = currentDay + "<option value='"+day+"'>"+day+"</option>";
        }
        $('select[name=day]').html(currentDay);//生成日期下拉菜单
        })
});


var z=0
$(".banner_box>img").hide().eq(0).show()
$(".btn li").click(
	function(){
		z=$(this).index()
		$(".banner_box>img").hide().eq(z).show()
		$(this).addClass("current").siblings().removeClass("current")
		}
)
$(".leftarrows").click(
	function(){
		if(z>0){z=z-1}
		else{z=3}
		$(".banner_box>img").hide().eq(z).show()
		$(".btn li").eq(z).addClass("current").siblings().removeClass("current")
		}
)
$(".rightarrows").click(
	function(){
		if(z<3){z=z+1}
		else{z=0}
		$(".banner_box>img").hide().eq(z).show()
		$(".btn li").eq(z).addClass("current").siblings().removeClass("current")
		}
)


//信息滑动

$(".img_message").css("bottom",-74)
$(".img_box").mouseenter(
	function(){
		$(this).find('.img_message').stop().animate({bottom:0},1000)
		}
).mouseleave(
	function(){
		$(this).find('.img_message').stop().animate({bottom:-74},1000)
		}
)



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
              alert('出错了！');
            }
          }
        });
      }else{
         window.location.href="<?php echo U('Login/login');?>";
      };


    }

  );
</script>
</script>
</body>
</html>