<?php

error_reporting(E_ALL ^ E_NOTICE ^ E_DEPRECATED);

define('ACCESS', null);

require '../config.php';
if(!CMS_INSTALLED) header('Location: ../install/');

require '../lib/autoload.php';
static $classes = array
(
	'CSystem' => '../cmp/system.php',
	'CTemplate' => '../cmp/template.php',
	'CDataBase' => '../lib/database.php',
	'CString' => '../lib/string.php',
	'CCrypt' => '../lib/crypt.php',
	'CCache' => '../lib/cache.php'
);
new CAutoLoad($classes);

$sys = new CSystem(false);

require $cfg['TPL']['tpl_dir'] . 'variables.php';
$tpl_idx_path = $cfg['TPL']['tpl_dir'] . $tpl_nfo['INDEX'];
$tpl = new CTemplate($tpl_idx_path);

$tpl->compile($tpl_idx_tags);
$tpl->output();

?>
