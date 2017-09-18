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


<script type="text/javascript"  src="/Public/Home/js/jquery-1.8.3.min.js"></script>
<script type="text/javascript"  src="/Public/Home/js/comment.js"></script>

<div class="s-topbox">
	 <?php $piclist = explode(",",substr($user['photo'],1,strlen($user['photo']))); ?>
		<div class="s-top">
			    <div class="preview">
	               <div id="vertical" class="bigImg">
                 <img src="<?php echo ($piclist[1]); ?>" alt="" id="midimg" /></div>
	               <div class="smallImg">
		              <div class="scrollbutton smallImgUp disabled"></div>
		              <div id="imageMenu">
			            <ul  style=" width:100%;">

                  <?php if(is_array($piclist)): $i = 0; $__LIST__ = $piclist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li ><img src="<?php echo ($vo); ?>" width="68" height="68" /></li><?php endforeach; endif; else: echo "" ;endif; ?>
                   <!--<li><img src="/Public/Home/image/img01_03.png" width="68" height="68" /></li>-->
				           <div class="clearfix">  </div>
			            </ul>
		              </div>
		               <div class="scrollbutton smallImgDown"></div>
	                 </div>
                </div>

                <div class="s-minfor">
                	<div class="tit">
                		<div class="">
                			<h1 class="s-mname"><?php echo ($user['nickname']); ?></h1>
                			<img src="/Public/Home/image/img01_06.png"/ style="float: left; margin: 9px 0 0 10px;">
                			<span style=" color: #ec9e4d; font-size: 16px; margin: 9px 0 0 5px;">V2</span>
                            <span style="float: right;color:#fff;background: #d00053;margin-left: 10px;margin-right: 10px;padding: 0px 30px;border-radius: 8px;cursor: pointer;" onclick="changeImg();">修改头像</span>
                		</div>
                        <div style="float:right;margin:0;padding:0;visibility: hidden;" id="upload">
                            <form action="/index.php/Home/Userinfo/updateuserimg" method="post" enctype="multipart/form-data">
                                <input type="file" name="photo[]" id="" multiple="multiple">
                                <input type="submit" value="提交" style="color:#fff;background: #d00053;padding: 0px 5px;cursor: pointer;">
                            </form>
                        </div>
                  <script>
                      function changeImg(){
                          $('#upload').attr('style','float:right;margin:0;padding:0;');
                      }
                  </script>

                		<div class="m-icon">
                			<p style="font-size:16px; float: left; margin-right: 40px; color: #666;">会员号：<?php echo ($user['id']); ?></p>
                			<a href="" class="m-icon-iphone"></a>
                			<a href="" class="m-icon-man"></a>
                			<a href="" class="m-icon-email"></a>
                			<a href="" class="m-icon-xue"></a>
                		</div>
                	</div>
                	<ul class="infor">
                	   <li>
                		  <p>性&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;别：<span>
                		  <?php if($user['sex'] == '1'): ?>男   <?php else: ?>女<?php endif; ?>

                		  </span></p>
                		  <p>学&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;历：<span>
                		  <?php echo ($user['qualification']); ?></span></p>
                	   </li>
                	   <li>
                		  <p>年&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;龄：<span>
                		  <?php echo ($user['age']); ?></span></p>
                		  <p>身&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;高：<span>
                		  <?php echo ($user['height']); ?></span></p>
                	   </li>
                	   <li>
                		  <p>生&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;肖：<span>
                		  <?php echo ($user['ani']); ?></span></p>
                		  <p>婚姻状况：<span>
                          <?php switch($$user['marriage']): case "1": ?>离婚<?php break;?>
            							<?php case "2": ?>丧偶<?php break;?>
            							<?php default: ?>未婚<?php endswitch;?>
                		  <span></p>
                	   </li>

                    </ul>

                    <div class="s-introduce">
                    	<div class="tit01">自我介绍</div>
                    	<p><?php echo (htmlspecialchars_decode($user['intro'])); ?>
                    	</p>

              	 <ul class="infor_button">

                <?php if($user['id'] == $user['geren']): ?><li>
                        <img src="/Public/Home/image/img01_30.png"/>
                        <span id="likeme" data-id="<?php echo ($user['id']); ?>" onclick="likeme()">查看暗恋</span>
                  </li><?php endif; ?>

                 <?php
 if ($user['li']){ ?>
                    <li>
                      <img src="/Public/Home/image/img01_30.png"/>
                      <span class="likeit" data-id="<?php echo ($user['id']); ?>">暗恋她</span>
                    </li>
                  <?php }else{ ?>
                      <li>
                      <img src="/Public/Home/image/img01_30.png"/>
                      <span>已暗恋</span>
                    </li>
                  <?php
 } ?>
                   	<li>
                   		<img src="/Public/Home/image/img01_33.png"/>
                   		<span id="photo" data-id="<?php echo ($user['id']); ?>" onclick="screen()">求照片</span>
                   	</li>
                   	<li>
                   		<img src="/Public/Home/image/img01_35.png"/>
                   		<span id="vcr" data-id="<?php echo ($user['id']); ?>" onclick="screen1()">个人VCR</span>
                   	</li>
                   	<div class="clearfix"></div>
                   </ul>

                    </div>


                </div>
                </div>

  </div>

