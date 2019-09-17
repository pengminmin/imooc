<?php
/**
 * Created by PhpStorm.
 * User: met
 * Date: 2019/7/14
 * Time: 23:53
 */
namespace app\lib\exception;
class ProductMissException extends BaseException{
    public $code = 404;
    public $msg = '商品不存在';
    public $errorCode = 20000;
}