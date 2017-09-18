<?php

namespace Home\Controller;

use Think\Controller;

class LoginController extends Controller
{

    public function __construct()
    {
        parent::__construct();
        if (is_mobile()) {
            $this->redirect('Mobile/login');
        }


    }

    public function login()
    {
        $this->display();
    }

    //ajax判断登录是否正确
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


    public function exitlogin()
    {
        $_SESSION = array();
        if (isset($_COOKIE[session_name()])) {
            setcookie(session_name(), '', time() - 1, '/');
        }
        session_destroy();
        $this->success("退出成功");

    }
}