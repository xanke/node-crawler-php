<?php
// +----------------------------------------------------------------------
// | 房产项目获取
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

        // $param['model'] = json_decode($param['model']);

        $param['url'] = urlencode($param['url']);

        $host = $param['host'];



$post_data =  json_encode($param);


        // return $post_data;
        // 

// return $post_data;


// $post_data = array ("username" => "bob","key" => "12345");

        $url = 'http://' . $host;
        $ch = curl_init();

$headers[] = 'Connection: Keep-Alive';  
$headres[] = 'Content-Type: application/x-www-form-urlencoded;charset=utf-8';       
// $headers[] = 'Content-Length: ' . strlen(json_encode($post_data));  
    // $headres[] = 'Content-Type: application/json';  
    //     $headres[] = 'Content-Type: text/html';  

        // $post_data = json_encode($param);

 
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
 