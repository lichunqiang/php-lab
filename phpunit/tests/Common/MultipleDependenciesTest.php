<?php

	class MultipleDependenciesTest extends \PHPUnit_Framework_TestCase
	{
		public function testFirst()
		{
			$this->assertTrue(TRUE, 'true is true');
			return 'first';
		}

		public function testSecond()
		{
			$this->assertTrue(true);
			return 'second';
		}

		/**
		 * @depends testFirst
		 * @depends testSecond
		 */
		public function testOrderOne()
		{
			$this->assertEquals(
				array('first', 'second'),
				func_get_args()
				);
		}
		/**
		 * @depends testSecond
		 * @depends testFirst
		 */
		public function testOrderTwo()
		{
			$this->assertEquals(
				array('first', 'second'),
				func_get_args()
				);
		}

	}