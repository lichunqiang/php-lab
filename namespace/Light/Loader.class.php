<?php
// +----------------------------------------------------------------------
// | Writen By lichunqiang
// +----------------------------------------------------------------------
// | Copyright (c) 2012-2014, All rights reserved.
// +----------------------------------------------------------------------
// | Author: Light <light-li@hotmail.com>
// +----------------------------------------------------------------------
namespace Light;
require 'Psr4Loader.class.php';

class Loader
{
  /**
  *
  * @param array  this is test
  * @return string
  * @auther light <light-li@hotmail.com>
  */

  public static function start()
  {
    //spl_autoload_register('Light\Loader::autoload');
    $loader = new \Psr4AutoloaderClass();
    $loader->register();
    $loader->addNamespace('Light', 'E:\git\php-lab\namespace\Light');
    //and do other interesting things
  }
  /**
  * 自动加载类库(this is not PSR-0 or PSR-4 standard)
  * @param strinig  请求加载的类(包含命名空间)
  * @return mixed
  * @auther light <light-li@hotmail.com>
  */
  public static function autoload($class)
  {
    $classname = ltrim($class, '\\');
    $filename = '';
    $namespace = '';
    $firstNSPos = strpos($classname, '\\');
    $filename = substr($classname, $firstNSPos + 1);
    require $filename . '.class.php';
  }
}