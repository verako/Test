<?php

class Router
{

	private $routes;

	public function __construct()
	{
		$routesPath = ROOT.'/config/routes.php';
		$this->routes = include($routesPath);
	}

// Returns request string type 

	private function getURI()
	{
		if (!empty($_SERVER['REQUEST_URI'])) {
		return trim($_SERVER['REQUEST_URI'], '/');
		}
	}

	public function run()
	{
		$uri = $this->getURI();

		foreach ($this->routes as $uriPattern => $path) {

			//сравниваем строку запроса с роутами
			if(preg_match("~$uriPattern~", $uri)) {

/*				echo "<br>Где ищем (запрос, который набрал пользователь): ".$uri;
				echo "<br>Что ищем (совпадение из правила): ".$uriPattern;
				echo "<br>Кто обрабатывает: ".$path; */

				// Получаем внутренний путь из внешнего согласно правилу.

				$internalRoute = preg_replace("~$uriPattern~", $path, $uri);

/*				echo '<br>Нужно сформулировать: '.$internalRoute.'<br>'; */

				$segments = explode('/', $internalRoute);

				$controllerName = array_shift($segments).'Controller';//имя контроллера
				$controllerName = ucfirst($controllerName);//с большой буквы контроллер


				$actionName = 'action'.ucfirst(array_shift($segments));//имя екшена(метода)

				//подключаем файл класса-контроллера
				$parameters = $segments;


				$controllerFile = ROOT . '/controllers/'.$controllerName.'.php';
				if (file_exists($controllerFile)) {
					include_once($controllerFile);
				}

				$controllerObject = new $controllerName;
				/*$result = $controllerObject->$actionName($parameters); - OLD VERSION */
				/*$result = call_user_func(array($controllerObject, $actionName), $parameters);*/
				$result = call_user_func_array(array($controllerObject, $actionName), $parameters);
				
				if ($result != null) {
					break;
				}
			}

		}
	}
}