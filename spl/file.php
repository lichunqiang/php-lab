<?php
	//test SplFileInfo

	$file = new SplFileInfo('file.php');

	if($file->isFile()) {
		echo $file->getRealPath();
		echo PHP_EOL;
		echo $file->getBasename();
		echo PHP_EOL;
		echo $file->getSize();
	}


	$file_cls = new ReflectionClass('SplFileInfo');

	// $methods = $file_cls->getMethods();

	// foreach($methods as $key => $value) {
	// 	echo $key;
	// 	echo PHP_EOL;
	// 	echo $value;
	// }


	$file = $file_cls->newInstance('file.php');

	echo $file->getRealPath();