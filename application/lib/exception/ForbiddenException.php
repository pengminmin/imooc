<?php
/**
 * Created by PhpStorm.
 * User: met
 * Date: 2019/9/16
 * Time: 10:37
 */
namespace app\lib\exception;
class ForbiddenException extends BaseException{
    public $code = 403;
    public $msg = '权限不足';
    public $errorCode = 100001;
}