<?php

namespace Home\Controller;

use Think\Controller;

class OtherController extends Controller
{
    public function index()
    {
        $LoveModel = M('n');
        $aim["nid"] = I("nid");
        $data = $LoveModel->where($aim)->find();
        $this->datas = $data;
        $this->display();
    }

}