<?php

namespace app\admin\controller;

use think\Controller;
use think\Request;
use app\common\model\Subject as MSubject;
use app\common\model\Category;

class Subject extends Controller
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        $data = MSubject::all();
        $this->assign('data', $data);
        return $this->fetch();
    }

    /**
     * 显示创建资源表单页.
     *
     * @return \think\Response
     */
    public function create()
    {
        $categories = Category::all();
        $this->assign('categories', $categories);
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
        $model = new MSubject();

        $model->subject = input('subject');
        $model->category_id = input('category');

        $model->save();
        $this->success('添加成功', '/subject');
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
        $subject = MSubject::get($id);
        $categories = Category::all();
        $this->assign('categories', $categories);

        $this->assign('subject', $subject);

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
        $subject = MSubject::get($id);
        $subject->subject = input('subject');
        $subject->category_id = input('category');

        $subject->save();

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
        MSubject::destroy($id);

        return 1;
    }
}
