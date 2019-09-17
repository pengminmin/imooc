<?php
/**
 * Created by PhpStorm.
 * User: met
 * Date: 2019/7/15
 * Time: 15:59
 */
namespace app\api\model;
class User extends BaseModel{
    public function address(){
        return $this->hasOne('UserAddress', 'user_id', 'id');
    }
    
    public static function getByOpentID($openid){
        $user = self::where('openid', '=', $openid)
            ->find();
        return $user;
    }
    
    
}