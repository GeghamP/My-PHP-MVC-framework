<?php
spl_autoload_register(function($className){
	$file = dirname(__FILE__). DIRECTORY_SEPARATOR .$className.'.php';
	if(file_exists($file)){
		require_once($file);
	}
	else{
		echo 'Error 404: File does not exist';
	}
});