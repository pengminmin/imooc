<?php
/**
 * Created by PhpStorm.
 * User: met
 * Date: 2019/7/15
 * Time: 15:54
 */
namespace app\api\validate;
class TokenGet extends BaseValidate{
    protected $rule = [
        'code' => 'require|isNotEmpty'
    ];
}