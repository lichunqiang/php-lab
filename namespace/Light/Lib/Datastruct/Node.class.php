<?php
// +----------------------------------------------------------------------
// | Writen By lichunqiang
// +----------------------------------------------------------------------
// | Copyright (c) 2012-2014, All rights reserved.
// +----------------------------------------------------------------------
// | Author: Light <light-li@hotmail.com>
// +----------------------------------------------------------------------
namespace Light\Lib\DataStruct;
/**
 * 双向链表节点信息
 */
class Node
{
  public $value;  //节点数据
  public $prev;   //指向前驱节点
  public $next;   //指向后继节点

  public function __construct($value)
  {
    $this->value = $value;
    $this->prev = null;
    $this->next = null;
  }
}