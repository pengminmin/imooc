<?php

namespace app\api\model;

use app\lib\exception\ProductMissException;

class Product extends BaseModel
{
    protected $hidden = ['delete_time', 'update_time', 'create_time', 'from', 'category_id', 'main_img_id', 'pivot'];
    
    protected function getMainImgUrlAttr($value, $data){
        return $this->prefixImgUrl($value, $data);
    }
    
    public function imgs(){
        return $this->hasMany('ProductImage', 'product_id', 'id');
    }
    
    public function property(){
        return $this->hasMany('ProductProperty', 'product_id', 'id');
    }
    
    
    
    public static function getMostRecent($count){
        $products = self::limit($count)
            ->order('create_time desc')
            ->select();
        return $products;
    }
    
    public static function getAllByCategoryId($id){
        $products = self::where('category_id', '=', $id)
            ->select();
        return $products;
    }
    
    
    
    public static function getProductDetail($id){
        $product = self::with([
            'imgs' => function($query){
                $query->with(['imgUrl'])
                ->order('order', 'asc');
            }
        ])
            ->with(['property'])
            ->find($id);
        if(!$product){
            new ProductMissException();
        }
        return $product;
    }
}
