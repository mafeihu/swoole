<?php
//创建服务
$http = new swoole_http_server("127.0.0.1", 8801);

//设置请求地址静态页面
$http->set(
    [
       'enable_static_handler' => true,
        'document_root' => '/www/swoole/data',
    ]
);

//接收请求，响应并且返回
$http->on('request', function ($request, $response) {
    //var_dump($request->get);
    $response->cookie('singwa','wwwwxxx',time()+1800);
    $response->end("<h1>Hello Swoole. #".json_encode($request->get)."</h1>");
});
$http->start();