<!--$Think.session.uid-->

<div id="screen1" style="display: none;">
  <div class="banner_box">
  <video width="100%" height="100%" controls="controls" autoplay>
  <source src="/i/movie.ogg" type="video/ogg">
  <source src="/Public/Uploads/vcr/<?php echo ($user['vcrpath']); ?>" type="video/mp4">
  Your browser does not support the video tag.
</video>

</div>
</div>

<div id="screen" style="display: none;">
  <div class="banner_box">


  <img src="/Public/Admin/kindeditor-4.1.10/attached/image<?php echo ($vo); ?>" style="display: block;" height: 350px;>
  <img src="/Public/Admin/kindeditor-4.1.10/attached/image<?php echo ($piclist[1]); ?>" id="midimg" style="display: none;" height: 350px; align="center"/>
  <img src="/pahl/Public/Home/image/banner01.jpg" style="display: none;" height: 350px; >
    <img src="/pahl/Public/Home/image/banner03.png" style="display: none;" height: 350px; >
    <img src="/pahl/Public/Home/image/banner04.png" style="display: none;" height: 350px; >

    <ul class="btn">
      <li class="current"></li>
        <li class=""></li>
        <li class=""></li>
        <li class=""></li>
    </ul>

    <div class="leftarrows"><img src="/pahl/Public/Home/image/left.png"></div>
    <div class="rightarrows"><img src="/pahl/Public/Home/image/right.png"></div>
    <div class="conter"></div>

</div>

</div>

<div id="mainright" style="display: none;">
        <div class="main-message">

          <ul class="member-list">

           <?php if(is_array($us)): $i = 0; $__LIST__ = array_slice($us,1,null,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><?php $piclist = explode(",",substr($vo['photo'],1,strlen($vo['photo']))); ?>
              <a href="<?php echo U('Userinfo/index',array('uid'=>$vo['id']));?>">
              <img src="/Public/Admin/kindeditor-4.1.10/attached/image<?php echo ($piclist[0]); ?>" id="img1"/>
              </a>
              <div class="name_title">
                <h1><?php echo ($vo['nickname']); ?></h1>
                <img src="/Public/Home/image/img01_06.png"/>
                <span>v2</span>
                <div class="clearfix"></div>
              </div>

              <p>会员号：100001</p>
                            <p style=" padding: 5px 0 10px;"><?php echo ($vo['age']); ?>岁    <?php echo ($vo['workad']); ?>      <?php switch($$vo['marriage']): case "1": ?>离婚<?php break;?>
                              <?php case "2": ?>丧偶<?php break;?>
                              <?php default: ?>未婚<?php endswitch;?> </p>
                            <p style="padding: 10px 0 20px; border-top: 1px dashed #D9D9D9;">自我介绍：<?php echo (mb_substr($vo['intro'],0,10,'utf-8')); ?></p>

            </li><?php endforeach; endif; else: echo "" ;endif; ?>
            <div class="clearfix"></div>
          </ul>

        </div>

      </div>

<style>
  #screen{
    width: 820px;
    background-color: lightcyan;
    margin: 0 auto;
  }
  #screen1{
    width: 620px;
    height: 500px
    border-color:#0000FF;
    border: 2px solid ;
    background-color: lightcyan;
    margin: 0 auto;
  }

  #mainright{
    width: 1200px;
    height: 500px
    border-color:#0000FF;
    border: 2px solid ;
    background-color: lightcyan;
    margin: 0 auto;
  }
   .banner_box>img{
            margin-left: -420px !important;
        }
