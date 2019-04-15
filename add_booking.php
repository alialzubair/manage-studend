<?php
session_start();
include 'init.php';

$id=isset($_GET['id'])&& is_numeric($_GET['id'])?intval($_GET['id']):0;
echo $id;

?>