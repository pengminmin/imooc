<?php
/**
 * Created by PhpStorm.
 * User: met
 * Date: 2019/7/15
 * Time: 0:22
 */
namespace app\api\model;
class Category extends BaseModel{
    protected $hidden = ['delete_time', 'update_time', 'create_time'];
    
    public function img(){
        return $this->belongsTo('Image', 'topic_img_id', 'id');
    }
    
}