</style>


<script type="text/javascript">

/*原生简写（三元运算）*/

function screen(){

/*

原理相同只是写法不同，判断show的display是不是none  是则设为block显示不是则设为none隐藏

*/

document.getElementById('screen').style.display = document.getElementById('screen').style.display=="none"?"block":"none";

}

function screen1(){

/*

原理相同只是写法不同，判断show的display是不是none  是则设为block显示不是则设为none隐藏

*/

document.getElementById('screen1').style.display = document.getElementById('screen1').style.display=="none"?"block":"none";

}

function likeme(){

/*

原理相同只是写法不同，判断show的display是不是none  是则设为block显示不是则设为none隐藏

*/

document.getElementById('mainright').style.display = document.getElementById('mainright').style.display=="none"?"block":"none";

}



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

</script>




<!--<div class="main">-->
<?php if($user['id'] == $user['geren']): ?><form action="<?php echo U('Userinfo/updateuserinfo',array('uid'=>$user['id']));?>" method="post" id="myform">

<!-- <input type="text" name="uid" value="<?php echo ($user['id']); ?>"/> -->
<style>
  #tijiao{
            font-size: 25px;
            background: #D00053;
            margin-left: 717px;
            margin-right: 10px;
            padding: 8px 62px;
            border-radius: 8px;
  }

