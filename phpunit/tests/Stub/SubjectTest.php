<?php
	require 'fixtures/Subject.php';
	require 'fixtures/Observer.php';

	class SubjectTest extends \PHPUnit_Framework_TestCase
	{
		protected $subject;
		protected function setUp()
		{
			$this->subject = new Subject('My subject');
		}
		public function testObserversAreUpdated()
		{
			//建立预期状况：update() 方法将会被调用一次，
			//并且将以字符串 'something'为参数
			$observer = $this->getMock('Observer', array('update'));

			$observer->expects($this->once())
					 ->method('update')
					 ->with($this->equalTo('something'));
			//创建 Subject 对象，并将模仿的 Observer 对象连接其上
			// $subject = new Subject('My Subject');

			$this->subject->attach($observer);
			// 在 $subject 对象上调用 doSomething() 方法，
			// 预期将以字符串 'something' 为参数调用
			// Observer 仿件对象的 update() 方法。
			$this->subject->doSomething();
		}
		//测试某个方法将会以特定数量的参数进行调用，并且对各个参数以多种方式进行约束
		public function testErrorReported()
		{
			//为 Observer 类建立仿件，对 reportError() 方法进行模仿
			$observer = $this->getMock('Observer', array('reportError'));

			$observer->expects($this->once())
					 ->method('reportError')
					 ->with($this->greaterThan(0),
					 		$this->stringContains('Something'),
					 		$this->anything());

			// $subject = new Subject('My subject');
			$this->subject->attach($observer);

			$this->subject->doSomethingBad();
		}
		//测试某个方法将会以特定参数被调用二次
		// public function testFunctionCalledTwoTimesWithSpecificArguments()
		// {
		// 	$mock = $this->getMock('stdClass', array('set'));
		// 	$mock->expects($this->exactly(2)) //被调用两次
		// 		 ->method('set')
		// 		 ->withConsecutive(  //方法不存在？
		// 		 	array($this->equalTo('foo'), $this->greaterThan(0)),
		// 		 	array($this->equalTo('bar'), $this->greaterThan(0))
		// 		 );

		// 	$mock->set('foo', 21);
		// 	$mock->set('bar', 74);
		// }

		//复杂参数
		public function testComplexErrorReported()
		{
			$observer = $this->getMock('Observer', array('reportError'));

			$observer->expects($this->once())
					 ->method('reportError')
					 ->with($this->greaterThan(0),
					 		$this->stringContains('Something'),
					 		$this->callback(function($subject){
					 			return is_callable(array($subject, 'getName'))
					 					&& $subject->getName() === 'My subject';
					 		}));

			$this->subject->attach($observer);
			$this->subject->doSomethingBad();
		}
		//测试某个方法将会被调用一次，并且以某个特定对象作为参数。
		public function testIdenticalObjectPassed()
		{
			$expectedObject = new stdClass;
			$mock = $this->getMock('stdClass', array('foo'));

			$mock->expects($this->once())
				 ->method('foo')
				 ->with($this->identicalTo($expectedObject));

			$mock->foo($expectedObject);
		}
	}