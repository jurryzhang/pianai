<?php

namespace Home\Controller;

use Think\Controller;

class UserinfoController extends Controller
{
    public function index()
    {
        $model = D('User');
        $u = I("u");
        if ($u) {
            $aim["id"] = session("uid");
        } else {
            $aim["id"] = I("uid");
        }

        $user = $model->where($aim)->find();

        $likeme = explode(',', $user['likeme']);

        for ($i; $i < count($likeme); $i++) {
            $am["id"] = $likeme["$i"];
            $a = $model->where($am)->find();
            $us["$i"] = $a;
        }

        $chModel = M('Chouser');
        $chaim["uid"] = I("uid");

        $chuser = $chModel->where($chaim)->find();
        $this->chuser = $chuser;

        $recom["isrecom"] = 1;
        $pic = explode(",", substr($v['photo'], 1, strlen($v['photo'])));
        $uvcr[$k]['headpic'] = $pic[0];
        $userrecom = $model->where($recom)->select();
        $this->userrecom = $userrecom;

        //$user=$list['list'];
        // //得到具体年龄
        // foreach($user as $k =>$v){
        // 	  $y=date('Y',time());
        // 	  $user[$k]['agenow']=$y-$v['year'];
        // }
        // //获取文件后缀
        // $query=$_SERVER['QUERY_STRING'];
        // $this->query=$query;
        // $this->search=$_GET;
        // var_dump($user);exit;
        $id["id"] = session('uid');
        $ue = $model->where($id)->find();


        $like = session('uid');

        if (strpos($user['likeme'], $like) !== false) {
            $user['li'] = '0';
        } else {
            $user['li'] = '1';
        }

        $im["id"] = session('uid');
        $me = $model->where($im)->find();
        if (!empty($im["id"])) {
            $user['geren'] = session('uid');
        }

        $this->user = $user;
        $this->us = $us;
        $this->ue = $ue;
        $this->me = $me;

        // var_dump($me);
        // $this->page=$list['page'];

        // echo "<pre>";
        //var_dump($user);
        $this->display();
    }


    public function updateuserinfo()
    {
        $userModel = D("user");
        $aim["id"] = session('uid');
        // $this->success('操作成功'.I('get.uid')."//".I('post.'));
        $arr = I('post.');

        if ($userModel->where($aim)->save($arr)) {

            success('操作成功');

        } else {
            error('操作错误，请重试', U('Index/index'));
        }

    }

    public function updateuserimg()
    {
        $userModel = D("user");
        $where["id"] = session('uid');
        $arr = $userModel->where($where)->find();

        //获得用户原来的头像
        $oldImg = $arr['photo'];
        $oldImgArr = explode(',', trim($oldImg, ','));
        //print_r($oldImgArr);

        //上传新头像
        $uploadOb = new \Think\Upload();
        $uploadOb->exts = array('jpg', 'gif', 'png', 'jpeg');
        $uploadOb->autoSub = false;
        $uploadOb->rootPath = "./Public/Admin/kindeditor-4.1.10/attached/";
        $uploadOb->savePath = "image/";
        $imageRe = $uploadOb->upload();
        if ($imageRe) {
            //删除用户原头像
            foreach ($oldImgArr as $v) {
                if ($v != '/pianai/Public/Admin/kindeditor-4.1.10/attached/image/Hydrangeas.jpg') {
                    $v = str_replace('/pianai', '.', $v);
                    @unlink($v);
                }
            }
            $photo = '';
            foreach ($imageRe as $v) {
                $photo .= ',/pianai/Public/Admin/kindeditor-4.1.10/attached/image/' . $v['savename'];
            }
            $re = $userModel->where($where)->save(array('photo' => $photo));
            if ($re) {
                $this->success('修改成功！');
            } else {
                $this->error('修改失败');
            }
        }
    }


}