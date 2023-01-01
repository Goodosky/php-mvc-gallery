<?php
require_once "vendor/autoload.php";
require_once "GalleryController.php";
require_once "GalleryModel.php";
require_once "business.php";


class Dispatcher
{
  private $routes = [
    // Views
    '/' => 'index',
    '/add' => 'add',
    '/delete' => 'delete',
  ];


  function dispatch()
  {
    $path = parse_url($_SERVER['REQUEST_URI'])["path"];

    // If route not found (404)
    if (!isset($this->routes[$path])) {
      go_to_404();
      return;
    }

    $action = $this->routes[$path];

    $controller = new GalleryController();
    $controller->$action();
  }
}
