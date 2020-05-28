<?php
$host = "localhost";
$dbname = "user";
$dbuser = "postgres";
$password = "12345";

$pdo = new PDO("pgsql:dbname=$dbname;host=$host", $dbuser, $dbpass);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

?>