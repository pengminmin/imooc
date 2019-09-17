<?php
/**
 * Created by PhpStorm.
 * User: met
 * Date: 2019/7/18
 * Time: 11:39
 */
namespace app\api\service;
use app\lib\enum\ScopeEnum;
use app\lib\exception\ForbiddenException;
use app\lib\exception\TokenException;
use think\Cache;
use think\Exception;
use think\Request;

class Token{
    public static function generateToken(){
        //32个字符组成一组字符串
        $str = self::getRandChar(32);
        //时间戳
        $timeStamp = $_SERVER['REQUEST_TIME'];
        //salt
        $tokenSalt = config('secure.token_salt');
        return md5($str.$timeStamp.$tokenSalt);
    }
    
    
    public static function getCurrentTokenVar($key){
        $token = Request::instance()
            ->header('token');
        $vars = Cache::get($token);
        if(!$vars){
            throw new TokenException();
        }else{
            if(!is_array($vars)){
                $vars = json_decode($vars, true);
            }
            if(array_key_exists($key, $vars)){
                return $vars[$key];
            }else{
                throw new Exception('尝试获取的Token变量并不存在');
            }
        }
    }
    
    public static function getCurrentUid(){
        $uid = self::getCurrentTokenVar('uid');
        return $uid;
    }
    //用户和管理员都可以访问
    public static function needPrimaryScope(){
        $scope = self::getCurrentTokenVar('scope');
        if($scope){
            if($scope >= ScopeEnum::User){
                return true;
            }else{
                throw new ForbiddenException();
            }
        }else{
            throw new TokenException();
        }
    }
    //只有用户可以访问
    public static function needExclusiveScope(){
        $scope = TokenService::getCurrentTokenVar('scope');
        if($scope){
            if($scope == ScopeEnum::User){
                return true;
            }else{
                throw new ForbiddenException();
            }
        }else{
            throw new TokenException();
        }
    }
    
  
    
    private static function getRandChar($length){
        $str = '';
        $strPol = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyz';
        $max = strlen($strPol) - 1;
        for($i=0;$i<$length;$i++){
            $str .= $strPol[rand(0, $max)];
        }
        return $str;
    }
}