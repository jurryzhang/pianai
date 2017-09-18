<?php

namespace Admin\Controller;

use Think\Controller;

class AccessController extends Controller
{
    public function login()
    {
        layout(false);
        if (!empty($_POST)) {
            $admin = D('Admin');
            if (array_key_exists('username', $_POST) && array_key_exists('password', $_POST)
                    && array_key_exists('captcha', $_POST) && $_POST['username']
                && $_POST['password'] && $_POST['captcha']) {
                // 先判断验证码 array('verify_code'=>'当前验证码的值','verify_time'=>'验证码生成的时间戳')
                $verify = new \Think\Verify();
                if(!$verify->check($_POST['captcha']))
                {
                    error("验证码错误", U('Access/login'));
                }
                $where = [
                    'username' => $_POST['username'],
                    'password' => md5($_POST['password']),
                ];
                $data = $admin->where($where)->find();
                if ($data == NULL) {
                    error("用户名或密码错误", U('Access/login'));
                } else {

                    $id = $data['id'];
                    session('aid', $id);

                    session('adminMsg', $data);

                    $admin_name = $data['username'];
                    session('adminName', $admin_name);

                    //跳转
                    $this->redirect('Index/index');
                }
            } else {
                error('请输入用户名和密码,以及验证码', U('Access/login'));
            }
        } else {
            $this->display('login');
        }
    }

    //创建一个用来产生验证码的方法
    public function captcha()
    {
        $Verify = new \Think\Verify();
        $Verify->entry();
        /*//创建验证码图片
        //1.加载验证码类
        import("ORG.Util.Image");
        //Image::buildImageVerify(4,1,'png','140','35');
        $fontface = dirname(THINK_PATH) . "/Public/msyh.ttf";
        Image::GBVerify(1, 'png', '140', '35', $fontface);*/
    }

    //退出登陆
    public function Logout()
    {
        session(null);
        layout(false);
        if (!session("?isLogin") || session("?isLogin") != 1) {
            $this->redirect('Access/login');
        }
    }

}
