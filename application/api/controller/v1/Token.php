<?php
/**
 * Created by PhpStorm.
 * User: met
 * Date: 2019/7/15
 * Time: 15:50
 */
namespace app\api\controller\v1;
use app\api\service\UserToken;
use app\api\validate\TokenGet;

class Token{
    public function getToken($code = ''){
        (new TokenGet())->goCheck();
        
        $user_token = new UserToken($code);
        $token = $user_token->get();
        
        return [
            'token' => $token
        ];
    }
    
}