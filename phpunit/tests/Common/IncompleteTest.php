<?php
	class IncompleteTest extends \PHPUnit_Framework_TestCase
	{
		public function testSomething()
		{
			$this->assertTrue(True, '这应该已经是能正常工作的。');

			//在这里停止，病将此测试标记为不完整
			$this->markTestIncomplete('此测试尚未实现');
		}
	}