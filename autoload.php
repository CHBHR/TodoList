<?php

use Doctrine\Common\Annotations\AnnotationRegistry;
use Composer\Autoload\ClassLoader;

/** @var ClassLoader $loader */
$loader = require __DIR__.'/autoload.php';

AnnotationRegistry::loadAnnotationClass('loadClass');

return $loader;
