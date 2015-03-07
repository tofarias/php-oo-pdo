<?php

namespace Entidades;

/**
 * @author Tiago Oliveira de Farias
 */
abstract class DadosAntigos {
	
	const TABELA = 'dados_antigos';
	
	protected $pdo;
	
	public function __construct(\PDO $pdo)
	{
		$this->pdo = $pdo;
	}
	
	/**
	 * @return \PDO
	 */
	public function getPDO()
	{
		return $this->pdo;
	}
	
	abstract public function buscar();
	
}