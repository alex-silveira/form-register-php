<?php

define('HOST', 'localhost');
define('DB_NAME', 'user');
define('DB_USER', 'postgres');
define('PASSWORD', '12345');

$pdo = new PDO("pgsql:dbname=DB_NAME;host=HOST", DB_USER, PASSWORD);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

