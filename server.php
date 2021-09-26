#!/usr/bin/env php
<?php
// declare(strict_types=1);

require './bootstrap.php';

use Swoole\Http\Request;
use Swoole\Http\Response;
use Swoole\Http\Server;

$http = new Server("0.0.0.0", 8101);

$http->on("start", function (Server $http) {
    echo "Swoole http server is started at http://127.0.0.1:8101\n";
});

$http->on("request", function (Request $request, Response $response) {
    dump($request);
    
    $response->header("Content-Type", "text/plain");
    $response->end("Hello, World!\n");
});

$http->start();