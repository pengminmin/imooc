<?php
/**
 * Created by PhpStorm.
 * User: met
 * Date: 2019/7/15
 * Time: 16:02
 */
namespace app\api\service;
use app\lib\enum\ScopeEnum;
use app\lib\exception\TokenException;
use app\lib\exception\WxException;
use think\Cache;
use think\Exception;
use app\api\model\User as UserModel;

class UserToken extends Token{
    
    protected $code = '';
    protected $wxAppID = '';
    protected $wxAppSecret = '';
    protected $wxLoginUrl = '';
    
    public function __construct($code){
        $this->code = $code;
        $this->wxAppID = config('wx.app_id');
        $this->wxAppSecret = config('wx.app_secret');
        $this->wxLoginUrl = sprintf(config('wx.login_url'), $this->wxAppID, $this->wxAppSecret, $this->code);
    }
    
    public function get(){
        $result = curl_get($this->wxLoginUrl);
        $wx_result = json_decode($result, true);
        if(empty($result)){
            throw new Exception('获取session_key及openID时异常，微信内部错误');
        }else{
            if(array_key_exists('errcode', $wx_result)){
                return $this->getError($wx_result);
            }else{
                return $this->getToken($wx_result);
            }
        }
    }
    
    private function getError($wx_result){
        throw new WxException([
            'errorCode' => $wx_result['errcode'],
            'msg' => $wx_result['errmsg']
        ]);
    }
    
    private function getToken($wx_result){
        /**
         * 1、获取openid
         * 2、到数据库中查看是否已存在openid
         * 3、如果存在，不处理，不存在则新增一条user记录
         * 4、生成令牌，准备缓存数据，写入缓存
         * 5、把令牌返回客户端
         * 6、key:令牌
         * 7、vaule: wxResult,uid,scope
         */
        $openid = $wx_result['openid'];
        $user = UserModel::getByOpentID($openid);
        if($user){
            $uid = $user->id;
        }else{
            $uid = $this->newUser($openid);
        }
        $cacheValue = $this->prepareCaheValue($wx_result, $uid);
        $token = $this->saveToCahe($cacheValue);
        return $token;
    }
    
    private function saveToCahe($cacheValue){
        $key = self::generateToken();
        $value = $cacheValue;
        $exprise_in = config('setting.token_express_in');
        $request = cache($key, $value, $exprise_in);
        if(!$request){
            throw new TokenException([
                'msg' => '缓存异常'
            ]);
        }
        return $key;
    }
    
    private function prepareCaheValue($wxResult, $uid){
        $cacheValue = $wxResult;
        $cacheValue['uid'] = $uid;
        $cacheValue['scope'] = ScopeEnum::User;
        return $cacheValue;
    }
    
    private function newUser($openid){
        $user = UserModel::create([
            'openid' => $openid
        ]);
        return $user->id;
    }
}