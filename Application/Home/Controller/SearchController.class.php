<?php

namespace Home\Controller;

use Think\Controller;

class SearchController extends Controller
{
    public function index()
    {
        $model = D('User');
        $sort = 'id DESC';
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

            $pic = explode(",", $v['photo']);
            $user[$k]['headpic'] = $pic[1];
        }
        //获取文件后缀
        $query = $_SERVER['QUERY_STRING'];
        $this->query = $query;
        $this->search = $_GET;
        $this->user = $user;
        $this->page = $list['page'];
        $this->display();
    }


    //精准推荐
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
        // dump($list);
        $this->user = $list;
        $show = $Page->show();// 分页显示输出
        $this->display();
    }

    public function find_news()
    {
        $model = D('news');
        $aim["type"] = I("type");
        $count = $model->where($aim)->count();

        $page = new \Think\Page($count, 10);
        $show = $page->show();
        $aim["type"] = I("type");
        //$arr=array("marriage"=>$chuser["marriage"],"child"=>$chuser["child"]);
        $list = $model->where($aim)->limit($page->firstRow . ',' . $page->listRows)->select();
        // dump($list);die;
        $this->assign('list', $list);
        //总量大于每页个数进行分页
        if ($count > $tot) {
            $this->assign('page', $show);
        }
        $list = $list > 0 ? $list : '';
        $this->newslist = $list;
        $this->display();
    }

    public function likeit()
    {
        $model = D('user');
        $aim["id"] = I("hisid");
        $aimuser = $model->where($aim)->find();
        if (strpos($aimuser["likeme"], session("uid")) !== false) {
            $res = false;
        } else {
            $arr["likeme"] = $aimuser["likeme"] . "," . session("uid");
            $res = $model->where($aim)->save($arr);
        }


        if ($res) {
            echo "1";
        } else {
            echo "0";
        }
    }


}