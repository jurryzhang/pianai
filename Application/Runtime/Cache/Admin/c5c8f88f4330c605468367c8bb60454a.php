<?php if (!defined('THINK_PATH')) exit();?><div class="main-box1">
      <div class="main-left"><!--left-->
			<?php if(is_array($user)): $i = 0; $__LIST__ = $user;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="s-introduce"> 
              <img src="/pahl/Public/Home/image/img01_43.png">
              <div class="tit">详细资料</div>
              <div class="clearfix"></div>
             </div>
              <ul class="s-yaoqiu">
                <li>
                  <p>性&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;别：<span><?php if($vo['sex']=='1'){ echo "男";}else{ echo "女";}?></span></p>
                  <p>血&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;型：<span><?php echo ($vo["blood"]); ?></span></p>
                  <p>学&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;历：<span><?php echo ($vo["qualification"]); ?></span></p>
                  <p>婚姻状况：<span>
                    <?php echo ($vo[""]); ?>                 </span></p>
                </li>
                <li>
                  <p>年&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;龄：<span>20~25</span></p>
                  <p>属&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;相：<span>保密</span></p>
                  <p>住&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;房：<span>无</span></p>
                </li>
                <li>
                  <p>身&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;高：<span>170~175</span></p>
                  <p>星&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;座：<span>保密</span></p>
                  <p>月&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;薪：<span>5000以下</span></p>
                </li>
                <li>
                  <p>体&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;重：<span>0</span></p>
                  <p>民&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;族：<span>汉族</span></p>
                  <p>从事工作：<span>221</span></p>
                </li>
              </ul>
              

               
               <div class="s-introduce"> 
                <img src="/pahl/Public/Home/image/img01_46.png">
                <div class="tit">生活状况</div>
                <div class="clearfix"></div>
               </div>
               <ul class="s-yaoqiu1">
                <li>
                  <p>吸&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;烟：<span></span></p>
                  <p>较大消费：<span></span></p>
                  <p>是否与父母同住：<span></span></p>
                </li>
                <li>
                  <p>饮&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;酒：<span></span></p>
                  <p>购物逛街：<span></span></p>
                  <p>家&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;务：<span></span></p>
                </li>
                <li>
                  <p>是否购车：<span></span></p>
                  <p>宗教信仰：<span></span></p>
                </li>
                <li>
              </li></ul>
      
              
              <div class="s-introduce"> 
                <img src="/pahl/Public/Home/image/img01_48.png">
                <div class="tit">择偶要求</div>
                <div class="clearfix"></div>
              </div>
               <ul class="s-yaoqiu1">
                

                <li>
                  <p>年&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;龄：<span>
                   岁之间</span></p>
                  <p>学&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;历：<span>博士研究生</span></p>
                  <!-- <p>婚后是否与父母同住：<span></span></p> -->
                  <p>从事工作：<span></span></p>
                </li>
                <li>
                  <p>身&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;高：<span>170~175</span></p>
                  <p>婚后是否要小孩：<span>

                  无</span></p>
                  <!-- <p>购&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;车：<span></span></p> -->
                  <!-- <p>工作地点：<span></span></p> -->
                </li>
                <li>
                  <p>月&nbsp;&nbsp;收&nbsp;&nbsp;入：<span>5000以下</span></p>
                  <p>住&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;房：<span>
                  无</span></p>
                  <p>婚姻状况：<span>

                  未婚</span></p>
                </li>
                <li>
              </li></ul>
  
               <div class="s-introduce"> 
                <img src="/pahl/Public/Home/image/img01_50.png">
                <div class="tit">关于婚姻</div>
               <div class="clearfix"></div>
               </div>
               <ul class="s-yaoqiu1" style="border-bottom: none;">
                <li>
                  <p>是否要小孩：<span></span></p>
                  <p>家中排行：<span></span></p>
                  <p>兄弟姐妹：<span></span></p>
                
                </li>
                <li>
                  <p>何时结婚：<span></span></p>
                  <p>父母情况：<span></span></p>
                  <p>父母经济情况：<span></span></p>
                </li>
                <li>
                  <p>愿与对方父母同住：<span></span></p>                 
                  <p>父母医保情况：<span></span></p>
                </li>
                <li>
              </li></ul><?php endforeach; endif; else: echo "" ;endif; ?>
      </div>


</div>