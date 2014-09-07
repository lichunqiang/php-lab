<?php

	class DataProviderTest extends \PHPUnit_Framework_TestCase
	{
		/**
		 * @dataProvider additionProvider
		 */
		public function testAdd($a, $b, $expected)
		{
			$this->assertEquals($expected, $a + $b);
		}
		/**
		 * @dataProvider oneItemProvider
		 */
		public function testOneItemAdd($a, $b)
		{
			$this->assertEquals(3, $a + $b);
		}

		public function oneItemProvider()
		{
			//bad
			//return array(1, 2);
			return array(
				array(1, 2)
			);
		}

		public function additionProvider()
		{
			return array(
				array(0, 0, 0),
				array(0, 1, 1),
				array(1, 0, 3)
			);
		}
	}