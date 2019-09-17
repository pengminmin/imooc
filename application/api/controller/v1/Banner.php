<?php
/**
 * Created by PhpStorm.
 * User: met
 * Date: 2019/7/9
 * Time: 22:05
 */
namespace app\api\controller\v1;
use app\api\model\Banner as BannerModel;
use app\api\validate\IDMustBePositiveInt;
use app\lib\exception\BannerMissException;

class Banner{
    
    public function getBanner($id){
        
        (new IDMustBePositiveInt())->goCheck();
        $banner = BannerModel::getBannerInfoById($id);
        if(!$banner){
            throw new BannerMissException();
        }
        return $banner;
    }
}