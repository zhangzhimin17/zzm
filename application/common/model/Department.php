<?php
namespace app\common\model;
use think\Model;

class Department extends Model{
    protected $autoWriteTimestamp = true;

    public function users(){
        return $this->belongsToMany('User', 'user_department', 'user_id', 'department_id');
    }
}


