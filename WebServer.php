<?php
/**
 * Created by sapphire.php@gmail.com
 * User: yongze
 * Date: 2017/4/29
 * Time: 下午9:10
 */
require_once __DIR__ . '/vendor/autoload.php';
use Workerman\WebServer;
use Workerman\Worker;

// WebServer
$web = new WebServer("http://0.0.0.0:8081");

// 4 processes
$web->count = 4;

// Set the root of domains
$web->addRoot('www.your_domain.com', '/your/path/Web');
$web->addRoot('www.another_domain.com', '/another/path/Web');
// run all workers
Worker::runAll();