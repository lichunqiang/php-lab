<?php
	require __DIR__ . '/vendors/autoload.php';

	$storage = new \Upload\Storage\FileSystem('./');

	$file = new \Upload\File('foo', $storage);

	$file->setName('xxxx.xx');

	$file->addValidations(array(
		new \Upload\Validation\Mimetype('image/png'),
		new \Upload\Validation\Size('5M')
	));

	// Access data about the file that has been uploaded
	$data = array(
	    'name'       => $file->getNameWithExtension(),
	    'extension'  => $file->getExtension(),
	    'mime'       => $file->getMimetype(),
	    'size'       => $file->getSize(),
	    'md5'        => $file->getMd5(),
	    'dimensions' => $file->getDimensions()
	);

	// Try to upload file
	try {
	    // Success!
	    $file->upload();
	} catch (\Exception $e) {
	    // Fail!
	    $errors = $file->getErrors();
	}