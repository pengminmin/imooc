<?php
/**
 * Created by PhpStorm.
 * User: met
 * Date: 2019/9/3
 * Time: 17:19
 */
namespace app\api\validate;
class AddressNew extends BaseValidate{
    protected $rule = [
        'name' => 'require|isNotEmpty',
        'mobile' => 'require|isMobile',
        'province' => 'require|isNotEmpty',
        'city' => 'require|isNotEmpty',
        'country' => 'require|isNotEmpty',
        'detail' => 'require|isNotEmpty',
    ];
}