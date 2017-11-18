<?php
// +----------------------------------------------------------------------
// | 扫描
// +----------------------------------------------------------------------
// |  
// +----------------------------------------------------------------------

namespace app\api\controller;
use app\common\controller\Common;

class Scan extends Common
{
    public function index()
    {   

        $param = $this->param;
        $param['url'] = urlencode($param['url']);

        $host = $param['host'];
        $post_data =  json_encode($param);

 
        $url = 'http://' . $host;
        $ch = curl_init();

        $headers[] = 'Connection: Keep-Alive';  
        $headres[] = 'Content-Type: application/x-www-form-urlencoded;charset=utf-8';       
 
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);  
        curl_setopt($ch, CURLOPT_HEADER, 0);  
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);  
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);  


        // post数据
        curl_setopt($ch, CURLOPT_POST, 1);
        // post的变量
        // 



        curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);

        curl_setopt($ch, CURLOPT_URL, $url);

        $output = curl_exec($ch);
        curl_close($ch);



        $res = json_decode($output);


        return resultArray(['data' => $res]);
                // 
        
    }
 

}
 