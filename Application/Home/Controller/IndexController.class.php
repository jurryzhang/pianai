<?php

namespace Home\Controller;

use Think\Controller;
use Think\Upload;

class IndexController extends CommonController
{

    public function __construct()
    {
        parent::__construct();
        if (is_mobile()) {
            $this->redirect('Mobile/index');
            //  $this->success("fads",U('Mobile/index'));
        }
        // $this->redirect(U('Mobile/index'));

    }

    public function lg_regist()
    {
        $this->display();
    }

    public function index()
    {
        // 获取菜单列表页
        $LoveModel = M('Lovetype');
        $love = $LoveModel->select();
        // 获取-被推荐-交友的用户,根据id顺序取后6位
        $umodel = M('User');
        $recom["isrecom"] = '1';
        $user = $umodel->where($recom)->order('id DESC')->limit(2)->select();
        // 处理用户数据
        foreach ($user as $k => $v) {
            // 当前年龄, --todo: 如果用户没有填写生日的话,没有处理
            $y = date('Y', time());
            $user[$k]['agenow'] = $y - $v['year'];
            // dump($user);
            $pic = explode(",", substr($v['photo'], 1, strlen($v['photo'])));
            $user[$k]['headpic'] = $pic[0];
        }
        $this->love = $love;
        $this->user = $user;

        // 优质VCR
        $recomvcr = array('isrecom' => "1", 'vcrpath' => array('neq', ''));
        $uvcr = $umodel->where($recomvcr)->order('id DESC')->limit(2)->select();
        // dump($uvcr);die;
        foreach ($uvcr as $k => $v) {
            $y = date('Y', time());
            $uvcr[$k]['agenow'] = $y - $v['year'];
            $pic = explode(",", substr($v['photo'], 1, strlen($v['photo'])));
            $uvcr[$k]['headpic'] = $pic[0];
        }
        $this->uvcr = $uvcr;


        // 婚恋家庭教育
        $newsModel = D('news');
        $where = array();
        $edu = $newsModel->where($where)->order('sequence DESC')->limit(2)->select();
        foreach ($edu as $k => &$v) {
            $v['addTime'] = date('Y-m-d h:i:s', $v['addTime']);
            $v['upTime'] = date('Y-m-d h:i:s', $v['upTime']);
        }
        $this->edu = $edu;

        // 同城佳丽
        // 同城的条件,
        $where = array('sex' => '2');
        $women = $umodel->where($where)->order('id DESC')->limit(2)->select();
        foreach ($women as $k => $v) {
            // 当前年龄, --todo: 如果用户没有填写生日的话,没有处理
            $y = date('Y', time());
            $women[$k]['agenow'] = $y - $v['year'];
            $pic = explode(",", substr($v['photo'], 1, strlen($v['photo'])));
            $women[$k]['headpic'] = $pic[0];
        }
        $this->women = $women;

        // 节目视频
        $vModel = D('video');
        $where = array();
        $videos = $vModel->where($where)->order('id DESC')->limit(2)->select();
        foreach ($videos as $k => $v) {
            $pic = explode(",", substr($v['video'], 1, strlen($v['video'])));
            $videos[$k]['video'] = $pic[0];
        }
        $this->videos = $videos;

        // 活动视频

        // 成功案例
        $pdmodel = D('userpd');
        $where = array();
        $pds = $pdmodel->where($where)->order('id DESC')->limit(2)->select();
        $this->pds = $pds;


        $this->display();
    }

    public function register_no1()
    {
        //注册信息

        $data = array(
            'year' => I('year'),
            'sex' => I('sex'),
            'month' => I('month'),
            'workad' => I('workad'),
            'marriage' => I('marriage')
        );

        $this->info = $data;
        $this->display();
    }

    public function register_no2()
    {
        $model = M('User');
        $lastid = $model->field(array('id'))->order('id DESC')->find();
        $info = $_POST;
        //计算用户的id
        $info['id'] = $lastid['id'] + 1;
        $this->info = $info;
        $this->display();
    }

    //ajax判断用户是否已经注册过
    public function ajaxregister()
    {
        $where['username'] = $_POST['username'];
        //实例化user表
        $model = M('User');
        if ($model->where($where)->find()) {
            echo 1;
        } else {
            echo 0;
        }
    }

    public function register()
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
                    $this->success('注册成功', 'Index/index');
                    // $this->success('操作成功',"U('Index/index')");
                }
            } else {
                $this->error('操作错误，请重试', "U('Index/index')");
            }
        }
        // if($userModel->create(I('post.'))){

        //}
    }

    //ajax上传图片处理
    public function ajaxpic()
    {
        $idcard = $_GET['idcard'];
        if ($idcard == '1') {
            $pic = json_decode(uploadImage('Idcard'));
        } else {
            $pic = json_decode(uploadImage('Photo'));
        }
        $imgPath = str_replace('\\', '/', str_replace('./Uploads', '/Uploads', $pic->filePath));
        $imgPath = array('success' => $imgPath);
        echo json_encode($imgPath);
    }

    public function deleteimg()
    {

        $imgsrc = I("imgsrc");
        if (unlink($imgsrc)) {
            echo "1";
        } else {
            echo "0";
        }
    }
}