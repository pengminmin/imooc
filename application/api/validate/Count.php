<?php
/**
 * Created by PhpStorm.
 * User: met
 * Date: 2019/7/14
 * Time: 23:41
 */
namespace app\api\validate;
class Count extends BaseValidate{
    protected $rule = [
        'count' => 'isPositiveInteger|between:1,15'
    ];
}