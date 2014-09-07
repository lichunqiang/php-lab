<?php
require 'fixtures/Example.php';

class FileTest extends \PHPUnit_Framework_TestCase
{
	protected function setUp()
	{
		if(file_exists(dirname(__FILE__) . '/id')) {
			rmdir(dirname(__FILE__) . '/id');
		}
	}
	public function testDirectoryIsCreated()
	{
		$example = new Example('id');
		$this->assertFalse(file_exists(dirname(__FILE__) . '/id'));

		$example->setDirectory(dirname(__FILE__));
		$this->assertTrue(file_exists(dirname(__FILE__) . '/id'));
	}

	protected function tearDown()
	{
		if(file_exists(dirname(__FILE__) . '/id')) {
			rmdir(dirname(__FILE__) . '/id');
		}
	}
}