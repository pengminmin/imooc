<?php
/**
 * Created by PhpStorm.
 * User: met
 * Date: 2019/7/15
 * Time: 0:26
 */
namespace app\lib\exception;
class CategoryException extends BaseException{
    public $code = 404;
    public $msg = '类型不存在';
    public $errorCode = 50000;
}