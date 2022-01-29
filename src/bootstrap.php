<?php

require dirname(__FILE__).'/../vendor/autoload.php';

$dotEnv = Dotenv\Dotenv::createUnsafeImmutable(dirname(__FILE__).'/../');
$dotEnv->safeLoad();
