<?php

namespace Mapeadores\DB;

/**
 * @author Tiago Oliveira de Farias
 */
interface IConexao {
	
	public function __construct($host, $port, $dbName, $user, $password);
}