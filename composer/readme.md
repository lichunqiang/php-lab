### 一些字段

#### config.vendor-dir

composer的默认安装目录是当前目录下的`vendor`，可以通过修改此项来改变默认的安装目录。

#### config.autoloader-suffix

修改自动加载函数的名称。此项默认是`NULL`,通过生成随机字串来命名自动加载函数名。

#### autoload.files

接收一个`array`

数组里面制定了哪些文件每次都会自动加载。

#### composer dump-autoloader

如果修改了`composer`的`autoload`和`config`,但类库的依赖并没有改变，可以通过此项命令来更新自动加载函数。