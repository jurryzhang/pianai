<?php

namespace Admin\Controller;

use Think\Controller;

class IndexController extends BaseController
{

    public function index()
    {
        $this->display();
    }

    public function in()
    {
        $this->display(T('Home@Index/index'));
    }
}