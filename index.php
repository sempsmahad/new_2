<?php
require_once('./private/initialize.php');
$index_end = strpos($_SERVER['SCRIPT_NAME'], '/new') + 4;
$fake_root = substr($_SERVER['SCRIPT_NAME'], 0, $index_end);
header("Location: " . $fake_root . '/public/index.php');
exit;
?>
