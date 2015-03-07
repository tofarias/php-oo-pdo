<?php

namespace Mapeadores\DB;

/**
 * @author Tiago Oliveira de Farias
 */
class MySql implements IConexao{
	
	private $host;
	private $port;
	private $dbName;
	private $user;
	private $password;
	private $options;
	
	public function __construct($host, $port, $dbName, $user, $password)
	{
		$this->host 	= trim($host);
		$this->port 	= trim($port);
		$this->dbName 	= trim($dbName);
		$this->user 	= trim($user);
		$this->password = trim($password);
		$this->options	= [\PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'",
						   \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
						   \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_OBJ
						  ];
	}
	
	/**
	 * @return \DB\PDO
	 */
	public function conectar()
	{
		try {

			return new \PDO("mysql:host=$this->host;dbname=$this->dbName", $this->user, $this->password, $this->options);
			
		} catch (\Exception $e) {
			echo 'ERROR: ' . $e->getMessage();
		}
	}
}