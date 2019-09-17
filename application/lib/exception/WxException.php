<?php
/**
 * Created by PhpStorm.
 * User: met
 * Date: 2019/7/15
 * Time: 17:46
 */
namespace app\lib\exception;
class WxException extends BaseException{
    public $code = 999;
    public $msg = '微信异常';
    public $errorCode = 90000;
}