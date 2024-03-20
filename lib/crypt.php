<?php

defined('ACCESS') or die('Direct access not allowed!');

class CCrypt
{
	private $key, $cycles;

	function __construct($key = 0, $cycles = 1)
	{
		$this->key = $key;
		$this->cycles = $cycles;
	}
	
	static public function make_key($charnum = 32)
	{
		static $symbols = './ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
		$key = null;
		$i = 0;
		
		while($i < $charnum)
		{
			$key .= substr($symbols, mt_rand(0, 63), 1);
			++$i;
		}
		return $key;
	}
	
	public function encrypt($input, $algo = 'sha512')
	{
		$i = 0;
		
		while($i < $this->cycles)
		{
			$len = strlen($input);
			
			if($len % 2) ++$len;
			$len = ($len / 2) + 1;
			$hashcut = substr($input, 0, $len);
			$input = hash($algo, $hashcut . hash($algo, $this->key) . $input);
			++$i;
		}
		return $input;
	}
	
	public function compare($input, $hash, $algo = 'sha512')
	{
		return $hash === $this->encrypt($input, $algo);
	}
};

?>
