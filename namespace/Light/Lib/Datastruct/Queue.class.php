<?php
// +----------------------------------------------------------------------
// | Writen By lichunqiang
// +----------------------------------------------------------------------
// | Copyright (c) 2012-2014, All rights reserved.
// +----------------------------------------------------------------------
// | Author: Light <light-li@hotmail.com>
// +----------------------------------------------------------------------
namespace Light\Lib\DataStruct;
// include 'node.php';
/**
 * 队列
 */
class Queue
{

  public $head; //指向头元素
  public $last; //指向尾部元素
  public $size; //队列长度

  //进队列
  public function enqueue($value)
  {
    $node = new Node($value); // ==> Light\Lib\DataStruct\Node
    $this->size++; //增长队列长度
    if(null == $this->last) { //空队列
      $this->head = $node;
      $this->last = $node;
    } else {
      $this->last->next = $node;
      $node->prev = $this->last;
      $this->last = $node;
    }
  }

  //出队列
  public function dequeue()
  {
    if($this->head == null) {
      return null;
    } else {
      $this->size--;
      $node = $this->head; //将要出队的节点
      //重置head节点
      $this->head = $this->head->next;
      return $node->value;
    }
  }

  //队列长度
  public function size()
  {
    return $this->size;
  }
}

// //test
// $queue = new Queue();

// //进入队列
// for($i = 0; $i < 10; $i ++) {
//   $queue->enqueue($i);
// }
// var_dump($queue);
// print_r($queue->size());
// var_dump($queue->dequeue());
// while(null !== ($val = $queue->dequeue())) {

//   var_dump($val);
// }