<?php

class Router {
	private $routes;

	public function __construct() {
		$routesPath = ROOT.'config/routes.php';
		$this->routes = include($routesPath);
	}

	private function getURI() { 
		if (!empty($_SERVER["REQUEST_URI"])) {
			return trim($_SERVER["REQUEST_URI"],'/');
		}
	}

	public function run() {
		$uri = $this->getURI();
		foreach ($this->routes as $uriPattern => $path) {
			if (preg_match("`$uriPattern`", $uri)) {
				$internalRoute = preg_replace("`$uriPattern`", $path, $uri);
				//echo "<br>internalRoute - $internalRoute";
				$segments = explode("/", $internalRoute);
				//ім'я сконтролера
				$controllerName = array_shift($segments)."Controller";
				$controllerName = ucfirst($controllerName);
				//echo "<br>cont - $controllerName";
				// action
				$actionName = "action".ucfirst(array_shift($segments));
				//echo "<br>actionName - $actionName";
				// параметри
				$parametrs = $segments;
				$ControllerFile = ROOT."controllers/".$controllerName.".php";
				//echo "<br>File - $ControllerFile";
				if (file_exists($ControllerFile)) {
					include_once ($ControllerFile);
					$controllerObject = new $controllerName;
					$result = call_user_func_array(array($controllerObject,$actionName), $parametrs);
					if ($result != NULL) break;
				}
			}
			
		}
	}
}
?>