<?php

namespace Admin\Controller;

use Think\Controller;

class VideoController extends BaseController
{
    public function add()
    {
        //视频分类
        $ltModel = M('Lovetype');
        $love = $ltModel->select();
        //视频入库
        if (IS_POST) {
            $videoModel = M('video');
            $data['video'] = join(',', preg_video($_POST['video']));
            $data['ltid'] = $_POST['ltid'];
            if ($videoModel->add($data)) {
                $this->success('操作成功');
            } else {
                $this->error('操作失败');
            }
        }
        $this->love = $love;
        $this->display();
    }
}