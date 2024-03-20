<?php

error_reporting(E_ALL ^ E_NOTICE ^ E_DEPRECATED);

define('ACCESS', null);

require '../config.php';
if(!CMS_INSTALLED) header('Location: ../install/');

?>