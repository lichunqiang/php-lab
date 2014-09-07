<?php

	class ExceptionTest extends \PHPUnit_Framework_TestCase
	{
		/**
		 * @expectedException InvalidArgumentException
		 * @expectedExceptionMessage  Right Message
		 */
		public function testExceptionHasRightMessage()
		{
			throw new InvalidArgumentException("Error Processing Request", 1);
		}

		/**
		 * @expectedException InvalidArgumentException
		 * @expectedExceptionMessageRegExp /Right./
		 */
		public function testExceptionMessageMatchesRegExp()
		{
			throw new InvalidArgumentException("Error Processing Request", 1);
		}

		/**
		 * @expectedException InvalidArgumentException
		 * @expectedExceptionCode 20
		 */
		public function testExceptionHasRightCode()
		{
			throw new InvalidArgumentException("Error Processing Request", 1);
		}

		public function testExceptionHasRightCodeUseFunc()
		{
			$this->setExpectedException('InvalidArgumentException', 'exceptionMessage', 20);
			throw new InvalidArgumentException("Error Processing Request", 1);
		}
	}