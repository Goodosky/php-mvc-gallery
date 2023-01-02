<?php
require_once '../Dispatcher.php';

if (!isset($_SESSION)) {
  session_start();
}

$dispatcher = new Dispatcher();
$dispatcher->dispatch();
