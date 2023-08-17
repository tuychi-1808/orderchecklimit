<?php


require_once 'config/layout.php';


$id = $_GET['id'];
$create_at = $_GET['create_at'];

$order_limit = new Order();
$order_limit->chekLimit($create_at, $id);
header("location:index.php");
