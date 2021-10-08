#!/usr/bin/env php
<?php

use Swoole\WebSocket\Server;
use Swoole\Http\Request;
use Swoole\WebSocket\Frame;

$server = new Server("0.0.0.0", 8000);

$server->on("Start", function (Server $server) {
    echo "Swoole WebSocket Server is started at http://localhost:8000\n";
});

$server->on('Open', function (Server $server, Request $request) {
    echo "connection open: {$request->fd}\n";
});

$server->on('Message', function (Server $server, Frame $frame) {
    echo "received message: {$frame->data}\n";
    $server->push($frame->fd, json_encode(["hello", time()]));
});

$server->on('Close', function (Server $server, int $fd) {
    echo "connection close: {$fd}\n";
});

$server->on('Disconnect', function ($server, int $fd) {
    echo "connection disconnect: {$fd}\n";
});

$server->start();