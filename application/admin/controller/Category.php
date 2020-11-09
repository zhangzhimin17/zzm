<?php

namespace app\admin\controller;

use think\Controller;
use think\Request;

//引入Category模型
use app\common\model\Category as MCategory;

class Category extends Controller
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        //获取数据表category里的所有记录，同 Db::table('category')->select()
        $data = MCategory::all();

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
        $model = new MCategory();

        $model->category = input('category');

        $model->save();
        $this->success('添加成功', '/category');
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
        //获取id为$id的记录
        $category = MCategory::get($id);

        $this->assign('category', $category);

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
        $category = Mcategory::get($id);
        $category->category = input('category');

        $category->save();

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
        Mcategory::destroy($id);

        return 1;
    }
}
