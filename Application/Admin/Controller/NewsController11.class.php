<?php

namespace Home\Controller;

use Think\Controller;

class NewsController extends BaseController
{
    public function index()
    {

        $this->display('addnews');
    }

    public function newslist()
    {

        $model = M("pahl_news");// 实例化对象
        //$re=$model->select();
        $arr['type'] = I('type');
        import('ORG.Util.Page');// 导入分页类
        $count = $model->where($arr)->count();// 查询满足要求的总记录数
        $Page = new Page($count, 10);// 实例化分页类 传入总记录数和每页显示的记录数
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
        $model = M("pahl_news");// 实例化对象
        $res = $model->where("id=%d", $id)->find();// 通过id查找数据
        //var_dump($res);
        $this->assign("data", $res);
        $this->display("edit");
    }


    //删除文件
    public function del()
    {
        $id = I("id");

        //实例化model
        $model = M("pahl_news");
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
        $model = M("pahl_news");
        //var_dump($_FILES);exit;
        //判断是否有数据上传
        if (!empty($_POST)) {
            //检测，（自动验证
            if (!empty($_FILES['thumb']['name'])) {

                $imgsrc = $model->where("id=%d", $id)->find();
                if (file_exists(SITE_DIR . "/Public/Uploads/" . $imgsrc['thumb'])) {
                    unlink(SITE_DIR . "/Public/Uploads/" . $imgsrc['thumb']);
                    //  success(SITE_DIR."/Public/Uploads/".$imgsrc['thumb']."删除图片成功！");
                }
                //导入上传控件
                import('ORG.Net.UploadFile');
                $upload = new UploadFile();// 实例化上传类
                $upload->maxSize = 3145728;// 设置附件上传大小
                $upload->allowExts = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
                $upload->savePath = './Public/Uploads/';// 设置附件上传目录
                if (!$upload->upload()) {// 上传错误提示错误信息
                    error($upload->getErrorMsg());
                } else {// 上传成功 获取上传文件信息
                    $info = $upload->getUploadFileInfo();
                }

                // 保存表单数据 包括附件数据
                $thumb = $model->photo = $info[0]['savename']; // 保存上传的照片根据需要自行组装
            } else {
                $thumb = "";
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
                $this->success("修改成功", U("News/newslist"));
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
        $model = M("pahl_news");
        //判断是否有数据上传
        if (!empty($_POST)) {
            //检测，（自动验证）
            if ($model->create($_POST)) {
                //引入上传文件

                if (!empty($_FILES['thumb']['name'])) {

                    //引入上传文件
                    import('ORG.Net.UploadFile');
                    $upload = new UploadFile();// 实例化上传类
                    $upload->maxSize = 3145728;// 设置附件上传大小
                    $upload->allowExts = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
                    $upload->savePath = './Public/Uploads/';// 设置附件上传目录
                    if (!$upload->upload()) {// 上传错误提示错误信息
                        $this->error($upload->getErrorMsg());

                    } else {// 上传成功 获取上传文件信息
                        $info = $upload->getUploadFileInfo();
                    }
                    $thumb = $info[0]['savename']; // 保存上传的照片根据需要自行组装
                } else
                    $thumb = "";
                $time = time();
                $author = $_SESSION['admin']['adminMsg']['adminName'];
                //组装数组插入数据库
                $arr = array(
                    "title" => I("title"),
                    "intro" => I("editor01"),
                    "type" => I("type"),
                    "thumb" => $thumb,
                    "cons" => I("cons"), "tags" => I("tags"),
                    "sequence" => I("sequence"),

                    "upTime" => $time
                );
                if ($thumb != "") {

                }
                //插入数据库
                if ($model->add($arr)) {
                    success("添加成功", U('News/newslist'));
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
        $model = M("pahl_news");
        $arr = array("sequence" => I('sequence'));
        if ($model->where("id='%d'", $id)->save($arr)) {
            echo 1;
        }
    }


}


?>