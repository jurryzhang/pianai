<?php

namespace Home\Controller;

use Think\Controller;

class CommonController extends Controller
{
    function success($msg, $url)
    {
        header('content_type:text/html;charset=utf-8');
        echo "<script type='text/javascript'>
      alert('$msg');
      location.href='$url';
      </script>";
        die;
    }

    public function __construct()
    {
        parent::__construct();
        //判断是否已经登录
        if (!session('username') || !session('uid') || !session('nickname')) {
            // $this->error('请登录',U('login/login'));
            //$this->logintrue="0";
        } else {
            // $this->logintrue="1";
            // $this->userid=session('uid');
        }
    }
}