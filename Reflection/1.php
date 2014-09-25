<?php
interface TestInterface {}

/**
 * Test Class
 */
class Test implements TestInterface
{
	const URL = 'lichunqiang.github.io';

	/**
	 * 姓名
	 * @var string
	 */
	public $name = 'light';

	protected $age = 12;

	private $sex = 'man';

	static $birthday = '1990-09-01';

	public function __construct(){}

	public function setAge($age)
	{
		$this->age = $age;
	}

	protected function saySex()
	{
		echo $this->sex;
	}

	private function rewriteSex()
	{
		$this->sex = 'women';
	}

	static function say()
	{
		echo 'echo';
	}

	private function __toString()
	{
		echo __CLASS__;
	}
}

/**
 * ReflectionClass::export
 * 导出一个反射后的类
 */

//ReflectionClass::export('Test');


/**
 * ReflectionClass::getConstant
 * 返回定义常量的值
 */
$class = new ReflectionClass('Test');
echo $class->getConstant('URL');

/**
 * ReflectionClass::getConstants
 * 获取定义的常量数组，key为常量名，value为常量值
 */
var_dump($class->getConstants());

/**
 * ReflectionClass::getConstructor
 * 获取构造函数
 */
var_dump($class->getConstructor());

/**
 * ReflectionClass::getDefaultProperties
 * 获取默认属性
 */
var_dump($class->getDefaultProperties());

/**
 * 获取注释
 */
var_dump($class->getDocComment());
/**
 * 获取类的起始行号
 */
var_dump($class->getStartLine());
/**
 * 获取类的结束行号
 */
var_dump($class->getEndLine());

/**
 * 根据已定义的类，获取所在的扩展
 * 如果是用户定义的类则返回NULL
 */
$class1 = new ReflectionClass('PDO');

var_dump($class1->getExtension());
//获取扩展名称
var_dump($class1->getExtensionName());

/**
 * 获取定义类的文件名
 * 如果这个类是在 PHP 核心或 PHP 扩展中定义的，则返回 FALSE
 */
var_dump($class->getFileName());

/**
 * 获取接口名称
 */
var_dump($class->getInterfaceNames());

/**
 * 获取接口
 * 数组键是接口（interface）的名称，数组的值是 ReflectionClass 对象。
 */
var_dump($class->getInterfaces());

/**
 * 获取一个类的方法
 */
var_dump($class->getMethod('rewriteSex'));

/**
 * 获取类的所有方法
 * ReflectionMethod::IS_STATIC
 * ReflectionMethod::IS_PUBLIC
 * ReflectionMethod::IS_PROTECTED
 * ReflectionMethod::IS_PRIVATE
 * ReflectionMethod::IS_ABSTRACT
 * ReflectionMethod::IS_FINAL
 */
var_dump($class->getMethods(ReflectionMethod::IS_STATIC));

/**
 * 返回类的修饰符位掩码
 */
var_dump($class->getModifiers());

/**
 * 获取类名(包含命名空间)
 */
var_dump($class->getName());

/**
 * 获取命名空间的名臣
 */
var_dump($class->getNamespaceName());

/**
 *  返回父类
 */
var_dump($class->getParentClass());

/**
 * 获取一组属性
 */
var_dump($class->getProperties());

/**
 * 获取单一属性
 */
var_dump($class->getProperty('name'));

/**
 * 获取不包含命名空间的类名
 */
var_dump($class->getShortName());

/**
 * 获取类的静态属性
 */
var_dump($class->getStaticProperties());

/**
 * 获取静态属性的值
 */
var_dump($class->getStaticPropertyValue('birthday'));

/**
 * 检查类是否定义了常量、方法、属性
 */
var_dump($class->hasConstant('URL'));
var_dump($class->hasMethod('setAge'));
var_dump($class->hasProperty('name'));

/**
 * 检查类是否实现了一个接口
 */
var_dump($class->implementsInterface('TestInterface'));

/**
 * 检查一个类是否定义在命名空间中
 */
var_dump($class->inNamespace());

//检查类是否是抽象类
var_dump($class->isAbstract());

//检查一个类是否可复制
var_dump($class->isCloneable());

//检查类是否被声明为final
var_dump($class->isFinal());

//检查一个对象是否是类的实例
$t = new Test;
var_dump($class->isInstance($t));

//检查类是否可被实例化
var_dump($class->isInstantiable());

//根据指定的参数创建实例
var_dump($class->newInstance());

echo $class->__toString();

exit;


