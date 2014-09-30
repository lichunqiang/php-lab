<?php


$queue = new SplQueue;

var_dump($queue->isEmpty());

$queue->enqueue('1');
$queue->enqueue('2');
$queue->enqueue('3');
$queue->enqueue('4');
$queue->enqueue('5');
$queue->push('6');

$queue->rewind();
echo $queue->current();
// var_dump($queue->valid());
while (!$queue->isEmpty()) {
	echo $queue->pop();
	// $queue->next();
}

