<?php
	require 'vendor/autoload.php';

	use Monolog\Logger;
	use Monolog\Handler\StreamHandler;
	use Monolog\Handler\FirePHPHandler;
	use Monolog\Formatter;

	// the default date format is "Y-m-d H:i:s"
	$dateFormat = "Y n j, g:i a";
	// the default output format is "[%datetime%] %channel%.%level_name%: %message% %context% %extra%\n"
	$output = "%datetime% \n\r %level_name% \n\r %message% %context% %extra%\n";

	$formatter = new Formatter\LineFormatter($output);

	$stream = new StreamHandler('./test.log', Logger::DEBUG);
	$stream->setFormatter($formatter);

	$log = new Logger('ecdarwin');
	$log->pushHandler($stream);
	//$log->pushHandler(new FirePHPHandler());

	$log->pushProcessor(function($record){
		$record['extra']['dummy'] = 'Hello world';
		return $record;
	});

	$log->addWarning('foo');
	$log->addError('bar');
	$log->addInfo('this is info', array('name' => 'light'));