<?php

namespace app\Admin\controller;

use think\Controller;
use think\Request;
use think\Db;

class Student extends Controller
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        //获取student数据表中的所有学生
        $data = Db::table("student")->select();

        //将获取到的数据传递给html模板。
        $this->assign('data', $data);

        //渲染模板（找html文件，路径为：/admin/view/Zhangzhimin/index.html）
        return $this->fetch();
    }

    /**
     * 显示创建资源表单页.
     *
     * @return \think\Response
     */
    public function create()
    {
        return $this->fetch();
    }

    /**
     * 保存新建的资源
     *
     * @param  \think\Request  $request
     * @return \think\Response
     */
    public function save(Request $request)
    {
        //获取由create.html提交过来的所有数据
        $all = input(); //获取传输过来的所有参数

        //$name = input('name'); //获取键名为name的值

        //将学生信息添加到student数据表
        $result=Db::table('student')->insert($all);

        //信息添加成功后，页面跳转到学生管理页面
        if($result){
            $this->success('添加成功', '/zhangzhimin');
        }else{
            $this->error('添加失败');
        }
    }

    /**
     * 显示指定的资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function read($id)
    {
        //
    }

    /**
     * 显示编辑资源表单页.
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function edit($id)
    {
        //根据id的值获取学生信息
        $student = Db::table('student')->find($id);

        //将获取到的信息分配到edit.html模板
        $this->assign('student', $student);

        //渲染模板（找模板）
        return $this->fetch();
    }

    /**
     * 保存更新的资源
     *
     * @param  \think\Request  $request
     * @param  int  $id
     * @return \think\Response
     */
    public function update(Request $request, $id)
    {
        $all = input();

        //将数据更新到数据库
        Db::table('student')->where('id', $id)->update($all);

        //信息修改成功后，页面跳转到学生管理页面
        return 1;
    }

    /**
     * 删除指定资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function delete($id)
    {
        Db::table('student')->delete($id);

        echo '1';
    }
}




