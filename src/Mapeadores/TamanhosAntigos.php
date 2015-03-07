<?php

namespace Mapeadores;

use Entidades\DadosAntigos;
use Entidades\Tamanhos;

/**
 * @author Tiago Oliveira de Farias
 */
class TamanhosAntigos extends DadosAntigos{
	
	public function __construct(\PDO $pdo)
	{
		parent::__construct($pdo);
	}
	
	public function buscar()
	{
		$stmt = $this->pdo->prepare('select distinct codigo, tamanho from ' .self::TABELA. ' group by codigo, tamanho;');
		$stmt->execute();
	
		$tamanhosAntigos = Array();
		while($data = $stmt->fetch()) {
	
			$tamanhosAntigos[] = new Tamanhos( $data->tamanho );
		}
	
		return $tamanhosAntigos;
	}
}