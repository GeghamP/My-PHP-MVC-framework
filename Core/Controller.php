<?php

namespace Core;
use Twig\Loader\FilesystemLoader;
use Twig\Environment;
/**
* Abstract Controller
* PHP Version 7.3.6
*/


abstract class Controller
{
	
	/**
	* Renders the view 
	* @param string $view The name of the view
	*
	* @return void
	*/
	public function render(string $view, array $data = []): void
	{
		$file = $view.'.php';
		//extract($data, EXTR_SKIP);
		if(file_exists('../App/Views/'.$file)){
			$loader = new FilesystemLoader('../App/Views');
			$twig = new Environment($loader);
			echo $twig->render($file, $data);
		}
		else{
			header('Location: /web/errors/error404.php');
		}
	}
	
}