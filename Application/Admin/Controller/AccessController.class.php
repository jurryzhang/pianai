<?php

namespace Admin\Controller;

use Think\Controller;

class AccessController extends Controller
{
    //登陆 ---
    public function login()
    {
        layout(false);
        if (!empty($_POST)) {
            $admin = D('Admininfo');
            if ($admin->create($_POST, 5)) {
                $adminName = $_POST['adminName'];
                $password = md5($_POST['password']);
                $data = $admin->where("adminName='%s' and password='%s'", $adminName, $password)->find();
                if ($data == NULL) {
                    error("用户名或密码错误", 'Access/login');
                } else {

                    $aid = $data['aid'];
                    session('adminMsg', $data);
                    $admin_name = $data['adminname'];


                    session('adminName', $admin_name);


                    session('aid', $aid);
                    //执行登陆

                    //跳转
                    $this->redirect('Index/index');
                }
            } else {
                error($admin->getError(), U('Access/login'));
            }
        } else {
            $this->display('login');
        }
    }

    //创建一个用来产生验证码的方法
    public function captcha()
    {
        //创建验证码图片
        //1.加载验证码类
        import("ORG.Util.Image");
        //Image::buildImageVerify(4,1,'png','140','35');
        $fontface = dirname(THINK_PATH) . "/Public/msyh.ttf";
        Image::GBVerify(1, 'png', '140', '35', $fontface);
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
