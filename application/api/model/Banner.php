<?php
/**
 * Created by PhpStorm.
 * User: met
 * Date: 2019/7/10
 * Time: 3:29
 */
namespace app\api\model;
class Banner extends BaseModel
{
    protected $hidden = ['delete_time', 'update_time'];
//    protected $visible = [];
//    protected $table = 'category';
    public function items(){
        return $this->hasMany('BannerItem', 'banner_id', 'id');
    }
    
    public static function getBannerInfoById($id){
        $banner = self::with(['items', 'items.img'])->find($id);
        return $banner;
        
////        $result = Db::query('select * from banner_item where banner_id=?', [$id]);
////        $result = Db::table('banner_item')
////            ->where('banner_id', '=', $id)
////            ->select();
//        //表达式、数组、闭包
//        $result = Db::table('banner_item')
////            ->fetchSql()
//            ->where(function($query) use ($id){
//                $query->where('banner_id', '=', $id);
//            })
//            ->select();
//        return $result;
    }
}