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
        //设置查询条件
        $map = array();
        $map[] = ['id','>',0]; //即使搜索条件为空，也能查询到数据

        //获取搜索条件里的性别
        $sex = input('sex');
        $this->assign('sex', $sex);

        //获取搜索条件里的年级
        $grade = input('grade');
        $this->assign('grade', $grade);

        //获取搜索条件的页码，如果页码不存在，其默认值设置为1
        $page = input('page');
        if(!$page){
            $page=1;
        }
        $this->assign('page', $page);

        if($sex && $sex != 'all'){
            $map[] = ['sex', '=', $sex];
        }
        if($grade && $grade != 'all'){
            $map[] = ['grade', '=', $grade];
        }

        //获取student数据表中的所有学生
        $data = Db::table("student")->order('id desc')->where($map)->paginate(5);

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
            $this->success('添加成功', '/student');
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




