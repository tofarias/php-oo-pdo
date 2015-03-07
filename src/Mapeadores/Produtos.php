<?php

namespace Mapeadores;

use Entidades\DadosAntigos;
use Mapeadores\DB\IMigracao;

/**
 * @author Tiago Oliveira de Farias
 */
class Produtos implements IMigracao{

	public function inserir(DadosAntigos $pa)
	{
		$produtosAntigos = $pa->buscar();
	
		foreach ($produtosAntigos as $id => $produtoAntigo) {
				
			$stmt = $pa->getPDO()->prepare('INSERT INTO Produtos (id, titulo, codigo) VALUES (:id, :titulo, :codigo);');
	
			$stmt->bindValue(':id', ($id+1) );
			$stmt->bindValue(':titulo', $produtoAntigo->getTitulo() );
			$stmt->bindValue(':codigo', $produtoAntigo->getCodigo() );
				
			$stmt->execute();
		}
	
		return true;
	}
	
}