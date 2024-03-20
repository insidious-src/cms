<?php

defined('ACCESS') or die('Direct access not allowed!');

class CSystem
{
	private $debug, $starttime;

	function __construct($debug = false)
	{
		if($debug) $this->starttime = microtime(true);
		$this->debug = $debug;
	}

	function __destruct()
	{
		if($this->debug)
			echo '<div class="debug">[Script Execution Time: ', $this->endtime(), ' sec]</div>';
	}

	private function endtime()
	{
		return microtime(true) - $this->starttime;
	}
};

?>
