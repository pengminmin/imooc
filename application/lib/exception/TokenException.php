<?php
/**
 * Created by PhpStorm.
 * User: met
 * Date: 2019/7/18
 * Time: 11:57
 */
namespace app\lib\exception;
class TokenException extends BaseException{
    public $code = 401;
    public $msg = 'Token已过期或无效Token';
    public $errorCode = 10001;
}