<?php
error_reporting(E_ALL);
ini_set('display_errors',1);

require_once 'autoload.php';

$database = new Database('localhost','order-shop','root','');
$pdo = $database->connect();

$title = "My Order";

Order::$pdo = $pdo;