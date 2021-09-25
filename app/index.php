<?php

$http = new swoole_http_server("0.0.0.0", 8101);

$http->on("start", function ($server) {
    echo "Swoole http server is started at http://127.0.0.1:8101\n";
});

$http->on("request", function ($request, $response) {
    print_r($request);
    $response->header("Content-Type", "text/plain");
    $response->end("Hello World. \n");
});

$http->start();