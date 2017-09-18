<?php

namespace Admin\Controller;

use Think\Controller;

class AdminController extends BaseController
{
    //管理员列表
    public function index()
    {
        $model = M('Admin');
        $admin = $model->select();
        $this->admin = $admin;
        $this->display();
    }

    //修改管理员密码
    public function edit()
    {
        $id = $_GET['id'];
        $model = M('Admin');
        if (IS_POST) {
            $data['password'] = md5($_POST['password']);
            $data['id'] = $_POST['id'];
            if ($model->save($data)) {
                $this->assign('status', 1);
                $this->display('Admin/index');
            }
        }
        $admin = $model->find($id);
        $this->admin = $admin;
        $this->display();
    }

    public function add()
    {
        //添加管理员
        if (!empty($_POST)) {
            $adminModel = D('Admin');
            $username = $_POST['username'];
            //判断管理员是否存在
            if ($adminModel->where(array('username' => $username))->find()) {
                $this->error('管理员已存在');
            } else {
                $data['username'] = $username;
                $data['password'] = md5($_POST['password']);
                $data['addtime'] = time();
                $data['logintime'] = time();
                $data['addip'] = ip2long($_SERVER['REMOTE_ADDR']);
                $data['loginip'] = ip2long($_SERVER['REMOTE_ADDR']);
                if ($adminModel->add($data)) {
                    redirect(U('index'));
                } else {
                    $this->error('添加失败', 'add');
                }
            }
        }
        $this->display();
    }

    //删除管理员
    public function delete()
    {
        if (IS_AJAX) {
            $id = $_POST['id'];
            $model = M('Admin');
            if ($model->delete($id)) {
                echo '1';
            } else {
                echo '0';
            }
        }
    }
}