<?php

	class OutPutTest extends \PHPUnit_Framework_TestCase
	{
		public function testExpectFooActualFoo()
		{
			$this->expectOutputString('foo');
			print 'foo';
		}

		public function testExpectBarActualBaz()
		{
			$this->expectOutputString('Bar');
			print 'Baz';
		}
	}