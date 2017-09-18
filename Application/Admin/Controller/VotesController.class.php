<?php

namespace Home\Controller;

use Think\Controller;

class VotesController extends BaseController
{
    public function add()
    {
        $this->display("Vote/add");
    }

    public function save()
    {
        //var_dump($_FILES);exit;
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
            success("添加成功", U('Index/info_list'));
        } else {
            error("添加失败", U('Index/info_list'));
        }
    }

    public function info_list()
    {
        $model = D("articles");
        import('ORG.Util.Page');
        $count = $model->count();
        $page = new Page($count, 10);
        $page->setConfig('theme', "%totalRow% %header% &nbsp; 当前第 %nowPage% 页 &nbsp; 共 %totalPage% 页   %upPage% %first% %prePage% <span class='link'>%linkPage%</span> %downPage% %nextPage% %end%");
        $show = $page->show();
        $result = $model->order("tid desc")->limit($page->firstRow . ',' . $page->listRows)->select();

        $this->assign('page', $show);
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