<?php
require('vendor/autoload.php');

use Dcblogdev\PdoWrapper\Database;

$options = [
    'host' => "localhost",
    'database' => "am",
    'username' => "root",
    'password' => ""
];
$db = new Database($options);

$dir = "./";?>