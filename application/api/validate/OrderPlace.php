<?php
/**
 * Created by PhpStorm.
 * User: met
 * Date: 2019/9/16
 * Time: 11:27
 */
namespace app\api\validate;
use app\lib\exception\ParameterException;

class OrderPlace extends BaseValidate{
    protected $rule = [
        'products' => 'checkProducts'
    ];
    
    protected $singleRule = [
        'product_id' => 'requile|isPositiveInteger',
        'count' => 'require|isPositiveInteger'
    ];
    
    protected function checkProducts($values){
        if(!is_array($values)){
            throw new ParameterException([
                'msg' => '商品参数不正确'
            ]);
        }
        if(empty($values)){
            throw new ParameterException([
                'msg' => '商品列表不能为空'
            ]);
        }
        
        foreach($values as $value){
            $this->checkProduct($value);
        }
        return true;
    }
    
    protected function checkProduct($value){
        $validata = new BaseValidate($this->singleRule);
        $result = $validata->check($value);
        if(!$result){
            throw new ParameterException([
                'msg' => '商品列表参数错误',
            ]);
        }
    }
}