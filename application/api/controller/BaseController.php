<?php
/**
 * Created by PhpStorm.
 * User: met
 * Date: 2019/9/16
 * Time: 11:20
 */
namespace app\api\controller;
use think\Controller;
use app\api\service\Token as TokenService;

class BaseController extends Controller{
    protected function checkPrimaryScope(){
        TokenService::needPrimaryScope();
    }
    
    protected function checkExclusiveScope(){
        TokenService::needExclusiveScope();
    }
    
}