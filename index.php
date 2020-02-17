<?php

define('__ROOT__', dirname(dirname(__FILE__)));
require_once(__ROOT__ . '/singletonDesignPattern/ConnectDb.php');

$instance = ConnectDb::getInstance();
$conn = $instance->getConnection();
var_dump($conn);
