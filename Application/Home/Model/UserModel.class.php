<?php

namespace Home\Model;

use Think\Model;

class UserModel extends Model
{
    //允许插入的字段
    protected $insertFields = array('name', 'username', 'nickname', 'password', 'sex', 'age', 'year', 'month', 'height', 'weight', 'blood', 'ani', 'const', 'nation', 'child', 'qualification', 'housing', 'monthly', 'work', 'workad', 'marriage', 'wxnum', 'qqnum', 'intro', 'photo', 'id-photo', 'addtime', 'addip', 'logintime', 'loginip');

    protected function _before_insert(&$data, $options)
    {
        parent::_before_insert($data, $options);
        $data['id-photo'] = join(',', $_POST['id-photo']);
        //注册密码加密
        $data['password'] = md5($_POST['password']);
        $data['addip'] = ip2long(get_client_ip());
        $data['addtime'] = time();
        $data['loginip'] = ip2long(get_client_ip());
        $data['logintime'] = time();
    }

    //搜索条件并分页
    public function search($paginal, $order = 'id DESC')
    {
        if ($sex = I('get.sex')) {
            $where['sex'] = array('eq', $sex);
        }
        if ($age = I('get.age')) {
            if ($age != '-1') {
                $where['age'] = array('eq', $age);
            }
        }
        if ($height = I('get.height')) {
            if ($height != '-1') {
                $where['height'] = array('eq', $height);
            }
        }
        if ($housing = I('get.housing')) {
            if ($housing != '-1') {
                $where['housing'] = array('eq', $housing);
            }
        }
        if ($monthly = I('get.monthly')) {
            if ($monthly != '-1') {
                $where['monthly'] = array('eq', $monthly);
            }
        }
        if ($marriage = I('get.marriage')) {
            if ($marriage != '-1') {
                $where['marriage'] = array('eq', $marriage);
            }
        }
        if ($child = I('get.child')) {
            if ($child != '-1') {
                $where['child'] = array('eq', $child);
            }
        }
        if ($workad = I('get.workad')) {
            if ($workad != '-1') {
                $where['workad'] = array('like', '%' . $workad . '%');
            }
        }
        $count = $this->where($where)->count();
        $page = new \Think\Page($count, $paginal);
        $limit = $page->firstRow . ',' . $page->listRows;
        $list = $this->where($where)->limit($limit)->order($order)->select();
        if ($count > $paginal) {
            $page = $page->show();
        }
        return array('list' => $list, 'page' => $page);
    }
}