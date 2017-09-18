<?php

namespace Admin\Controller;

use Think\Controller;

class UserpdController extends BaseController
{
    //配对用户添加
    public function add()
    {
        if (!empty($_POST)) {
            $arr = array('user1name' => $_POST['user1name'],
                'user1id' => $_POST['user1id'],
                'user2name' => $_POST['user2name'],
                'user2id' => $_POST['user2id'],
                'lovem' => $_POST['lovem'],
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

    }
}