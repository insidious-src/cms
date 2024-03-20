<?php

defined('ACCESS') or die('Direct access not allowed!');

class CString
{
	private $buffer;

	function __construct(&$content)
	{
		$this->buffer = $content;
	}

	public function replace_all(&$values_array, $symbol, $use_files = false)
	{
		if(!sizeof($values_array)) return false;

		foreach($values_array as $idx => $data)
		{
			if($use_files) if(file_exists($data)) $data = file_get_contents($data);
			$this->buffer = str_replace('[' . $symbol . $idx . ']', $data, $this->buffer);
		}
		return true;
	}

	public function get_buffer()
	{
		return $this->buffer;
	}

	public function set_buffer(&$string)
	{
		$old_buffer = $this->buffer;

		if (($this->buffer = $string)) return true;
		$this->buffer = $old_buffer;
		return false;
	}

	public function clear_buffer()
	{
		$this->buffer = null;
	}
};

?>