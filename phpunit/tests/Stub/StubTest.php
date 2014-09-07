<?php
	require 'fixtures/SomeClass.php';

	class StubTest extends \PHPUnit_Framework_TestCase
	{

		protected $stub;
		protected function setUp()
		{
			$this->stub = $this->getMock('SomeClass');
		}
		public function testStub()
		{
			//$methods 只有名称在数组汇总的方法会被替换为可配置的测试替身。其他方法的行为不会有所改变.
			//$methods = NULL 意味着不会有方法被替换
//			$stub = $this->getMock('SomeClass'/*, methods, arguments, 'mockClassName', callOriginalConstructor, callOriginalClone, callAutoload, cloneArguments*/);
			//配置
			$this->stub->method('doSomething')
				 ->willReturn('foo');

			$this->assertEquals('foo', $this->stub->doSomething());
		}

		public function testStubReturnArgument()
		{
			$this->stub->method('doSomething')
				 ->will($this->returnArgument(0));

			$this->assertEquals('foo', $this->stub->doSomething('foo'));
			$this->assertEquals('bar', $this->stub->doSomething('bar'));
		}

		// public function testStubBuilder()
		// {
		// 	$stub = $this->getMockBuilder('SomeClass')
		// 				 ->disableOriginalConstructor()
		// 				 // ->setMethods(array $methods)
		// 				 // ->setConstructorArgs(array $args)
		// 				 // ->setMockClassName($name)
		// 				 // ->disableOriginalClone()
		// 				 // ->disableAutoload()
		// 				 ->getMock();

		// 	$stub->method('doSomething')
		// 		 ->willReturn('foo');

		// 	$this->assertEquals('foo', $stub->doSomething());
		// }

		public function testReturnSelf()
		{
			$this->stub->method('doSomething')
				 ->will($this->returnSelf());

			$this->assertSame($this->stub, $this->stub->doSomething());
		}

		public function testReturnValueMapStub()
		{
			$map = array(
				array('a', 'b', 'c', 'd'),
				array('e', 'f', 'g', 'h')
			);
			$this->stub->method('doSomething')
				 ->will($this->returnValueMap($map));

			$this->assertEquals('d', $this->stub->doSomething('a', 'b', 'c'));
			$this->assertEquals('h', $this->stub->doSomething('e', 'f', 'g'));
		}

		public function testReturnCallbackStub()
		{
			$this->stub->method('doSomething')
				 ->will($this->returnCallback('str_rot13'));

			$this->assertEquals('fbzrguvat', $this->stub->doSomething('something'));
		}
		//直接给出期望返回值列表
		public function testOnConsecutiveCallsStub()
		{
			$this->stub->method('doSomething')
				 ->will($this->onConsecutiveCalls(2, 3, 5, 7));

			$this->assertEquals(2, $this->stub->doSomething());
			$this->assertEquals(3, $this->stub->doSomething());
			$this->assertEquals(5, $this->stub->doSomething());
		}

		public function testThrowExceptionStub()
		{
			$this->stub->method('doSomething')
				 	   ->will($this->throwException(new \Exception));

			$this->stub->doSomething();
		}

		protected function tearDown()
		{
			$this->stub = null;
		}
	}