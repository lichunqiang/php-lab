<?php
// +----------------------------------------------------------------------
// | Writen By lichunqiang
// +----------------------------------------------------------------------
// | Copyright (c) 2012-2014, All rights reserved.
// +----------------------------------------------------------------------
// | Author: Light <light-li@hotmail.com>
// +----------------------------------------------------------------------

include 'Light/Loader.class.php';

\Light\Loader::start();

use Light\Lib\DataStruct;


$queue = new DataStruct\Queue();

//进入队列
for($i = 0; $i < 10; $i ++) {
  $queue->enqueue($i);
}
print_r($queue->size());
while(null !== ($val = $queue->dequeue())) {

  var_dump($val);
}

// use Light\Time\Time;

// $time = new Time\Time();

// $time = new Time();

// $time->echoNow();

// echo '<br />';

// \Light\Time\echo_now();