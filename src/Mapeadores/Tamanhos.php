<?php

namespace Mapeadores;

use Entidades\DadosAntigos;
use Mapeadores\DB\IMigracao;

/**
 * @author Tiago Oliveira de Farias
 */
class Tamanhos implements IMigracao{

	public function inserir(DadosAntigos $ta)
	{
		$tamanhosAntigos = $ta->buscar();
	
		foreach ($tamanhosAntigos as $id => $tamanhoAntigo) {
				
			$stmt = $ta->getPDO()->prepare('INSERT INTO tamanhos (id, titulo) VALUES (:id, :titulo);');
	
			$stmt->bindValue(':id', ($id+1) );
			$stmt->bindValue(':titulo', $tamanhoAntigo->getTitulo() );
				
			$stmt->execute();
		}
	
		return true;
	}
	
}