<?php

namespace Admin\Controller;

use Think\Controller;

class UserpdController extends BaseController
{
    //配对用户添加
    public function add()
    {
        if (!empty($_POST)) {
            $arr = array(
                'user1id' => $_POST['user1id'],
                'user2id' => $_POST['user2id'],
                'lovemid' => $_POST['lovemid'],
                'love' => $_POST['love'],
                'userpdn' => $_POST['userpdn'],
                'userpdy' => $_POST['userpdy'],
                'userpdr' => $_POST['userpdr']
            );
            $Userpd = D('userpd');
            $rst = $Userpd->add($arr);
            if ($rst) {
                $this->assign('status', 1);
                $this->display('Userpd/index');
            } else {
                $this->error('添加失败', 'index');
            }
        } else {
            $this->display('Userpd/add');
        }
    }

    //配对用户列表
    public function index()
    {
        $pdm = D('userpd');
        $wherepd = array();
        if($_POST && array_key_exists('keyword', $_POST))
        {
            $keyword = '"%'.$_POST['keyword'].'%"';
            $where = '`id` like '.$keyword.' OR `name` like '.$keyword.' OR `nickname` like '.$keyword.' OR `username` like '.$keyword;
            $users = D('user')->where($where)->select();
            $ids = array_column($users, 'id');
            $wherepd = array(
                'lovemid' => array('in', $ids),
            );
        }
        $pdms = $pdm->where($wherepd)->select();
        foreach ($pdms as $k=>&$v)
        {
            $user1 = D('user')->find($v['user1id']);
            $user2 = D('user')->find($v['user2id']);
            $lovem = D('user')->find($v['lovemid']);
            $v['user1name'] = $user1['username'];
            $v['user2name'] = $user2['username'];
            $v['lovem'] = $lovem['username'];
        }

        $this->assign('pdms', $pdms);
        $this->display();
    }
}