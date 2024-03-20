<?php

error_reporting(E_ALL ^ E_NOTICE ^ E_DEPRECATED);
define('ACCESS', null);

require 'config.php';
if(!CMS_INSTALLED) header('Location: install/');

require 'lib/autoload.php';
static $classes = array
(
	'CSystem' => 'cmp/system.php',
	'CTemplate' => 'cmp/template.php',
	'CDataBase' => 'lib/database.php',
	'CString' => 'lib/string.php',
	'CCrypt' => 'lib/crypt.php',
	'CCache' => 'lib/cache.php'
);
new CAutoLoad($classes);

$sys = new CSystem(true);

require $cfg['TPL']['tpl_dir'] . 'variables.php';

$tpl_body = $cfg['TPL']['tpl_dir'] . $tpl_nfo['HTML'];
$tpl = new CTemplate($tpl_body);

require $cfg['LANG']['lang_dir'] . $cfg['LANG']['current_lang'] . '.php';
header('Content-Type: text/html; charset=' . $lang['CHARSET']);

$tpl_buffer = $tpl->get_buffer();
$lng = new CString($tpl_buffer);
$lng->replace_all($lang, '%') or die('Failed to set current language!');

$lng_buffer = $lng->get_buffer();
$tpl->set_buffer($lng_buffer);

$tpl->compile($tpl_tags);
$tpl->output();

?>
