<?php

namespace Admin\Controller;

use Think\Controller;

class LovetypeController extends BaseController
{


    public function index()
    {
        //恋爱精选分裂列表
        $model = M('Lovetype');
        $count = $model->count();
        //分页，10个每页
        $tot = 10;
        $page = new \Think\Page($count, $tot);
        $show = $page->show();
        $love = $model->order('id ASC')->limit($page->firstRow . ',' . $page->listRows)->select();
        $this->assign('list', $list);
        //总量大于每页个数进行分页
        if ($count > $tot) {
            $this->assign('page', $show);
        }
        $this->love = $love;
        $this->display();
    }

    public function add()
    {
        if (IS_POST) {
            $model = M('Lovetype');
            if ($model->create(I('post.'))) {
                if ($model->add()) {
                    redirect(U('Lovetype/index'));
                } else {
                    $this->error('操作错误，请重试');
                }
            }
        } else {
            $this->display();
        }
    }

    public function edit()
    {
        //修改恋爱分类
        $model = M('Lovetype');
        $id = $_GET['id'];
        if (IS_POST) {
            $data['name'] = $_POST['name'];
            $data['id'] = $_POST['id'];
            if ($model->save($data)) {
                redirect(U('Lovetype/index'));
            } else {
                $this->error('操作错误，请重试');
            }
        }
        $name = $model->find($id);
        $this->name = $name;
        $this->display();
    }

    //删除分类
    public function delete()
    {
        if (IS_AJAX) {
            $id = $_POST['id'];
            $model = M('Lovetype');
            if ($model->delete($id)) {
                echo '1';
            } else {
                echo '0';
            }
        }
    }
}