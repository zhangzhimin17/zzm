<?php
namespace app\common\model;
use think\Model;

class News extends Model{
    protected $autoWriteTimestamp = true;

    //每条新闻都对应一条新闻内容
    public function content(){
        return $this->hasOne('NewsContent', 'news_id');
    }
}


