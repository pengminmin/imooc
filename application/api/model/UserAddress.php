<?php
/**
 * Created by PhpStorm.
 * User: met
 * Date: 2019/9/3
 * Time: 18:31
 */
namespace app\api\model;
class UserAddress extends BaseModel{
    protected $hidden = ['id', 'delete_time', 'use_id'];
}