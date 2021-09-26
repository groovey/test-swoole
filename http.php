#!/usr/bin/env php
<?php

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

// $http->reload(true);


$http->on('WorkerStart', function ($serv, $workerId) {
    // Files which won't be reloaded
    // var_dump(get_included_files());

    // Include files from here so they can be reloaded...
});



$http->start();