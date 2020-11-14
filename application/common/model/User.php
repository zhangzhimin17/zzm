<?php
namespace app\common\model;
use think\Model;

class User extends Model{
    protected $autoWriteTimestamp = true;

    public function departments(){
        return $this->belongsToMany('Department', 'user_department', 'department_id', 'user_id');
    }
}


