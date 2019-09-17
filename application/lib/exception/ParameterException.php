<?php
/**
 * Created by PhpStorm.
 * User: met
 * Date: 2019/7/10
 * Time: 16:47
 */
namespace app\lib\exception;
class ParameterException extends BaseException{
    public $code = 400;
    public $msg = '参数错误';
    public $errorCode = 10000;
}