</style>
		<div class="main-box1">
			<div class="main-left"><!--left-->

         <div class="s-introduce">
             	<img src="/Public/Home/image/img01_43.png"/>
             	<div class="tit">详细资料</div>
              <input id="tijiao" type="submit" value="保存"/>
             	<div class="clearfix"></div>
             </div>
              <ul class="s-yaoqiu">
              	<li>
              		<p>性&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;别：
                  <span>
              		<?php if($user['sex'] == '1'): ?>男
              		            <?php else: ?>女<?php endif; ?></span></p>
              		<p>血&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;型：<span><input name="blood" value="<?php echo ($user['blood']); ?>" id="input_spec"/></span></p>
              		<p>学&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;历：<span>
                 <input name="qualification" value="<?php echo ($user['qualification']); ?>" id="input_spec"/></span></p>
              		<p>婚姻状况：<span>
              			<?php switch($$user['marriage']): case "1": ?>离婚<?php break;?>
      							<?php case "2": ?>丧偶<?php break;?>
      							<?php default: ?>未婚<?php endswitch;?>
              		</span></p>
              	</li>
              	<li>
              		<p>年&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;龄：<span><input name="age" value="<?php echo ($user['age']); ?>" id="input_spec"/></span></p>
              		<p>属&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;相：<span><input name="ani" value="<?php echo ($user['ani']); ?>" id="input_spec"/></span></p>
              		<p>住&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;房：<span>

              		<?php switch($$user['housing']): case "1": ?>已购房（有贷款）<?php break;?>
							<?php case "2": ?>已购房（无贷款）<?php break;?>
							<?php default: ?>无<?php endswitch;?></span></p>
              	</li>
              	<li>
              		<p>身&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;高：<input name="height" value="<?php echo ($user['height']); ?>" id="input_spec"/><span></span></p>
              		<p>星&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;座：<span><input name="const" value="<?php echo ($user['const']); ?>" id="input_spec"/></span></p>
              		<p>月&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;薪：<span><input name="monthly" value="<?php echo ($user['monthly']); ?>" id="input_spec"/></span></p>
              	</li>
              	<li>
              		<p>体&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;重：<span><input name="weight" value="<?php echo ($user['weight']); ?>" id="input_spec"/></span></p>
              		<p>民&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;族：<span><input name="nation" value="<?php echo ($user['nation']); ?>" id="input_spec"/></span></p>
              		<p>从事工作：<span><input name="work" value="<?php echo ($user['work']); ?>" id="input_spec"/></span></p>
              	</li>
              </ul>



               <div class="s-introduce">
               	<img src="/Public/Home/image/img01_46.png"/>
               	<div class="tit">生活状况</div>

               	<div class="clearfix"></div>
               </div>
               <ul class="s-yaoqiu1">
              	<li>
              		<p>吸&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;烟：<span>
              		<input name="smoking" value="<?php echo ($user['smoking']); ?>" id="input_spec"/></span></p>
              		<p>较大消费：<span>
                    <input name="consumption" value="<?php echo ($user['consumption']); ?>" id="input_spec"/>
              		</span></p>
              		<p>是否与父母同住：<span>

              		<input name="livingwithparents" value="<?php echo ($user['livingwithparents']); ?>" id="input_spec"/></span></p>
              	</li>
              	<li>
              		<p>饮&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;酒：<span>
                    <input name="drinking" value="<?php echo ($user['drinking']); ?>" id="input_spec"/>
              		</span></p>
              		<p>购物逛街：<span>
                    <input name="shopping" value="<?php echo ($user['shopping']); ?>" id="input_spec"/>
              		</span></p>
              		<p>家&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;务：<span>
                    <input name="housework" value="<?php echo ($user['housework']); ?>" id="input_spec"/>
              		</span></p>
              	</li>
              	<li>
              		<p>是否购车：<span>
                    <input name="car" value="<?php echo ($user['car']); ?>" id="input_spec"/>

              		</span></p>
              		<p>宗教信仰：<span>
                     <input name="beliefs" value="<?php echo ($user['beliefs']); ?>" id="input_spec"/>

              		</span></p>
              	</li>
              	<li>
              </ul>


              <div class="s-introduce">
              	<img src="/Public/Home/image/img01_48.png"/>
              	<div class="tit">择偶要求</div>
              	<div class="clearfix"></div>
              </div>
               <ul class="s-yaoqiu1">


              	<li>
              		<p>年&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;龄：<span>
              		<input name="cage" value="<?php echo ($chuser['cage']); ?>" id="input_spec"/></span></p>
              		<p>学&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;历：<span><input name="qualification" value="<?php echo ($chuser['qualification']); ?>" id="input_spec"/></span></p>
              		<!-- <p>婚后是否与父母同住：<span><?php echo ($chuser['']); ?></span></p> -->
              		<p>从事工作：<span><input name="work" value="<?php echo ($chuser['work']); ?>" id="input_spec"/></span></p>
              	</li>
              	<li>
              		<p>身&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;高：<span><?php echo ($chuser['height']); ?></span></p>
              		<p>婚后是否要小孩：<span>

              		<?php switch($$chuser['child']): case "1": ?>有同住<?php break;?>
							<?php case "2": ?>有不同住<?php break;?>
							<?php default: ?>无<?php endswitch;?></span></p>
              		<!-- <p>购&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;车：<span><?php echo ($chuser['']); ?></span></p> -->
              		<!-- <p>工作地点：<span><?php echo ($chuser['work']); ?></span></p> -->
              	</li>
              	<li>
              		<p>月&nbsp;&nbsp;收&nbsp;&nbsp;入：<span><input name="monthly" value="<?php echo ($chuser['monthly']); ?>" id="input_spec"/></span></p>
              		<p>住&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;房：<span>
              		<?php switch($$chuser['housing']): case "1": ?>已购房（有贷款）<?php break;?>
							<?php case "2": ?>已购房（无贷款）<?php break;?>
							<?php default: ?>无<?php endswitch;?></span></p>
              		<p>婚姻状况：<span>

              		<?php switch($$chuser['marriage']): case "1": ?>已婚<?php break;?>
							<?php case "2": ?>丧偶<?php break;?>
							<?php default: ?>未婚<?php endswitch;?></span></p>
              	</li>
              	<li>
              </ul>

               <div class="s-introduce">
               	<img src="/Public/Home/image/img01_50.png"/>
               	<div class="tit">关于婚姻</div>
               <div class="clearfix"></div>
               </div>
               <ul class="s-yaoqiu1" style="border-bottom: none;">
              	<li>
              		<p>是否要小孩：<span>
                    <input name="getchild" value="<?php echo ($user['getchild']); ?>" id="input_spec"/>
              		</span></p>
              		<p>家中排行：<span>
                    <input name="ranking" value="<?php echo ($user['ranking']); ?>" id="input_spec"/></span></p>
              		<p>兄弟姐妹：<span>
                    <input name="brothersandsisters" value="<?php echo ($user['brothersandsisters']); ?>" id="input_spec"/></span></p>

              	</li>
              	<li>
              		<p>何时结婚：<span>
                    <input name="whenmarried" value="<?php echo ($user['whenmarried']); ?>" id="input_spec"/></span></p>
              		<p>父母情况：<span>
                    <input name="parents" value="<?php echo ($user['parents']); ?>" id="input_spec"/></span></p>
              		<p>父母经济情况：<span><?php echo ($user['parentseconomic']); ?>
                    <input name="parentseconomic" value="<?php echo ($user['parentseconomic']); ?>" id="input_spec"/></span></p>
              	</li>
              	<li>
              		<p>愿与对方父母同住：<span>
                    <input name="wishlivewithparents" value="<?php echo ($user['wishlivewithparents']); ?>" id="wishlivewithparents"/></span></p>
              		<p>父母医保情况：<span>
                    <input name="parentshealth" value="<?php echo ($user['parentshealth']); ?>" id="input_spec"/></span></p>
              	</li>
              	<li>
              </ul>

			</div><!--left-->


