#!/usr/bin/env php
<?php

declare(strict_types=1);

$http = new swoole_http_server("0.0.0.0", 8101);

$http->on("start", function ($server) {
    echo "Swoole http server is started at http://127.0.0.1:8101\n";
});

$http->on("request", function ($request, $response) {
    // print_r($request);

    print_r($request);
    
    
    $response->header("Content-Type", "text/plain");
    $response->end("Hello World. \n" . $request->get['x']);
});

$http->start();


// use Swoole\Http\Request;
// use Swoole\Http\Response;
// use Swoole\Http\Server;

// $http = new Server("0.0.0.0", 8101);



// $http->on(
//     "start",
//     function (Server $http) {
//         print 'zzzzzzzzzz';
        
//         echo "Swoole HTTP server is started.\n";
//     }
// );
// $http->on(
//     "request",
//     function (Request $request, Response $response) {
//         $response->end("Hello, World!\n");
//     }
// );