<?php
require_once "vendor/autoload.php";
require_once "GalleryController.php";
require_once "models/GalleryModel.php";
require_once "models/UserModel.php";
require_once "business.php";


class Dispatcher
{
  private $routes = [
    '/' => 'index',
    '/addImage' => 'addImage',
    '/remember-selected' => 'rememberSelected',
    '/show-selected' => 'showSelected',
    '/remove-selected' => 'removeSelected',
    '/addUser' => 'addUser',
    '/login' => 'login',
    '/logout' => 'logout',
  ];


  function dispatch()
  {
    $path = parse_url($_SERVER['REQUEST_URI'])["path"];
    $controller = new GalleryController();

    // If route not found (404)
    if (!isset($this->routes[$path])) {
      $controller->error_404();
      exit();
    }

    $action = $this->routes[$path];
    $controller->$action();
  }
}