</div>

</div>
</form>

<?php else: ?>


    <div class="main-box1">
      <div class="main-left"><!--left-->

         <div class="s-introduce">
              <img src="/Public/Home/image/img01_43.png"/>
              <div class="tit">详细资料</div>
              <div class="clearfix"></div>
             </div>
              <ul class="s-yaoqiu">
                <li>
                  <p>性&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;别：<span>
                  <?php if($user['sex'] == '1'): ?>男
                              <?php else: ?>女<?php endif; ?></span></p>
                  <p>血&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;型：<span><?php echo ($user['blood']); ?></span></p>
                  <p>学&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;历：<span><?php echo ($user['qualification']); ?></span></p>
                  <p>婚姻状况：<span>
                    <?php switch($$user['marriage']): case "1": ?>离婚<?php break;?>
              <?php case "2": ?>丧偶<?php break;?>
              <?php default: ?>未婚<?php endswitch;?>
                  </span></p>
                </li>
                <li>
                  <p>年&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;龄：<span><?php echo ($user['age']); ?></span></p>
                  <p>属&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;相：<span><?php echo ($user['ani']); ?></span></p>
                  <p>住&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;房：<span>

                  <?php switch($$user['housing']): case "1": ?>已购房（有贷款）<?php break;?>
              <?php case "2": ?>已购房（无贷款）<?php break;?>
              <?php default: ?>无<?php endswitch;?></span></p>
                </li>
                <li>
                  <p>身&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;高：<span><?php echo ($user['height']); ?></span></p>
                  <p>星&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;座：<span><?php echo ($user['const']); ?></span></p>
                  <p>月&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;薪：<span><?php echo ($user['monthly']); ?></span></p>
                </li>
                <li>
                  <p>体&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;重：<span><?php echo ($user['weight']); ?></span></p>
                  <p>民&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;族：<span><?php echo ($user['nation']); ?></span></p>
                  <p>从事工作：<span><?php echo ($user['work']); ?></span></p>
                </li>
              </ul>



               <div class="s-introduce">
                <img src="/Public/Home/image/img01_46.png"/>
                <div class="tit">生活状况</div>
                <div class="clearfix"></div>
               </div>
               <ul class="s-yaoqiu1">
                <li>
                  <p>吸&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;烟：<span><?php echo ($user['smoking']); ?></span></p>
                  <p>较大消费：<span><?php echo ($user['consumption']); ?></span></p>
                  <p>是否与父母同住：<span><?php echo ($user['livingwithparents']); ?></span></p>
                </li>
                <li>
                  <p>饮&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;酒：<span><?php echo ($user['drinking']); ?></span></p>
                  <p>购物逛街：<span><?php echo ($user['shopping']); ?></span></p>
                  <p>家&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;务：<span><?php echo ($user['housework']); ?></span></p>
                </li>
                <li>
                  <p>是否购车：<span><?php echo ($user['car']); ?></span></p>
                  <p>宗教信仰：<span><?php echo ($user['beliefs']); ?></span></p>
                </li>
                <li>
              </ul>


              <div class="s-introduce">
                <img src="/Public/Home/image/img01_48.png"/>
                <div class="tit">择偶要求</div>
                <div class="clearfix"></div>
              </div>
               <ul class="s-yaoqiu1">


                <li>
                  <p>年&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;龄：<span>
                   <?php echo ($chuser['cage']); ?>岁之间</span></p>
                  <p>学&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;历：<span><?php echo ($chuser['qualification']); ?></span></p>
                  <!-- <p>婚后是否与父母同住：<span><?php echo ($chuser['']); ?></span></p> -->
                  <p>从事工作：<span><?php echo ($chuser['work']); ?></span></p>
                </li>
                <li>
                  <p>身&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;高：<span><?php echo ($chuser['height']); ?></span></p>
                  <p>婚后是否要小孩：<span>

                  <?php switch($$chuser['child']): case "1": ?>有同住<?php break;?>
              <?php case "2": ?>有不同住<?php break;?>
              <?php default: ?>无<?php endswitch;?></span></p>
                  <!-- <p>购&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;车：<span><?php echo ($chuser['']); ?></span></p> -->
                  <!-- <p>工作地点：<span><?php echo ($chuser['work']); ?></span></p> -->
                </li>
                <li>
                  <p>月&nbsp;&nbsp;收&nbsp;&nbsp;入：<span><?php echo ($chuser['monthly']); ?></span></p>
                  <p>住&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;房：<span>
                  <?php switch($$chuser['housing']): case "1": ?>已购房（有贷款）<?php break;?>
              <?php case "2": ?>已购房（无贷款）<?php break;?>
              <?php default: ?>无<?php endswitch;?></span></p>
                  <p>婚姻状况：<span>

                  <?php switch($$chuser['marriage']): case "1": ?>已婚<?php break;?>
              <?php case "2": ?>丧偶<?php break;?>
              <?php default: ?>未婚<?php endswitch;?></span></p>
                </li>
                <li>
              </ul>

               <div class="s-introduce">
                <img src="/Public/Home/image/img01_50.png"/>
                <div class="tit">关于婚姻</div>
               <div class="clearfix"></div>
               </div>
               <ul class="s-yaoqiu1" style="border-bottom: none;">
                <li>
                  <p>是否要小孩：<span><?php echo ($user['getchild']); ?></span></p>
                  <p>家中排行：<span><?php echo ($user['ranking']); ?></span></p>
                  <p>兄弟姐妹：<span><?php echo ($user['brothersandsisters']); ?></span></p>

                </li>
                <li>
                  <p>何时结婚：<span><?php echo ($user['whenmarried']); ?></span></p>
                  <p>父母情况：<span><?php echo ($user['parents']); ?></span></p>
                  <p>父母经济情况：<span><?php echo ($user['parentseconomic']); ?></span></p>
                </li>
                <li>
                  <p>愿与对方父母同住：<span><?php echo ($user['wishlivewithparents']); ?></span></p>
                  <p>父母医保情况：<span><?php echo ($user['parentshealth']); ?></span></p>
                </li>
                <li>
              </ul>

      </div>


