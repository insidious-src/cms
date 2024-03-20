<?php

defined('ACCESS') or die('Direct access not allowed!');

define('CMS_INSTALLED', true);

// System variables
static $cfg = array
(
	'DB' => array
	(
		'host' => '127.0.0.1',
		'user' => 'root',
		'pass' => '1$#5x&8Lu$^^r-dOcY*@]K)[X@in-',
		'dbname' => 'cms'
	),
	'TPL' => array
	(
		'tpl_dir' => 'tpl/default/'
	),
	'LANG' => array
	(
		'lang_dir' => 'lang/',
		'current_lang' => 'en'
	)
);

?>
