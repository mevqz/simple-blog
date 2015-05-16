<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title></title>
	</head>
	<body>
	<?php
		// Obtengo la URI solicitada en la query string para poder
		// rutear la request al controller correspondiente 
		$url = (isset($_GET['url']) ?  $_GET['url'] : null);

		// Remuevo el ultimo '/' al final de la cadena si que existe para evitar
		// que posteriormente explode() genere un elemento vacio al final del array
		$url = rtrim($url, '/');

		$url = explode('/', $url);
            
		// Si no se solicito ninguna URI en particular se muestra el index
		if (!isset($url[0]) || empty($url[0])) {
			require 'views/index.html';
			exit;
		}
           
		// ucfirst() es necesario para capitalizar el primer char de $url[0],
		// Sistemas *NIX son case sensitive
		$controllerClass = ucfirst($url[0]) . "Controller";
		$pathToController = "controllers/$controllerClass.php";
		if (!file_exists($pathToController)) {
			echo "Error: Controller is missing.";
			exit;
		}

		include $pathToController;
		$controller = new $controllerClass; 
            
		// TODO deberia poder pasar varargs a los actions
		// note: url[0] -> controller ; url[1] -> action ; url[2] -> arg(s)
		// FIXME verificar que el action exista en el controller antes de invocarlo
		if (isset($url[2])) {
			$controller->{$url[1]}($url[2]);
		} else {

			// Si se especifico un controller#action sin args
			if (isset($url[1])) {
				$controller->{$url[1]}();
				
				// Si la URI solicitada no especifico controller 
			} else {
				$controller->index();
			}
		} 
		?>
	</body>
</html>
