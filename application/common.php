<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用公共文件


if(!function_exists('curl_get')){
//    function curl_get($url){
//        $curl = curl_init();
//        //设置抓取的url
//        curl_setopt($curl, CURLOPT_URL, $url);
//        //设置头文件的信息作为数据流输出
//        curl_setopt($curl, CURLOPT_HEADER, 1);
//        //设置获取的信息以文件流的形式返回，而不是直接输出
//        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
//        //执行命令
//        $data = curl_exec($curl);
//        //关闭请求
//        curl_close($curl);
//        return $data;
//    }
    
    function curl_get($url, &$httpCode = 0){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        
        //不做证书效验，部署在linux环境下请改为true
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
        $file_contents = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        return $file_contents;
    }
}
if(!function_exists('getRandChar')){
    function getRandChar($length){
        $str = '';
        $strPol = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyz';
        $max = strlen($strPol) - 1;
        for($i=0;$i<$length;$i++){
            $str .= $strPol[rand(0, $max)];
        }
        return $str;
    }
}
