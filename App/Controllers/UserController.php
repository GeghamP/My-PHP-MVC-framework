<?php

namespace App\Controllers;

/**
* UserController
* PHP Version 7.3.6
*/

class UserController
{
	
	/**
	* Show the user by the specified id
	*
	* @param string $id The id of the user
	* 
	* @return void
	*/
	public function getById(string $id): void
	{
		echo "User with id ".$id;
	}
}