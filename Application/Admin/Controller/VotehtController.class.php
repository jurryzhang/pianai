<?php

namespace Admin\Controller;

use Think\Controller;

class VotehtController extends BaseController
{
    public function add()
    {
        $this->display("add");
    }

    public function save()
    {
        if (!empty($_FILES['thumb']['name'])) {
            $upload = new \Think\Upload();// 实例化上传类
            $upload->maxSize = 31457280;// 设置附件上传大小
            $upload->exts = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
            $upload->rootPath = './Public/'; // 设置附件上传根目录
            $upload->savePath = './Admin/note/';// 设置附件上传目录

            $upload->autoSub = false;
            // 上传文件
            $info = $upload->upload();
            if (!$info) {// 上传错误提示错误信息
                $this->error($upload->getError());
            } else {// 上传成功
                $this->success('上传成功！');
                foreach ($info as $file) {
                    $thumb = $file['savename']; // 保存上传的照片根据需要自行组装
                }
            }
        }
        $arr = array(
            'title' => I("title"),
            'intro' => I("intro"),
            'content' => I("content"),
            'pic' => $thumb,
            'addtime' => time()
        );
        $model = D("articles");
        $result = $model->add($arr);
        if ($result) {
            success("添加成功", U('Voteht/info_list'));
        } else {
            error("添加失败", U('Voteht/info_list'));
        }
    }

    public function info_list()
    {
        $model = D("articles");
        $count = $model->count();
        //$Page = new \Think\Page($count,25);// 实例化分页类 传入总记录数和每页显示的记录数(25)


        // $page->setConfig('theme',"%totalRow% %header% &nbsp; 当前第 %nowPage% 页 &nbsp; 共 %totalPage% 页   %upPage% %first% %prePage% <span class='link'>%linkPage%</span> %downPage% %nextPage% %end%");
        // $show=$page->show();
        $result = $model->order("tid desc")->select();

        //$this->assign('page',$show);
        //$result=$model->order("addtime desc")->select();
        $this->assign("result", $result);
        $this->display("list");
    }

    public function del()
    {
        $model = D("articles");
        $aim['tid'] = I("tid");
        $result = $model->where($aim)->delete();
        if ($result) {
            echo 1;
        } else {
            echo 0;
        }

    }

    public function edit()
    {
        $model = D("articles");
        $aim['tid'] = I("tid");
        $result = $model->where($aim)->find();
        //var_dump($result);exit;
        $this->assign("result", $result);
        $this->display("edit");

    }

    public function doedit()
    {
        $model = D("articles");
        $aim['tid'] = I("tid");
        if (!empty($_FILES['thumb']['name'])) {
            //引入上传文件
            import('ORG.Net.UploadFile');
            $upload = new UploadFile();// 实例化上传类
            $upload->maxSize = 3145728;// 设置附件上传大小
            $upload->allowExts = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
            $upload->savePath = './Public/Admin/note/';// 设置附件上传目录
            if (!$upload->upload()) {// 上传错误提示错误信息
                $this->error($upload->getErrorMsg());

            } else {// 上传成功 获取上传文件信息
                $info = $upload->getUploadFileInfo();
            }
            $thumb = $info[0]['savename']; // 保存上传的照片根据需要自行组装
        } else {
            $thumb = "";
        }
        if (!empty($thumb)) {
            $arr = array(
                'title' => I("title"),
                'intro' => I("intro"),
                'content' => I("content"),
                'pic' => $thumb,
            );
        } else {
            $arr = array(
                'title' => I("title"),
                'intro' => I("intro"),
                'content' => I("content"),
            );
        }

        $result = $model->where($aim)->save($arr);
        if ($result) {
            success("修改成功", U('Index/info_list'));
        } else {
            error("修改成功", U('Index/info_list'));
        }
    }
}