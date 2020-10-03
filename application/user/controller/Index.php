<?php
namespace app\user\controller;

use think\Db;
use think\Controller;

class Index extends Controller{

    /**
     * 显示所有用户信息
     */
    public function all(){
        //获取数据
        $data = Db::table('users')->select();

        //测试数据是否获取成功
        //dump($data);

        //模板变量赋值
        $this->assign('users', $data);

        //渲染模板
        return $this->fetch();
    }

    /**
     * 显示编辑用户信息模板
     */
    public function edit($id){
        //获取指定id的用户
        $user = Db::table('users')->find($id);

        //模板变量赋值
        $this->assign('user', $user);

        //渲染模板
        return $this->fetch();
    }

    /**
     * 更新用户信息
     */
    public function update(){
        $id = $_POST['id'];
        $data = array();
        $data['username'] = $_POST['username'];
        $data['email'] = $_POST['email'];

        Db::table('users')->where('id', $id)->update($data);

        $this->success('修改成功', 'user/index/all');
    }
}