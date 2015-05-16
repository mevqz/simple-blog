<?php

include 'controllers/Controller.php';
include 'entities/Article.php';

class ArticleController extends Controller {

	private $TAG = "ArticleController";

	public function create() {
		echo "$this->TAG: create()<br>";

		// Valor para el atributo action del form (article/form.php)
		$action = 'save';

		// Valor para el button submit del form (article/form.php)
		$buttonName = 'Salvar';

		// El formulario requiere un objeto Article para extraer los valores
		// aunque se cree uno nuevo
		$article = new Article();

		// incluyo el formulario para crear el Article
		require 'views/article/form.php';
	}

	public function save() {
		echo "$this->TAG: save ()<br>";
		print_r($_POST);
	}

	public function remove($id = NULL) {
		if ($id == NULL) {
			echo "$this->TAG: remove() requiere un Id <br>";
		} else {
			echo "$this->TAG: remove() Id: $id <br>";
		}
	}
        
	public function show($id = NULL) {
		if ($id == NULL) {
			echo "$this->TAG: show() requiere un Id <br>";
		} else {
			echo "$this->TAG: show() Id: $id <br>";
			$article = new Article();
			$article->setId($id);
			$article->setTitle("Foo title");

			require 'views/article/show.php';
		}
	}
    
	public function edit($id = NULL) {
		if ($id == NULL) {
			echo "$this->TAG: edit() requiere un Id <br>";
		} else {
			echo "$this->TAG: edit() Id: $id <br>";
 
 			$article = new Article();
			$article->setId($id);
			$article->setTitle("Foo title");
           
			// Valor para el atributo action del form (article/form.php)
			$action = 'save';
	        
			// Valor para el button submit del form (article/form.php)
			$buttonName = 'Actualizar';

			require 'views/article/form.php';
		}
	}
    
	public function index() {
		echo "$this->TAG: index()<br>";
		$articles = array();
	
		$article = new Article();
		$article->setId(1);
		$article->setTitle("Foo title");
		$articles[] = $article;           
           
		$article = new Article();
		$article->setId(2);
		$article->setTitle("Bar title");
		$articles[] = $article;           
           
		$article = new Article();
		$article->setId(3);
		$article->setTitle("Asd title");
		$articles[] = $article;           
  
		require 'views/article/index.php';
	}
    
}

