<?php
// +----------------------------------------------------------------------
// | Writen By lichunqiang
// +----------------------------------------------------------------------
// | Copyright (c) 2012-2014, All rights reserved.
// +----------------------------------------------------------------------
// | Author: Light <light-li@hotmail.com>
// +----------------------------------------------------------------------
namespace Light\Framework;

use Light\Interfaces\iTemplate;

class Template implements iTemplate
{
	private $template_data = array();

	public function __construct()
	{
		//echo 'this is template engine';
	}

	public function setVar($key, $value)
	{
		$this->template_data[$key] = $value;
	}

	public function render($tmpl)
	{
		ob_start();
		extract($this->template_data);
		include_once $tmpl;
		//return ob_get_clean();
		$html = ob_get_contents();
		ob_clean();
		echo $html;
	}
}