</div><?php endif; ?>
<!--right-->
			<div class="main-right">


				<div class="main-message">

				<div class="tit">最新会员推荐</div>

					<ul class="member-list">

					 <?php if(is_array($userrecom)): $i = 0; $__LIST__ = $userrecom;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><?php $piclist = explode(",",substr($vo['photo'],1,strlen($vo['photo']))); ?>
              <a href="<?php echo U('Userinfo/index',array('uid'=>$vo['id']));?>">
							<img src="<?php echo ($piclist[0]); ?>" id="img1"/>
              </a>
							<div class="name_title">
								<h1><?php echo ($vo['nickname']); ?></h1>
								<img src="/Public/Home/image/img01_06.png"/>
								<span>v2</span>
								<div class="clearfix"></div>
							</div>

							<p>会员号：<?php echo ($vo['id']); ?></p>
                            <p style=" padding: 5px 0 10px;"><?php echo ($vo['age']); ?>岁    <?php echo ($vo['workad']); ?>      <?php switch($$vo['marriage']): case "1": ?>离婚<?php break;?>
                              <?php case "2": ?>丧偶<?php break;?>
                              <?php default: ?>未婚<?php endswitch;?> </p>
                            <p style="padding: 10px 0 20px; border-top: 1px dashed #D9D9D9;">自我介绍：<?php echo (mb_substr($vo['intro'],0,10,'utf-8')); ?></p>

                          <div class="member_button">
                              <img src="/Public/Home/image/img01_30.png"/>
                              <span class="likeit" data-id="<?php echo ($vo['id']); ?>">暗恋她</span>

                          </div>
						</li><?php endforeach; endif; else: echo "" ;endif; ?>
						<div class="clearfix"></div>
					</ul>

				</div>

			</div>


      <style>
          #img1{
            width: 267px;
            height: 330px;
          }

      </style>

