<?php
namespace app\admin\controller;

use think\Db;
use think\Controller;

class News extends Controller
{
    //显示所有新闻
    public function index(){
        echo 'index';
    }

    /**
     * 显示添加新闻信息
     */
    public function create(){
        echo 'add';
    }
    /**
     * 添加新闻信息到数据库
     */
    public function save(){
    }
    /**
     * 显示编辑新闻信息模板
     */
    public function edit($id){
        echo 'edit';
    }
    /**
     * 更新新闻信息
     */
    public function update(){
    }
    /**
     * 查看新闻详细信息
     */
    public function read($id){
        echo 'read';
    }
    /**
     * 删除新闻
     */
    public function delete($id){

    }
}