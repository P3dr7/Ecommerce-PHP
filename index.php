<?php 

require_once("vendor/autoload.php");

use \Slim\Slim;
use \p3dr7\Page;

$app = new Slim();

$app->config('debug', true);

$app->get('/', function() {
    $page = new Page();
	//chama header
	/*Cria o Elemento*/$page->setTpl('index');
	//chama footer
});

$app->run();

 ?>