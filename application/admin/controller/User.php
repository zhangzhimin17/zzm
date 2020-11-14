<?php
namespace app\admin\controller;

use think\Db;
use think\Controller;
use think\Request;

use app\common\model\User as MUser;
use app\common\model\Department;

class User extends Controller
{
    //显示所有用户
    public function index(){
        //获取数据
        $data = MUser::all();

        //模板变量赋值
        $this->assign('users', $data);

        //渲染模板
        return $this->fetch();
    }

    /**
     * 显示添加用户信息
     */
    public function create(){
        $departments = Department::all();

        $this->assign('departments', $departments);

        return $this->fetch();
    }

    /**
     * 添加用户信息到数据库
     */
    public function save(){
        $user = new MUser();
        $user->username = input('username');
        $user->email = input('email');
        $user->save();

        $departments = input('department');

        $user->departments()->saveAll($departments);

        $this->success('添加成功', '/user');
    }


    /**
     * 显示编辑用户信息模板
     */
    public function edit($id){
        //获取指定id的用户
        $user = MUser::get($id);

        $departments = Department::all();

        //模板变量赋值
        $this->assign('user', $user);
        $this->assign('departments', $departments);

        //渲染模板
        return $this->fetch();
    }

    /**
     * 更新用户信息
     */
    public function update(Request $request, $id){
        $data = array();

    }

    /**
     * 删除用户
     */
    public function delete($id){
        $id = (int)$id; //将$id转为数值型数据
        Db::table('users')->delete();

       // $this->success('删除成功', '/users');

    }
}