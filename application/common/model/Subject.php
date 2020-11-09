<?php
namespace app\common\model;
use think\Model;

class Subject extends Model{
    protected $autoWriteTimestamp = true;

    //科目类别
    protected function category(){
        return $this->belongsTo('Category', 'category_id');
    }
}
