<?php
/**
 * Created by PhpStorm.
 * User: met
 * Date: 2019/7/12
 * Time: 18:06
 */
namespace app\api\validate;
class IDCollection extends BaseValidate{
    protected $rule = [
        'ids' => 'require|checkIDs'
    ];
    
    protected $message = [
        'ids' => 'ids必须是以逗号分隔的正整数'
    ];
    
    protected function checkIDs($value){
        $ids = explode(',', $value);
        if(empty($ids))return false;
        foreach($ids as $id){
            if(!$this->isPositiveInteger($id))return false;
        }
        return true;
    }
}