<?php

namespace Mapeadores;

use Entidades\DadosAntigos;
use Entidades\Tamanhos;
use Entidades\Cores;

/**
 * @author Tiago Oliveira de Farias
 */
class CoresAntigas extends DadosAntigos{
	
	public function __construct(\PDO $pdo)
	{
		parent::__construct($pdo);
	}
	
	public function buscar()
	{
		$stmt = $this->pdo->prepare('select distinct codigo, cor from ' .self::TABELA. ' group by codigo, cor;');
		$stmt->execute();
	
		$cores = Array();
		while($data = $stmt->fetch()) {
	
			$cores[] = new Cores( $data->cor );
		}
	
		return $cores;
	}
}