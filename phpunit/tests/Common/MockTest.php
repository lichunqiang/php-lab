<?php

	class MockTest extends \PHPUnit_Framework_TestCase
	{
		public function testPushAndPop()
		{
			$stack = array();
			$this->assertEquals(0, count($stack));
		}

		// test dependencies


		public function testEmpty()
		{
			$stack = array();
			$this->assertEmpty($stack, 'Stack should empty array');
			$this->assertFalse(empty($stack), 'empty $stack should true');
			return $stack;
		}

		/**
		 * @depends testEmpty
		 */
		public function testPush(array $stack)
		{
			array_push($stack, 'foo');
			$this->assertEquals('foo', $stack[count($stack) - 1], 'Should equal foo');
			$this->assertNotEmpty($stack, 'Stack should not empty');

			return $stack;
		}

		/**
		 * @depends testPush
		 */
		public function testPop(array $stack)
		{
			$this->assertEquals('foo', array_pop($stack), 'Pop value should equal foo');
			$this->assertEmpty($stack, 'Now stack is empty');
		}
	}