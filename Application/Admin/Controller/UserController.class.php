<?php

namespace Admin\Controller;

use Think\Controller;

class UserController extends BaseController
{
    public function index()
    {
        $model = M('User');
        $count = $model->count();
        //分页，20个每页
        $tot = 20;
        $page = new \Think\Page($count, $tot);
        $show = $page->show();
        $user = $model->field(array('id', 'name', 'nickname', 'age', 'qualification', 'sex', 'loginip', 'logintime', 'isrecom', 'vcrpath', 'ismember'))->order('id DESC')->limit($page->firstRow . ',' . $page->listRows)->select();
//        $this->assign('list', $list);
        //总量大于每页个数进行分页
        if ($count <= $tot) {
            $show = '';
        }
        $this->assign('page', $show);
        $this->user = $user;
        $this->display();
    }

    public function updaterecom()
    {
        $model = M('User');
        $aimuid["id"] = I("uid");
        $type = $_GET['type'];
        if ($type == 1) {
            $data['isrecom'] = I("isrecom");
        } else {
            $data['ismember'] = I("isrecom");
        }
        $res = $model->where($aimuid)->save($data);
        if (!empty($res)) {
            echo 1;
        } else {
            echo 0;
        }

    }

    // 就是个查看详情
    public function edit()
    {
        $id = $_GET['id'];
        $model = M('User');
        $user = $model->field(array('id', 'name', 'nickname', 'age', 'qualification', 'sex', 'loginip', 'logintime', 'isrecom', 'vcrpath', 'ismember'))->where("id=$id")->select();
        $this->user = $user;
        $this->display();
    }

    public function delete()
    {
        $uid["id"] = I("id");


        $model = M("User");

        if ($model->where($uid)->delete()) {
            echo '1';

        } else {
            echo '0';
        }
    }

    public function doAddvcr()
    {

        $uid["id"] = I("uid");
        $model = D("User");
        if (!empty($_FILES['thumb']['name'])) {

            $imgsrc = $model->where($uid)->find();
            if (file_exists(SITE_DIR . "/Public/Uploads/vcr/" . $imgsrc['vcrpath'])) {
                unlink(SITE_DIR . "/Public/Uploads/vcr/" . $imgsrc['vcrpath']);
                //  success(SITE_DIR."/Public/Uploads/".$imgsrc['thumb']."删除图片成功！");
            }
            $upload = new \Think\Upload();// 实例化上传类
            $upload->maxSize = 31457280;// 设置附件上传大小
            $upload->exts = array('mp4');// 设置附件上传类型
            $upload->rootPath = './Public/'; // 设置附件上传根目录
            $upload->savePath = './Uploads/vcr/';// 设置附件上传目录

            $upload->autoSub = false;
            // 上传文件
            $info = $upload->upload();
            if (!$info) {// 上传错误提示错误信息
                $this->error($upload->getError());
            } else {// 上传成功
                $this->success('上传成功！');
                foreach ($info as $file) {
                    $vcrpath = $file['savename']; // 保存上传的照片根据需要自行组装
                }
            }

        }

        // $arr=array("vcrpath"=>$vcrpath);
        if ($vcrpath != "") {
            $arr["vcrpath"] = $vcrpath;
        }
        //插入数据库
        if ($model->where($uid)->save($arr)) {
            success("添加成功", U('User/index'));
        } else {
            error("添加失败！");
        }
    }

    public function deleteimg()
    {

        $imgsrc = I("imgsrc");
        if (unlink($imgsrc)) {
            echo "1";
        } else {
            echo "0";
        }
    }
}