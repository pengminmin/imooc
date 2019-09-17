<?php
/**
 * Created by PhpStorm.
 * User: met
 * Date: 2019/7/26
 * Time: 16:33
 */
namespace app\api\model;
class ProductProperty extends BaseModel{
    protected $hidden = ['delete_time', 'id', 'product_id'];
}