<?php

defined('ACCESS') or die('Direct access not allowed!');

abstract class CCache
{
	private $cachedir, $cachetime;

	function __construct($content, $cachefile, $cachedir)
	{
		$this->cachedir = $cachedir;
		$cache = $cachedir . $cachefile;
		
		ob_start();
		file_put_contents($cache, $content);
		ob_end_clean();
	}
	
	public function purge()
	{
		
	}
	
	private function calc_hash($file)
	{
		return hash_file('md5', $file);
	}
};

?>