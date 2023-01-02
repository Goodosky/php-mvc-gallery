<?php
require_once '../Dispatcher.php';

if (session_status() === PHP_SESSION_NONE) {
  session_start();
}

$dispatcher = new Dispatcher();
$dispatcher->dispatch();
