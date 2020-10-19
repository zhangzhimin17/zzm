<?php
namespace app\admin\controller;

use think\Db;
use think\Controller;

class News extends Controller
{
    //显示所有新闻
    public function index(){
        //获取数据
        $data = Db::table('news')->select();

        //模板变量赋值
        $this->assign('data', $data);

        //渲染模板
        return $this->fetch();
    }

    /**
     * 显示添加新闻信息
     */
    public function create(){
        return $this->fetch();
    }

    /**
     * 添加新闻信息到数据库
     */
    public function save(){
        $data = array();
        $data['title'] = $_POST['title'];
        $data['content'] = $_POST['content'];

        Db::table('news')->insert($data);

        $this->success('添加成功', '/news');
    }


    /**
     * 显示编辑新闻信息模板
     */
    public function edit($id){
        //获取指定id的新闻
        $new = Db::table('news')->find($id);

        //模板变量赋值
        $this->assign('data', $new);

        //渲染模板
        return $this->fetch();
    }

    /**
     * 更新新闻信息
     */
    public function update($id){
        $data = array();
        $data['title'] = input('title');
        $data['content'] = input('content');

        Db::table('news')->where('id', $id)->update($data);

        echo 1;
    }

    /**
     * 查看新闻详细信息
     */
    public function read($id){
        //获取指定id的新闻
        $new = Db::table('news')->find($id);

        //模板变量赋值
        $this->assign('news', $new);

        //渲染模板
        return $this->fetch();
    }

    /**
     * 删除新闻
     */
    public function delete($id){
        Db::table('news')->delete($id);

        echo '1';
    }
}












