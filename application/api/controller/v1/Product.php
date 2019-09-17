<?php
/**
 * Created by PhpStorm.
 * User: met
 * Date: 2019/7/14
 * Time: 23:40
 */
namespace app\api\controller\v1;
use app\api\validate\Count;
use app\api\model\Product as ProductModel;
use app\api\validate\IDMustBePositiveInt;
use app\lib\exception\ProductMissException;

class Product{
    
    public function getRecent($count = 15){
        (new Count())->goCheck();
        
        $products = ProductModel::getMostRecent($count);
        if($products->isEmpty()){
            throw new ProductMissException();
        }
        //数据集，用于临时隐藏 summary 属性
//        $collection = collection($products);
        $products = $products->hidden(['summary']);
        return $products;
    }
    
    public function getAllInCategory($id){
        (new IDMustBePositiveInt())->goCheck();
        
        $products = ProductModel::getAllByCategoryId($id);
        if($products->isEmpty()){
            throw new ProductMissException();
        }
        return $products;
    }
    
    public function getOne($id){
        (new IDMustBePositiveInt())->goCheck();
        
        $product = ProductModel::getProductDetail($id);
        if(!$product){
            throw new ProductMissException();
        }
        return $product;
    }

}