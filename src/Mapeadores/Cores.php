<?php

namespace Mapeadores;

use Entidades\DadosAntigos;
use Mapeadores\DB\IMigracao;

/**
 * @author Tiago Oliveira de Farias
 */
class Cores implements IMigracao{

	public function inserir(DadosAntigos $ca)
	{
		$coresAntigas = $ca->buscar();
	
		foreach ($coresAntigas as $id => $corAntiga) {
				
			$stmt = $ca->getPDO()->prepare('INSERT INTO cores (id, titulo) VALUES (:id, :titulo);');
	
			$stmt->bindValue(':id', ($id+1) );
			$stmt->bindValue(':titulo', $corAntiga->getTitulo() );
				
			$stmt->execute();
		}
	
		return true;
	}
	
}