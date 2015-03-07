<?php

namespace Mapeadores;

use Entidades\DadosAntigos;
use Entidades\Produtos;

/**
 * @author Tiago Oliveira de Farias
 */
class ProdutosAntigos extends DadosAntigos{
	
	public function __construct(\PDO $pdo)
	{
		parent::__construct($pdo);
	}
	
	public function buscar()
	{
		$stmt = $this->pdo->prepare('select distinct codigo, titulo from ' .self::TABELA. ' group by codigo, titulo;');
		$stmt->execute();
	
		$produtos = Array();
		while($data = $stmt->fetch()) {
	
			$produtos[] = new Produtos($data->titulo, $data->codigo);
		}
		
		return $produtos;
	}
}