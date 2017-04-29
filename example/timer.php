<?php
/**
 * Created by sapphire.php@gmail.com
 * User: yongze
 * Date: 2017/4/29
 * Time: 下午9:11
 */
require_once __DIR__ . '../vendor/autoload.php';
use Workerman\Worker;
use Workerman\Lib\Timer;

$task = new Worker();
$task->onWorkerStart = function($task)
{
    // 2.5 seconds
    $time_interval = 0.1;
    $timer_id = Timer::add($time_interval,
        function()
        {
            $formatTime = date('Y-m-d H:i:s',time());
            $formatTime = time();
            echo "Timer run {$formatTime} \n";
        }
    );
};

// run all workers
Worker::runAll();