<?php

defined('ACCESS') or die('Direct access not allowed!');

class CAutoLoad
{
	private $class_list;

	function __construct(&$class_array)
	{
		$this->class_list = $class_array;
		spl_autoload_register(array($this, 'autoload'));
	}
	
	private function autoload($classname)
	{
		require_once $this->class_list[$classname];
	}
};

?>