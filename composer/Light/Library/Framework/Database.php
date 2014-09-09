<?php
// +----------------------------------------------------------------------
// | Writen By lichunqiang
// +----------------------------------------------------------------------
// | Copyright (c) 2012-2014, All rights reserved.
// +----------------------------------------------------------------------
// | Author: Light <light-li@hotmail.com>
// +----------------------------------------------------------------------
namespace Light\Framework;

use Light\Interfaces;

class Database implements Interfaces\iDB
{
	public function __construct()
	{
		echo 'this is database';
	}

	public function run($cmd)
	{
		echo 'this is run';
	}
}