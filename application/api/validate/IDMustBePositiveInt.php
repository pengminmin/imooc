<?php
/**
 * Created by PhpStorm.
 * User: met
 * Date: 2019/7/10
 * Time: 2:29
 */
namespace app\api\validate;
class IDMustBePositiveInt extends BaseValidate{
    protected $rule = [
        'id' => 'require|isPositiveInteger',
    ];
    
    protected $message = [
        'id' => 'id必须是正整数'
    ];
}