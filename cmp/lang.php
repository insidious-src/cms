<?php

defined('ACCESS') or die('Direct access not allowed!');

class CLang extends CString
{
	function __construct(&$content)
	{
		parent::__construct($content);
	}
};

?>