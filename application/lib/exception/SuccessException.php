<?php
/**
 * Created by PhpStorm.
 * User: met
 * Date: 2019/9/3
 * Time: 17:58
 */
namespace app\lib\exception;
class SuccessException{
    public $code = 201;
    public $msg = 'ok';
    public $errorCode = 0;
}