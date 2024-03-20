<?php

defined('ACCESS') or die('Direct access not allowed!');

class CDataBase
{
	private $link;
	
	function __construct(&$host, &$user, &$pass, $dbname = null)
	{
		$this->connect($host, $user, $pass) or die(mysql_error());
		if($dbname) $this->select_db($dbname) or die(mysql_error($this->link));
	}
	
	function __destruct()
	{
		$this->disconnect();
	}
	
	public function connect(&$host, &$user, &$pass)
	{
		return ($this->link = mysql_connect($host, $user, $pass));
	}
	
	public function disconnect()
	{
		mysql_close($this->link);
	}
	
	public function select_db($dbname)
	{
		return mysql_select_db($dbname, $this->link);
	}
	
	public function create_db($dbname)
	{
		return mysql_create_db($dbname, $this->link);
	}
	
	public function delete_db($dbname)
	{
		return mysql_drop_db($dbname, $this->link);
	}
	
	public function query($sql)
	{
		return mysql_query($sql, $this->link);
	}
	
	public function fetch_array($query)
	{
		return mysql_fetch_array($query);
	}
	
	public function get_tables()
	{
		return mysql_fetch_assoc($this->query('SHOW TABLES'));
	}
	
	public function tables_opr($tables, $operation)
	{
		foreach ($tables as $index => $name)
			$this->query($operation . ' TABLE \'' . $name . '\'') or die(mysql_error($this->link));
	}
};

?>