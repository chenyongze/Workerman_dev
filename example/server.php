<?php
/**
 * Created by sapphire.php@gmail.com
 * User: yongze
 * Date: 2017/4/29
 * Time: 下午9:09
 */
require_once __DIR__ . '../vendor/autoload.php';
use Workerman\Worker;

// #### http worker ####
$http_worker = new Worker("http://0.0.0.0:2345");

// 4 processes
$http_worker->count = 8;

// Emitted when data received
$http_worker->onMessage = function($connection, $data)
{
    // $_GET, $_POST, $_COOKIE, $_SESSION, $_SERVER, $_FILES are available
    var_dump($_GET, $_POST, $_COOKIE, $_SESSION, $_SERVER, $_FILES);
    // send data to client
    $formatTime = date('Y-m-d H:i:s',time());
    $connection->send("hello world {$formatTime} \n");
};

// run all workers
Worker::runAll();