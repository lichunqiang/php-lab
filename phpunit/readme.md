phpunit
--------

## Begin

使用`composer`安装依赖

将`phpunit`加入命令行

## Run

```sh
$ phpunit index.php
```

 每个文件都展示`phpunit`的使用方法

 ## Knowlage

> 当 PHPUnit 命令行测试执行器指向一个目录时，它会在目录下查找 *Test.php 文件。

### 只运行每个测试用例类声明的测试

```sh
$ phpunit tests/ExampleTest
```
只运行在tests/ExampleTest.php文件中的ExampleTes测试用例类