<div class="bgbox">
		<ul class="couter_box">
			<li class="foot_box">
				<dl>
					<dt>
						<img src="/Public/Home/image/img_56.png"/>
						<h2>关于我们</h2>
						<div class="clearfix"></div>
					</dt>
					<dd>关于我们</dd>
					<dd>媒体报道 </dd>
					<dd>恋爱百科 </dd>
					<dd>招商合作</dd>
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
					<dd> 会员条款</dd>
					<dd>常见问题 </dd>
					<dd>征婚提醒 </dd>
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
					<dd>热线电话：0855-85855200  18085055520</dd>
					<dd>地址：贵州省凯里市永丰南路 锐馨鑫园A栋2208</dd>

					<div class="clearfix"></div>
				</dl>
			</li>

			<li class="foot_box foot_box4">
				<dl>
					<dt>
						<img src="/Public/Home/image/img_64.png"/>
						<h2>关于我们</h2>
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



</div>


<script type='text/javascript'>
	(function(){
		 new PopUp_api({el:'.s-jubao',html:'.ddd'});
	})()
</script>
<script type='text/javascript'>
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
              window.location.href=''
              //_this.parent().parent('tr').remove();
            }else{
              alert('不好意思！已暗恋过了或者出错了！');
            }
          }
        });
      }else{
         window.location.href="<?php echo U('Login/login');?>";
      };


    }

  );
</script>