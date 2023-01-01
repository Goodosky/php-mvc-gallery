<?php
require_once '../Dispatcher.php';

session_start();

$dispatcher = new Dispatcher();
$dispatcher->dispatch();
