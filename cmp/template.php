<?php

defined('ACCESS') or die('Direct access not allowed!');

final class CTemplate extends CString
{
	function __construct(&$tpl_file)
	{
		file_exists($tpl_file) or die('Template file not found!');
		
		$tpl_content = file_get_contents($tpl_file);
		$tpl_content_ref = &$tpl_content;
		
		parent::__construct($tpl_content_ref);
	}
	
	private function module($pos)
	{
		
	}
	
	public function compile(&$tpl_tags)
	{
		return $this->replace_all($tpl_tags, '@', true);
	}
	
	public function output()
	{
		echo $this->get_buffer();
	}
};

?>
