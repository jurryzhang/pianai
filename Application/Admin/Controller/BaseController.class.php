<?php

namespace Admin\Controller;

use Think\Controller;

class BaseController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $url = U('access/login');
        check_admin_login($url);
    }
}