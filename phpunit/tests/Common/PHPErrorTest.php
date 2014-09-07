<?php

	/**
	 * 默认情况PHPUnit将在执行中触发的PHP错误、警告、通知都转换为异常。
	 * PHPUnit_Framework_Error_Notice 和 PHPUnit_Framework_Error_Warning 分别代表 PHP 通知与 PHP 警告。
	 */
	class PHPErrorTest extends \PHPUnit_Framework_TestCase
	{
		/**
		 * @expectedException PHPUnit_Framework_Error
		 */
		public function testFailingInclude()
		{
			include 'not_existing_file.php'; // 使用require 为什么不行？
		}

		/**
		 * @expectedException PHPUnit_Framework_Error_Notice
		 */
		public function testNotice()
		{
			$arr = array();
			$a = $arr['test'];
		}
	}
