<?php

namespace App\Controllers;
use Core\Controller;
/**
* UserController
* PHP Version 7.3.6
*/

class UserController extends Controller
{
	
	private $users;
	
	public function __construct()
	{
		$this->users = [['id' => '001', 'name' => 'James'], ['id' => '002', 'name' => 'Jonas'], ['id' => '003', 'name' => 'Sarah']];
	}
	
	/**
	* Show the user by the specified id
	*
	* @param string $id The id of the user
	* 
	* @return void
	*/
	public function getById(string $id): void
	{
		foreach($this->users as $user){
			if($id === $user['id']){
				$this->render('user', ['user' => $user]);
				return;
			}
		}	
		echo 'Error 404: Page does not exist';
	}
	
	public function getAll()
	{
		$this->render('users', ['users' => $this->users]);
	}
}