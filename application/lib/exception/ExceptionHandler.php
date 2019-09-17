<?php
/**
 * Created by PhpStorm.
 * User: met
 * Date: 2019/7/10
 * Time: 15:27
 */
namespace app\lib\exception;
use think\exception\Handle;
use think\Log;
use think\Request;

class ExceptionHandler extends Handle{
    
    private $code;
    private $msg;
    private $errorCode;
    //请求地址URL
    
    public function render(\Exception $e){
        if($e instanceof BaseException){
            $this->code = $e->code;
            $this->msg = $e->msg;
            $this->errorCode = $e->errorCode;
        }else{
            if(config('app_debug')){
                return parent::render($e);
            }else{
                $this->code = 500;
                $this->msg = '服务器错误，不想告诉你';
                $this->errorCode = 999;
                $this->log($e);
            }
            
        }
        $request = Request::instance();
        $request_url = $request->url();
        $result = [
            'msg' => $this->msg,
            'error_code' => $this->errorCode,
            'request_url' => $request_url,
        ];
        return json($result, $this->code);
    }
    
    protected function log(\Exception $e){
        Log::init([
            'type' => 'file',
            'path' => LOG_PATH,
            'level' => ['error']
        ]);
        Log::record($e->getMessage(), 'error');
    }
}