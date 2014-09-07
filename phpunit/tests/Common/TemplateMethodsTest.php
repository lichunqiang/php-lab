<?php
	/**
	 * setUpBeforeClass和tearDownAfterClass可用来在不同测试之间共享基境(fixture)
	 * 诸如连接数据库
	 */
	class TemplateMethodsTest extends \PHPUnit_Framework_TestCase
	{
		public static function setUpBeforeClass()
		{
			fwrite(STDOUT, __METHOD__ . '\\n');
		}
		protected function setUp()
		{
			fwrite(STDOUT, __METHOD__ . '\\n');
		}

		protected function assertPreConditions()
		{
			fwrite(STDOUT, __METHOD__ . '\\n');
		}

		public function testOne()
		{
			fwrite(STDOUT, __METHOD__ . '\\n');
			$this->assertTrue(true);
		}

		public function testTwo()
		{
			fwrite(STDOUT, __METHOD__ . '\\n');
			$this->assertTrue(FALSE);
		}

		protected function assertPostConditions()
		{
			fwrite(STDOUT, __METHOD__ . '\\n');
		}

		protected function tearDown()
		{
			fwrite(STDOUT, __METHOD__ . '\\n');
		}

		public static function tearDownAfterClass()
		{
			fwrite(STDOUT, __METHOD__ . '\\n');
		}

		protected function onNotSuccessfulTest(Exception $e)
		{
			fwrite(STDOUT, __METHOD__ . '\\n');
			throw $e;
		}

	}