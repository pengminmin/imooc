<?php
/**
 * Created by PhpStorm.
 * User: met
 * Date: 2019/7/10
 * Time: 15:34
 */
namespace app\lib\exception;
class BannerMissException extends BaseException{
    public $code = 404;
    public $msg = 'banner不存在';
    public $errorCode = 40000;
}