<?php

namespace app\api\model;

use think\Model;

class Image extends BaseModel
{
    protected $hidden = ['id', 'from', 'delete_time', 'update_time'];
    
    /**
     * @title 读取器，用于拼接img链接地址
     * @author 彭敏敏
     * @param $value
     * @param $data
     * @return string
     */
    protected function getUrlAttr($value, $data){
        return $this->prefixImgUrl($value, $data);
    }
}
