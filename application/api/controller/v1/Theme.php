<?php
/**
 * Created by PhpStorm.
 * User: met
 * Date: 2019/7/12
 * Time: 17:11
 */
namespace app\api\controller\v1;
use app\api\validate\IDCollection;
use app\api\model\Theme as ThemeModel;
use app\api\validate\IDMustBePositiveInt;
use app\lib\exception\ThemeException;
class Theme
{
    /**
     * @title
     * @author 彭敏敏
     * @param $ids
     * @url theme?ids=1,2,3
     * return 一组Theme模型
     */
    public function getSimpleList($ids){
        
        (new IDCollection())->goCheck();
        $ids = explode(',', $ids);
        $result = ThemeModel::with(['topicImg', 'headImg'])->select($ids);
//        $result = ThemeModel::with('topicImg,headImg')->select($ids);
        //以上两种写法都支持
        if($result->isEmpty()){
            throw new ThemeException();
        }
        return $result;
    }
    
    public function getComplexOne($id){
        (new IDMustBePositiveInt())->goCheck();
        
        $theme = ThemeModel::getThemeWithProducts($id);
        if(!$theme)throw new ThemeException();
        return $theme;
    }
}