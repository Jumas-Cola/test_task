<?php

require __DIR__.'/../bootstrap.php';

use JumasCola\TestTask\Database\Database;

$db = Database::getConnection();

$sql ='CREATE table urls(
    id INT( 11 ) AUTO_INCREMENT PRIMARY KEY,
    url VARCHAR( 2083 ) NOT NULL)';
$db->exec($sql);
print('Created $table Table.\n');
