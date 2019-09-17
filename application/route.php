<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

//return [
//    '__pattern__' => [
//        'name' => '\w+',
//    ],
//    '[hello]'     => [
//        ':id'   => ['index/hello', ['method' => 'get'], ['id' => '\d+']],
//        ':name' => ['index/hello', ['method' => 'post']],
//    ],
//
//];

use think\Route;
//查询banner 信息
Route::get('api/:version/banner/:id', 'api/:version.Banner/getBanner');
//查询主题列表
// theme?ids=1,2,3
Route::get('api/:version/theme', 'api/:version.Theme/getSimpleList');
//查询主题详情信息
Route::get('api/:version/theme/:id', 'api/:version.Theme/getComplexOne');

////根据类型ID查询商品
//// by_category?id=3
//Route::get('api/:version/product/by_category', 'api/:version.Product/getAllInCategory');
////查下商品详情
////Route::get('api/:version/product/:id', 'api/:version.Product/getOne');
//Route::get('api/:version/product/:id', 'api/:version.Product/getOne', [], ['id' => '\d+']);
////查询新品
//Route::get('api/:version/product/recent', 'api/:version.Product/getRecent');

Route::group('api/:version/product', function(){
    Route::get('/by_category', 'api/:version.Product/getAllInCategory');
    Route::get('/:id', 'api/:version.Product/getOne');
//    Route::get('/:id', 'api/:version.Product/getOne', [], ['id' => '\d+']);
    Route::get('/recent', 'api/:version.Product/getRecent');
});


//查询所有分类
Route::get('api/:version/category/all', 'api/:version.Category/getAllCategories');
//获取Token,使用POST是因为POST比GET安全
Route::post('api/:version/token/user', 'api/:version.Token/getToken');

//Address
Route::post('api/:version/address', 'api/:version.Address/createOrUpdateAddress');

