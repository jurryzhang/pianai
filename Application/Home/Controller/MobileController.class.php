<?php

namespace Home\Controller;

use Think\Controller;

class MobileController extends Controller
{

    public function index()
    {

        if (session("uid") != "" && session("uid") != "-1") {
            // $userinfo =  D("user")->where("id=%d",session("uid"))->find();
            //       $y=date('Y',time());
            //      $userinfo['agenow']=$y-$userinfo['year'];
            //      $pic=explode(",",substr($userinfo['photo'],1,strlen($userinfo['photo'])));
            //      $userinfo['headpic']=$pic[0];
            //      $this->userinfo=$userinfo;
            $this->redirect('Mobile/home');
        } else {
            $this->display("Mobile/usercenter");
        }


    }


    public function savetofile()
    {
        if (isset($_FILES['myFile'])) {

            move_uploaded_file($_FILES['myFile']['tmp_name'], "./Public/Admin/kindeditor-4.1.10/attached/image/moblepic/" . $_FILES['myFile']['name']);
            echo '上传成功';

            $aim["id"] = session("uid");
            $userinfo = D("user")->where($aim)->find();
            $arr["photo"] = ",/moblepic/" . $_FILES['myFile']['name'] . $userinfo["photo"];
            $res = D("user")->where($aim)->save($arr);
            // $img_path = "./Public/Admin/kindeditor-4.1.10/attached/image/moblepic/".$_FILES['myFile']['name'];
            // $img_path1 = "./Public/Admin/kindeditor-4.1.10/attached/image/moblepic/".$_FILES['myFile']['name'];
            // thumb_img($img_path,"500",$img_path1);
            //var_dump($_FILES.$aim);
        }

        // if(isset($_FILES['myFile'])){

        //               //引入上传文件
        //               $upload = new \Think\Upload();// 实例化上传类
        //             $upload->maxSize  = 31457281;// 设置附件上传大小

        //             //$upload->saveName = I('uid').'_'.time();// 设置附件上传目录
        //             $upload->maxSize = 31457280 ;// 设置附件上传大小
        //             $upload->exts = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
        //             $upload->rootPath = './Public/'; // 设置附件上传根目录
        //             $upload->savePath =  './Admin/kindeditor-4.1.10/attached/image/moblepic/';
        //             // 设置附件上传目录

        //             $upload->autoSub=false;

        //             if(!$upload->upload()) {// 上传错误提示错误信息
        //             $this->error($upload->getErrorMsg());

        //             }else{// 上传成功 获取上传文件信息
        //             $info =  $upload->getUploadFileInfo();
        //             }
        //             $dataname=$info[0]['savename']; // 保存上传的照片根据需要自行组装
        //            // success($info[0]['savename']."fasdfa");

        //             //echo 'successful';
        //            // echo I("idus").$info[0]['savename'];
        //          }


    }

    public function usercenters()
    {

        if (session("uid") != "") {
            $userinfo = D("user")->where("id=%d", session("uid"))->find();
            $y = date('Y', time());
            $userinfo['agenow'] = $y - $userinfo['year'];
            $pic = explode(",", substr($userinfo['photo'], 1, strlen($userinfo['photo'])));
            $userinfo['headpic'] = $pic[0];

            // var_dump($pic[0]);die;
            $this->userinfo = $userinfo;
            $this->display("Mobile/me");
        } else {
            $this->display("Mobile/usercenter");
        }
        //var_dump($userinfo);


    }

    public function userinfo()
    {

        $userinfo = $umodel->where("id=%d", session("uid"))->find();
        $y = date('Y', time());
        $userinfo['agenow'] = $y - $userinfo['year'];
        $pic = explode(",", substr($userinfo['photo'], 1, strlen($userinfo['photo'])));
        $userinfo['headpic'] = $pic[0];
        $this->userinfo = $userinfo;
        $this->display("Mobile/me");

    }

