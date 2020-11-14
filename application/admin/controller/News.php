<?php
namespace app\admin\controller;

use think\Db;
use think\Controller;
use app\common\model\News as MNews;
use app\common\model\NewsContent;

class News extends Controller
{
    //显示所有新闻
    public function index(){
        $model = new MNews();
        //获取数据
        $data = $model->order('id desc')->paginate(1);

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
       $news = new MNews();
       $news->title = input('title');

       $content = new NewsContent();
       $content->content = input('content');

       $news->content = $content;

       $news->together('content')->save();

       $this->success('添加成功', '/news');
    }


    /**
     * 显示编辑新闻信息模板
     */
    public function edit($id){
        //获取指定id的新闻
        $new =MNews::get($id);

        //模板变量赋值
        $this->assign('data', $new);

        //渲染模板
        return $this->fetch();
    }

    /**
     * 更新新闻信息
     */
    public function update($id){
        $news = MNews::get($id);
        $news->title = input('title');

        $news->content->content=input('content');

        $news->together('content')->save();

        echo 1;
    }

    /**
     * 查看新闻详细信息
     */
    public function read($id){
        //获取指定id的新闻
        $new = MNews::get($id);

        //模板变量赋值
        $this->assign('news', $new);

        //渲染模板
        return $this->fetch();
    }

    /**
     * 删除新闻
     */
    public function delete($id){
        $news = MNews::get($id);
        $news->together('content')->delete();

        echo '1';
    }
}












