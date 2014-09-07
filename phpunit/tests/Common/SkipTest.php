<?php
	/**
	 * @requires extension mysqli
	 * @requires PHP 5.3
	 * @requires function test
	 */
	class SkipTest extends \PHPUnit_Framework_TestCase
	{
		protected function setUp()
		{
			if(!extension_loaded('mysqli')) {
				$this->markTestSkipped('MySQLi 扩展不可用');
			}
		}

		public function testConnection()
		{
			//...
		}
	}