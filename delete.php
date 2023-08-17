<?php

require_once 'config/layout.php';


$id = $_GET['id'];

Order::delete($id);

header("location:index.php");
