<?php
// +----------------------------------------------------------------------
// | Writen By lichunqiang
// +----------------------------------------------------------------------
// | Copyright (c) 2012-2014, All rights reserved.
// +----------------------------------------------------------------------
// | Author: Light <light-li@hotmail.com>
// +----------------------------------------------------------------------

class Psr4AutoloaderClass
{
  /**
  * 键值是命名空间前缀
  * 值为对应该命名空间下的跟目录
  * @var array
  * @auther light <light-li@hotmail.com>
  */
  protected $prefixes = array();

  /**
  * 注册SPL自动加载
  * @return void
  * @auther light <light-li@hotmail.com>
  */
  public function register()
  {
    spl_autoload_register(array($this, 'loadClass'));
  }

  /**
  *	取消注册的SPL自动加载
  * @return void
  * @auther light <light-li@hotmail.com>
  */
  public function unregister()
  {
    spl_autoload_unregister(array($this, 'loadClass'));
  }

  /**
  * 对命名空间前缀添加跟目录
  * @param string $prefix 命名空间前缀
  * @param string $base_dir 命名空间的跟目录
  * @param bool $prepend 如果为TRUE将会加入前部，而不是插入在最后，提高搜索排名
  * @return void
  * @auther light <light-li@hotmail.com>
  */
  public function addNamespace($prefix, $base_dir, $prepend = FALSE)
  {
    $prefix = trim($prefix, '\\') . '\\';

    $base_dir = rtrim($base_dir, '/') . DIRECTORY_SEPARATOR;
    $base_dir = rtrim($base_dir, DIRECTORY_SEPARATOR) . '/';
    if(isset($this->prefixes[$prefix]) === FALSE) {
      $this->prefixes[$prefix] = array();
    }
    if($prepend) {
        array_unshift($this->prefixes[$prefix], $base_dir);
    } else {
      array_push($this->prefixes[$prefix], $base_dir);
    }
  }

  /**
  * 根据类名加载类文件
  * @param string $class 合格的类名
  * @return mixed
  * @auther light <light-li@hotmail.com>
  */
  public function loadClass($class)
  {
    $prefix = $class;
    while(FALSE != $pos = strrpos($prefix, '\\')) {
      $prefix = substr($class, 0, $pos + 1);
      $relative_class = substr($class, $pos + 1);
      $mapped_file = $this->loadMappedFile($prefix, $relative_class);
      if($mapped_file) {
        return $mapped_file;
      }

      $prefix = rtrim($prefix, '\\');
    }
    return FALSE;
  }

  /**
  * 根据命名空间前缀和类名 加载文件
  * @param string  $prefix 命名空间前缀
  * @param string $relative_class 类名
  * @return mixed
  * @auther light <light-li@hotmail.com>
  */
  protected function loadMappedFile($prefix, $relative_class)
  {
    if(isset($this->prefixes[$prefix]) === FALSE) {
      return FALSE;
    }
    foreach ($this->prefixes[$prefix] as $base_dir) {
      $file = $base_dir . str_replace('\\', DIRECTORY_SEPARATOR, $relative_class) . '.class.php';
      $file = $base_dir . str_replace('\\', '/', $relative_class) . '.class.php';

      if($this->requireFile($file)) {
        return $file;
      }
    }
    return FALSE;
  }

  /**
  * 如果文件存在，则引入
  * @param string  $file 需要引入的文件
  * @return bool 如果文件存在返回TRUE，否则返回FALSE
  * @auther light <light-li@hotmail.com>
  */
  protected function requireFile($file)
  {
    if(file_exists($file)) {
      require($file);
      return TRUE;
    }
    return FALSE;
  }
}