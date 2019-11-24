<?php

require_once 'Medoo.php';
use Medoo\Medoo;

$database = new Medoo([
  'database_type' => 'mysql',
  'database_name' => 'laravel',
  'server' => 'localhost',
  'username' => 'root',
  'password' => ''
]);

$result = $database->query("SELECT * FROM users");

print_r($result);
