<?php
require __DIR__ . '/vendors/autoload.php';

$slugify = new Cocur\Slugify\Slugify();

echo $slugify->slugify('wo shi hao ren');