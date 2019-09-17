<?php
/**
 * Created by PhpStorm.
 * User: met
 * Date: 2019/7/15
 * Time: 0:20
 */
namespace app\api\controller\v1;

use app\api\model\Category as CategoryModel;
use app\lib\exception\CategoryException;

class Category{
    public function getAllCategories(){
        $categories = CategoryModel::all([], 'img');
//        $categories = CategoryModel::all([], ['img']);
//        $categories = CategoryModel::with('img')->select();
        if($categories->isEmpty()){
            throw new CategoryException();
        }
        return $categories;
    }
    
}