<?php
require 'vendors/autoload.php';

use Light\Core;
use Light\Framework\Database as Database;
use Light\Framework\Template as Template;

header('Powered-By: Light');
//框架---模板
$template = new Template();

$template->setVar('name', 'light');

$template->render('1.html');

// $core = new Core();

//框架---数据库
// $db = new Database();

//框架---router
// flight