<?php
/**
 * Created by sapphire.php@gmail.com
 * User: yongze
 * Date: 2017/4/29
 * Time: 下午9:10
 */
require_once __DIR__ . '/vendor/autoload.php';
use Workerman\Worker;

// #### create socket and listen 1234 port ####
$tcp_worker = new Worker("tcp://0.0.0.0:1234");

// 4 processes
$tcp_worker->count = 4;

// Emitted when new connection come
$tcp_worker->onConnect = function($connection)
{
    echo "New Connection\n";
};

// Emitted when data received
$tcp_worker->onMessage = function($connection, $data)
{
    // send data to client
    $formatTime = date('Y-m-d H:i:s',time());
    $formatTime = time();
    $connection->send("hello $data $formatTime \n");
};

// Emitted when new connection come
$tcp_worker->onClose = function($connection)
{
    echo "Connection closed\n";
};

Worker::runAll();