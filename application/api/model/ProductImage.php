<?php
/**
 * Created by PhpStorm.
 * User: met
 * Date: 2019/7/26
 * Time: 16:23
 */
namespace app\api\model;
class ProductImage extends BaseModel{
    protected $hidden = ['delete_time', 'img_id', 'product_id'];
    
    public function imgUrl(){
        return $this->belongsTo('Image', 'img_id', 'id');
    }
}