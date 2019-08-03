<?php

namespace App\Controllers;

/**
* PostController
* PHP Version 7.3.6
*/

class PostController
{
	
	/**
	* Show the post by the specified category and id
	*
	* @param string $id The id of the user
	* 
	* @return void
	*/
	public function getByCatAndId(string $cat, string $id): void
	{
		echo "Post of the category of $cat with id of $id";
	}
}