<?php

namespace Admin\Controller;

use Think\Controller;

class AdminController extends BaseController
{
    //管理员列表
    public function index()
    {
        $model = M('Admin');
        $where = array();
        $admin = $model->where($where)->select();
        $this->admin = $admin;
        $this->display();
    }

    //修改管理员密码
    public function edit()
    {
        $id = $_GET['id'];
        $model = D('Admin')->find($id);
        if(!$model)
        {
            error('系统错误', U('Index/index'));
        }
        if (IS_POST) {
            $pass_old = isset($_POST['password_old'])?$_POST['password_old']:'';
            $pass_new = isset($_POST['password_new'])?$_POST['password_new']:'';
            $pass_new_reply = isset($_POST['password_new_reply'])?$_POST['password_new_reply']:'';
            if(empty($pass_old) || empty($pass_new)||empty($pass_new_reply))
            {
                error('请填写必填字段', U('Admin/edit'));
            }
            if($model['password'] != md5($pass_old))
            {
                error('密码错误', U('Admin/edit'));
            }
            if($pass_new == $pass_old)
            {
                error('新老密码不能一样', U('Admin/edit'));
            }
            if($pass_new!=$pass_new_reply)
            {
                error('两次密码输入不一致', U('Admin/edit'));
            }
            $model['password'] = md5($pass_new);
            if (D('Admin')->save($model)) {
                $this->assign('status', 1);
                $this->display('Admin/index');
            }
        }
        $this->admin = $model;
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