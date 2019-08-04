<?php

namespace App\Controllers;

use Core\Controller;
/**
* MainController
* PHP Version 7.3.6
*/

class MainController extends Controller
{
	
	/**
	* Show the main index page
	*
	* @return void
	*/
	public function index(): void
	{
		$this->render('home');
	}
}