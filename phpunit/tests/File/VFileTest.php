<?php
require 'E:\git\php-lab\phpunit\vendor/autoload.php';
require 'fixtures/Example.php';

use mikey179\vfsStream;

class VFileTest extends \PHPUnit_Framework_TestCase
{
	/**
	* set up test enviroment
	* @var string
	*/
	private $root;

	public function setUp()
	{
		$this->root = vfsStream::setup('exampleDir');
	}

	public function testDirecoryIsCreated()
	{
		$example = new Example('id');
		$this->assertFalse($this->root->hasChild('id'));

		$example->setDirectory(vfsStream::url('exampleDir'));
		$this->assertTrue($this->root->hasChild('id'));
	}
}