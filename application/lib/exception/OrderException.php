<?php
/**
 * Created by PhpStorm.
 * User: met
 * Date: 2019/9/16
 * Time: 14:01
 */
namespace app\lib\exception;
class OrderException extends BaseException{
    public $code = 404;
    public $msg = '订单不存在，请检查ID';
    public $errorCode = 80000;
}