    public function home()
    {
        $LoveModel = M('Lovetype');
        $love = $LoveModel->select();

        $umodel = M('User');
        if (isset($_GET['sex'])) {
            $recom['sex'] = $_GET['sex'];
        }
        $recom["isrecom"] = '1';
        $user = $umodel->where($recom)->order('id DESC')->limit(16)->select();

        foreach ($user as $k => $v) {
            $y = date('Y', time());
            $user[$k]['agenow'] = $y - $v['year'];
            $pic = explode(",", substr($v['photo'], 1, strlen($v['photo'])));
            $user[$k]['headpic'] = $pic[0];
        }

        // dump($user);
        $this->love = $love;
        $this->user = $user;


        $recomvcr = array('isrecom' => "1", 'vcrpath' => array('neq', ''));
        $uvcr = $umodel->where($recomvcr)->order('id DESC')->limit(6)->select();

        foreach ($uvcr as $k => $v) {
            $y = date('Y', time());
            $uvcr[$k]['agenow'] = $y - $v['year'];
            $pic = explode(",", substr($v['photo'], 1, strlen($v['photo'])));
            $uvcr[$k]['headpic'] = $pic[0];
        }
        $this->uvcr = $uvcr;

        if (session("uid") != "") {
            $userinfo = $umodel->where("id=%d", session("uid"))->find();
            $y = date('Y', time());
            $userinfo['agenow'] = $y - $userinfo['year'];
            $pic = explode(",", substr($userinfo['photo'], 1, strlen($userinfo['photo'])));
            $userinfo['headpic'] = $pic[0];
        }
        $this->userinfo = $userinfo;
        $this->display();
    }

    public function register()
    {
        if (IS_POST) {
            $model = M('User');
        } else {
            $this->display();
        }


    }

    public function register_two()
    {
        $model = M('User');
        $lastid = $model->field(array('id'))->order('id DESC')->find();
        $info = $_POST;
        //计算用户的id
        $info['id'] = $lastid['id'] + 1;
        $this->info = $info;

        $this->display();
    }

    public function likemeit()
    {
        $model = M('User');
        $aim["id"] = session("uid");
        $aimlike = $model->where($aim)->find();
        if ($aimlike["idcardpic"] == "1") {
            # code...

            $arr = explode(",", $aimlike["likeme"]);
            $aimuid["id"] = array("in", $arr);
            $alllike = $model->where($aimuid)->select();

            foreach ($alllike as $k => $v) {
                $y = date('Y', time());
                $alllike[$k]['agenow'] = $y - $v['year'];
                $pic = explode(",", substr($v['photo'], 1, strlen($v['photo'])));
                $alllike[$k]['headpic'] = $pic[0];
            }
            $this->user = $alllike;

            $this->display("likeme");
        } else {
            success("您还不是会员", U('Mobile/index'));
        }
    }

    public function register_three()
    {
        $userModel = M('User');
        $chModel = M('Chouser');
        //择偶表数据
        $data = array(
            'age' => I('cage'),
            'height' => I('cheight'),
            'nation' => I('cnation'),
            'qualification' => I('cqualification'),
            'housing' => I('chousing'),
            'work' => I('cwork'),
            'monthly' => I('cmonthly'),
            'marriage' => I('cmarriage'),
            'child' => I('cchild')
        );
        //user表数据插入
        $temp = I('post.');
        if (I('post.') == "") {
            success("不能为空！", "U('Index/index')");
        } else {
            $arr = array("username" => I('username'), "nickname" => I('nickname'), "name" => I('name'), "sex" => I('sex'), "age" => I('age'), "height" => I('height'), "weight" => I('weight'), "blood" => I('blood'), "password" => I('password'), "addip" => I('addip'), "logintime" => I('logintime'), "sex" => I('sex'), "age" => I('age'), "year" => I('year'), "month" => I('month'), "height" => I('height'), "weight" => I('weight'), "blood" => I('blood'), "ani" => I('ani'), "const" => I('const'), "nation" => I('nation'), "child" => I('child'), "qualification" => I('qualification'), "housing" => I('housing'), "monthly" => I('monthly'), "work" => I('work'), "workad" => I('workad'), "marriage" => I('marriage'), "wxnum" => I('wxnum'), "qqnum" => I('qqnum'), "intro" => I('intro'), "photo" => I('photo'), "smoking" => I('smoking'), "drinking" => I('drinking'), "car" => I('car'), "consumption" => I('consumption'), "shopping" => I('shopping'), "beliefs" => I('beliefs'), "livingwithparents" => I('livingwithparents'), "housework" => I('housework'), "getchild" => I('getchild'), "whenmarried" => I('whenmarried'), "wishlivewithparents" => I('wishlivewithparents'), "ranking" => I('ranking'), "parents" => I('parents'), "parentshealth" => I('parentshealth'), "brothersandsisters" => I('brothersandsisters'), "parentseconomic" => I('parentseconomic'), "vcrpath" => I('vcrpath'), "idcardpic" => I('idcardpic'), "addtime" => time());
            if ($id = $userModel->add($arr)) {
                //择偶表数据插入
                $data['uid'] = $id;
                if ($chModel->add($data)) {
                    $this->success('注册成功', U('Mobile/home'));
                    // $this->success('操作成功',"U('Index/index')");
                }
            } else {
                $this->error('操作错误，请重试', "U('Mobile/login')");
            }
        }

    }

