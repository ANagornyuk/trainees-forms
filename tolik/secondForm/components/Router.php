<?php

Class Router {

  private $routes;

  public function __construct() {
    $routesPath = 'config/routes.php';
    $this->routes = include($routesPath);
  }

  private function getURI() {
    if (!empty($_SERVER['REQUEST_URI'])) {
      return str_replace('/tolik/secondForm/index.php', '',
        $_SERVER['REQUEST_URI']);
    }
  }

  public function run() {

    $uri = $this->getURI();

    foreach ($this->routes as $uriPattern => $path) {

      if (preg_match("~$uriPattern~", $uri)) {

        $internalRoute = preg_replace("~$uriPattern~", $path, $uri);


        $segments = explode('/', $internalRoute);

        if (count($segments) == 2) {
          $controllerName = array_shift($segments) . 'Controller';
          $controllerName = ucfirst($controllerName);

          $actionName = 'action' . ucfirst(array_shift($segments));

          $parameters = $segments;

          $controllerFile = ROOT . '/controllers/' .
            $controllerName . '.php';

          if (file_exists($controllerFile)) {
            include_once($controllerFile);
          }

          $controllerObject = new $controllerName;


          $result = call_user_func_array([$controllerObject, $actionName],
            $parameters);


          if ($result != NULL) {
            break;
          }
        }
      }
    }
  }
}
