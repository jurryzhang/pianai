<?php

namespace Admin\Controller;

use Think\Controller;

class NewsController extends BaseController
{
    //管理员列表

    public function index()
    {
        $this->display('addnews');
    }

    public function newslist()
    {
        $model = M("news");// 实例化对象
        //$re=$model->select();
        $arr['type'] = I('type');

        $count = $model->where($arr)->count();// 查询满足要求的总记录数
        $Page = new \Think\Page($count, 25);// 实例化分页类 传入总记录数和每页显示的记录数(25)
        $show = $Page->show();// 分页显示输出
        // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $list = $model->where($arr)->limit($Page->firstRow . ',' . $Page->listRows)->select();
        $this->assign('page', $show);// 赋值分页输出

        // var_dump($show);exit;
        $this->assign("news", $list);

        $this->display('index');
    }


    //编辑新闻
    public function edit()
    {
        $id = $_GET['id'];
        $model = M("news");// 实例化对象
        $res = $model->where("id=%d", $id)->find();// 通过id查找数据
        $this->assign("data", $res);
        $this->display("edit");
    }


    //删除文件
    public function del()
    {
        $id = I("id");

        //实例化model
        $model = M("news");
        //执行删除

        $imgsrc = $model->where("id=%d", $id)->find();
        if (file_exists(SITE_DIR . "/Public/Uploads/" . $imgsrc['thumb'])) {
            unlink(SITE_DIR . "/Public/Uploads/" . $imgsrc['thumb']);
            //  success(SITE_DIR."/Public/Uploads/".$imgsrc['thumb']."删除图片成功！");

        }
        if ($model->where("id=%d", $id)->delete()) {
            $this->success("删除成功！");
        } else {
            $this->error("删除失败！");
        }

    }


//处理修改
    public function doEdit()
    {
        $id = I("id");
        $model = M("news");
        //var_dump($_FILES);exit;
        //判断是否有数据上传
        if (!empty($_POST)) {
            //检测，（自动验证
            if (!empty($_FILES['thumb']['name'])) {

                $imgsrc = $model->where("id=%d", $id)->find();
                if (file_exists(SITE_DIR . "/Public/Uploads/news/" . $imgsrc['thumb'])) {
                    unlink(SITE_DIR . "/Public/Uploads/news/" . $imgsrc['thumb']);
                    //  success(SITE_DIR."/Public/Uploads/".$imgsrc['thumb']."删除图片成功！");
                }
                $upload = new \Think\Upload();// 实例化上传类
                $upload->maxSize = 31457280;// 设置附件上传大小
                $upload->exts = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
                $upload->rootPath = './Public/'; // 设置附件上传根目录
                $upload->savePath = './Uploads/news/';// 设置附件上传目录

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


            //var_dump($thumb);exit;
            $time = time();
            $author = $_SESSION['admin']['adminMsg']['adminName'];
            //组装数组插入数据库
            $arr = array(
                "title" => I("title"),
                "intro" => I("editor01"),
                "type" => I("type"),
                "cons" => I("cons"),
                "tags" => I("tags"),

                "sequence" => I("sequence"),
                "upTime" => $time,
                "author" => $author
            );
            if ($thumb != "") {
                $arr["thumb"] = $thumb;
            }
            //插入数据库
            if ($model->where("id=%d", $id)->save($arr)) {
                $this->success("修改成功", U("News/newslist", array('type' => $_POST['type'])));
            } else {
                $this->error("修改失败！");
            }

        } else {
            //显示错误信息
            $this->error($model->getError());
        }


    }

    //处理添加
    public function doAdd()
    {
        //var_dump($_POST,$_FILES);exit;
        //var_dump(I());exit;
        $model = M("news");
        //判断是否有数据上传
        if (!empty($_POST)) {
            //检测，（自动验证）
            if ($model->create($_POST)) {
                //引入上传文件

                if (!empty($_FILES['thumb']['name'])) {

                    //引入上传文件
                    $upload = new \Think\Upload();// 实例化上传类
                    $upload->maxSize = 31457280;// 设置附件上传大小
                    $upload->exts = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
                    $upload->rootPath = './Public/'; // 设置附件上传根目录
                    $upload->savePath = './Uploads/news/';// 设置附件上传目录

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
                $time = time();
                //$author=$_SESSION['admin']['adminMsg']['adminName'];
                //组装数组插入数据库
                $arr = array(
                    "title" => I("title"),
                    "intro" => I("editor01"),
                    "type" => I("type"),

                    "cons" => I("cons"),
                    "sequence" => I("sequence"),
                    "tags" => I("tags"),

                    "upTime" => $time
                );
                if ($thumb != "") {
                    $arr["thumb"] = $thumb;
                }
                //插入数据库
                if ($model->add($arr)) {
                    $this->success("添加成功", U('News/newslist'));
                } else {
                    error("添加失败！");
                }

            } else {
                //显示错误信息
                error($model->getError());
            }

        } else {
            error("没有数据提交");
        }
    }

    public function updete_seq()
    {
        $id = I("id");
        $model = M("news");
        $arr = array("sequence" => I('sequence'));
        if ($model->where("id='%d'", $id)->save($arr)) {
            echo 1;
        }
    }

    public function addother()
    {
        $id["nid"] = I("nid");
        $model = M("n");
        $arr1 = array("intro" => I('editor01'));
        $res = $model->where($id)->find();
        if (I('editor01') != "") {
            if ($model->where($id)->save($arr1)) {
                success("成功", "{:U('News/addother',array('nid'=>" . I('nid') . "))}");
            }
        }


        $this->assign("datas", $res);

        $this->display();
    }

}


?>