    public function uploadimg()
    {
        $base64 = I("post.");
        $base64_image = str_replace(' ', '+', $base64);
        //post的数据里面，加号会被替换为空格，需要重新替换回来，如果不是post的数据，则注释掉这一行
        if (preg_match('/^(data:\s*image\/(\w+);base64,)/', $base64_image, $result)) {
            //匹配成功
            if ($result[2] == 'jpeg') {
                $image_name = uniqid() . '.jpg';
                //纯粹是看jpeg不爽才替换的
            } else {
                $image_name = uniqid() . '.' . $result[2];
            }
            $image_file = "./upload/test/{$image_name}";
            //服务器文件存储路径
            if (file_put_contents($image_file, base64_decode(str_replace($result[1], '', $base64_image)))) {
                return $image_name;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function dologin()
    {
        if (IS_AJAX) {
            $username = $_POST['username'];
            // $password=md5($_POST['password']);
            $password = $_POST['password'];
            //实例化user表
            $model = M('User');
            //存取结果
            $result = array();
            //判断用户名是否存在
            if ($user = $model->field(array('password', 'id', 'username', 'nickname'))->where(array('username' => $username))->find()) {
                if ($user['password'] == $password) {
                    $result = array('success' => '1', 'msg' => '登录成功');
                    //更改登录状态
                    $data['logintime'] = time();
                    $data['loginip'] = ip2long(get_client_ip());
                    $data['id'] = $user['id'];
                    $model->save($data);
                    session('uid', $user['id']);
                    session('username', $user['username']);
                    session('nickname', $user['nickname']);
                } else {
                    $result = array('success' => '-1', 'msg' => '密码错误，请重试');
                }
            } else {
                $result = array('success' => '-1', 'msg' => '用户不存在');
            }
            echo json_encode($result);
        }
    }

    public function keepuserinfos()
    {
        $pic = I('post.pic');
        $userModel = D("user");
        $aim["id"] = session('uid');
        if ($_FILES['pic']['name'] != '') {
            //图片上传
            $upload = new \Think\Upload();// 实例化上传类    
            $upload->maxSize = 10000000;// 设置附件上传大小    
            $upload->exts = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型    
            $upload->rootPath = './Public/Uploads/User/'; // 设置附件上传目录    // 上传文件     
            $upload->autoSub = false;
            $info = $upload->upload();
            // dump($info);
            if (!$info) {

                $this->error($upload->getError());
                echo "string";
                die;
            } else {
                $picName = $info['pic']['savename'];
                $image = new \Think\Image();
                $thumbName = "thumb_" . $info['pic']['savename'];
                $image->open('./Public/Uploads/User/' . $picName);// 生成缩略图thumb.jpg
                $src = $image->thumb(200, 200)->save('./Public/Uploads/User/' . $thumbName);
                unlink('./Public/Uploads/User/' . $pic);
                unlink('./Public/Uploads/User/' . "thumb_" . $pic);
            }
            $arr['pic'] = $picName;
        } else {
            $arr['pic'] = $pic;
        }

        // $this->success('操作成功'.I('get.uid')."//".I('post.'));
        $arr = I('post.');
        // 
        // dump($arr);die;


        if ($userModel->where($aim)->save($arr)) {

            success('操作成功', U('Mobile/personal', array("uid" => session('uid'))));

        } else {

        }
    }
    // ,/pianai/Public/Admin/kindeditor-4.1.10/attached/image/Hydrangeas.jpg,/pianai/Public/Admin/kindeditor-4.1.10/attached/image/20170824/20170824072058_53492.jpg,/pianai/Public/Admin/kindeditor-4.1.10/attached/image/20170824/20170824072106_28646.jpg
    // ,/pianai/Public/Admin/kindeditor-4.1.10/attached/image/20170824/20170824072058_53492.jpg,/pianai/Public/Admin/kindeditor-4.1.10/attached/image/20170824/20170824072106_28646.jpg
    // ,/pianai/Public/Admin/kindeditor-4.1.10/attached/image/Hydrangeas.jpg,/pianai/Public/Admin/kindeditor-4.1.10/attached/image/20170824/20170824072058_53492.jpg,/pianai/Public/Admin/kindeditor-4.1.10/attached/image/20170824/20170824072106_28646.jpg
    public function personal()
    {
        $model = D('User');
        $aim["id"] = I("uid");
        $user = $model->where($aim)->find();
        $pic = explode(",", substr($user['photo'], 1, strlen($user['photo'])));
        $user['headpic'] = $pic;
        // dump($user);die;
        $y = date('Y', time());
        $agenow = $y - $user['year'];

        if (I("uid") == session("uid")) {
            # code...
            $user['agenow'] = $user['year'];
        } else {
            $user['agenow'] = $agenow;
        }

        // dump($user);

        $chModel = M('Chouser');
        $chaim["uid"] = I("uid");

        $chuser = $chModel->where($chaim)->find();
        // dump($chuser);die;

        $this->chuser = $chuser;

        $recom["isrecom"] = 1;
        $userrecom = $model->where($recom)->select();
        //dump($userrecom);die;
        $this->userrecom = $userrecom;


        $this->user = $user;

        $this->display();
    }

    public function find_accurate()
    {
        $model = D('User');
        $sort = 'id DESC';

        if (!session('username') || !session('uid')) {
            $this->error('请登录', U('login/login'));
        } else {
            $chModel = M('Chouser');
            $chaim["uid"] = session('uid');
            $chuser = $chModel->where($chaim)->find();
            $arr = array("marriage" => $chuser["marriage"], "child" => $chuser["child"]);
            $list = $model->where($arr)->search('20', $sort);
        }
        if ($_GET['sid'] != '') {
            $sort = 'id DESC';
        }
        if ($_GET['sage'] != '') {
            $sort = 'year DESC';
        }
        if ($_GET['sheight'] != '') {
            $sort = 'height DESC';
        }
        if ($_GET['smonthly'] != '') {
            $sort = 'monthly DESC';
        }
        $list = $model->search('20', $sort);
        $user = $list['list'];
        //得到具体年龄
        foreach ($user as $k => $v) {
            $y = date('Y', time());
            $user[$k]['agenow'] = $y - $v['year'];
        }
        //获取文件后缀
        $query = $_SERVER['QUERY_STRING'];
        $this->query = $query;
        $this->search = $_GET;
        $this->user = $user;
        $this->page = $list['page'];
        $this->display();
    }

    public function find_vcr()
    {
        $model = D('User');
        $sort = 'id DESC';
        //$arr=array("marriage"=>$chuser["marriage"],"child"=>$chuser["child"]);
        $querys["vcrpath"] = array('NEQ', '');

        $count = $model->where($querys)->count();// 查询满足要求的总记录数
        $Page = new \Think\Page($count, 25);// 实例化分页类 传入总记录数和每页显示的记录数(25)
        $list = $model->where($querys)->order('id desc')->limit($Page->firstRow . ',' . $Page->listRows)->select();
        $this->user = $list;
        $show = $Page->show();// 分页显示输出
        $this->display("find_news");
    }

    public function find_news()
    {
        $model = D('news');
        $aim["type"] = I("type");
        //$arr=array("marriage"=>$chuser["marriage"],"child"=>$chuser["child"]);
        $list = $model->where($aim)->select();
        $this->newslist = $list;
        $this->display();
    }

    public function likeit()
    {
        $model = D('user');


        $aim["id"] = I("hisid");
        $aimuser = $model->where($aim)->find();

        $arr["likeme"] = $aimuser["likeme"] . "," . session("uid");
        $res = $model->where($aim)->save($arr);
        if ($res) {
            echo "1";
        } else {
            echo "0";
        }
    }

    //求照片
    public function needPhoto()
    {
        $uid = I('uid');
        $this->assign('uid', $uid);
        $userModel = M('user');
        $photo = $userModel->field('photo')->where("id=$uid")->find();
        $pic = explode(",", substr($photo['photo'], 1, strlen($photo['photo'])));

        $this->assign('pic', $pic);
        $this->display();


    }

    //个人VCR
    public function personVCR()
    {
        $uid = I('uid');
        $userModel = M('user');
        $this->assign('uid', $uid);
        $video = $userModel->where("id=$uid")->field('vcrpath')->find();
        $video = $video['vcrpath'];

        $this->assign('video', $video);

        $this->display();
    }


    public function about()
    {

        //  $model=D('news');
        //  $aim["type"] = I("type");
        // //$arr=array("marriage"=>$chuser["marriage"],"child"=>$chuser["child"]);
        //  $list=$model->where($aim)->select();
        //  $this->newslist=$list;
        $this->display();
    }

    public function more_search()
    {

        $cont = I('cont');
        $id = I('type');
        if ($id == "0") {
            if ($cont == "男") {
                $where['sex'] = 1;
            } else {
                $where['sex'] = 2;
            }

        } else if ($id == '1') {
            $cont = explode('~', $cont);
            $years = date("Y");
            //$where['year']=array('gt',$years-$cont[1]);
            //$where['year']=array('lt',$years-$cont[0]);
            if (!empty($cont[1])) {
                $a = $years - $cont[1];
                $b = $years - $cont[0];
                $where['year'] = array('between', "$a,$b");
            } else {
                $where['year'] = array('lt', $years - 35);
            }
        } else if ($id == '2') {
            $where['height'] = $cont;
        } else if ($id == '3') {
            if ($cont == "单身") {
                $where['marriage'] = 3;
            } else if ($cont == "离婚") {
                $where['marriage'] = 1;
            } else {//丧偶
                $where['marriage'] = 2;
            }
        } else if ($id == '4') {


            if ($cont == "无") {
                $where['child'] = 3;
            } else if ($cont == "有同主") {
                $where['child'] = 2;
            } else {
                $where['child'] = 1;
            }

        }
        $userModel = M('user');
        $userinfo = $userModel->where($where)->select();
        foreach ($userinfo as $k => $v) {
            $y = date('Y', time());
            $userinfo[$k]['agenow'] = $y - $v['year'];
            $pic = explode(",", substr($v['photo'], 1, strlen($v['photo'])));
            $userinfo[$k]['headpic'] = $pic[0];
        }
        //  dump($userinfo);die;


        if ($userinfo) {
            echo json_encode(array(
                'succ' => 1,
                'userinfo' => $userinfo,
            ));
        } else {
            echo "0";
        }

    }

    public function search_gril()
    {
        $userModel = M('user');
        $sex = I('sex');
        if ($sex == '1') {
            $where['sex'] = 1;
        } else {
            $where['sex'] = 2;
        }
        $userinfo = $userModel->where($where)->select();

        foreach ($userinfo as $k => $v) {
            $y = date('Y', time());
            $userinfo[$k]['agenow'] = $y - $v['year'];
            $pic = explode(",", substr($v['photo'], 1, strlen($v['photo'])));
            $userinfo[$k]['headpic'] = $pic[0];
        }
        //  dump($userinfo);die;


        if ($userinfo) {
            echo json_encode(array(
                'succ' => 1,
                'userinfo' => $userinfo,
            ));
        } else {
            echo "0";
        }

        //$this->display("serch");
    }

    /* public function search_men()
     {
        $userModel=M('user');
      $userinfo=$userModel->where("sex=1")->select();

       foreach($userinfo as $k =>$v){
          $y=date('Y',time());
          $userinfo[$k]['agenow']=$y-$v['year'];
             $pic=explode(",",substr($v['photo'],1,strlen($v['photo'])));
             $userinfo[$k]['headpic']=$pic[0];
       }
     //  dump($userinfo);die;


      if($userinfo)
      {
        echo json_encode(array(
            'succ'=>1,
            'userinfo'=>$userinfo,
          ));
      }else
      {
        echo "0";
      }

     }*/

}