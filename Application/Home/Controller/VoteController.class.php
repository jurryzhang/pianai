<?php
// 本类由系统自动生成，仅供测试用途
namespace Home\Controller;

use Think\Controller;

class VoteController extends Controller
{
    public function index()
    {
        $model = D("articles");
        $re = $model->select();
        //var_dump($re);exit;
        $this->assign("result", $re);
        if (!empty($_SESSION['uid'])) {
            $this->assign("uid", $_SESSION['uid']);
        } else {
            $this->assign("uid", '0');
        }
        $this->display("index");
    }

    public function praise()
    {
        header('Content-type:text/html;charset=utf8');
        if (!empty($_SESSION['uid'])) {
            $Umodel = D("user");
            $aim = I("tid");
            $uids['id'] = $_SESSION['uid'];
            $info['uid'] = $_SESSION['uid'];
            $model = D("articles");

            $data = $Umodel->where($uids)->find();

            if ($data['count_vote'] > 0) {
                foreach ($aim as $key => $value) {

                    $aim_art["tid"] = $value;

                    $re = $model->where($aim_art)->find();

                    $arr['uid'] = $re['uid'] . "/" . $info['uid'];
                    $arr['praise'] = $re['praise'] + 1;
                    $res = $model->where($aim_art)->save($arr);

                }
                $count_vote['count_vote'] = 0;
                $result = $Umodel->where($uids)->save($count_vote);
                if ($result) {
                    success("投票成功", U('Vote/index'));
                }

            } else {
                $this->success("您已经投过了", U('Vote/index'));
            }
        } else {
            $this->success("请登陆", U('Mobile/login'));
        }
    }


}