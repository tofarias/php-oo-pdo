<?php

namespace Mapeadores;

use Entidades\DadosAntigos;
use Mapeadores\DB\IMigracao;

/**
 * @author Tiago Oliveira de Farias
 */
class ProdutosTamanhos implements IMigracao{

	public function inserir(DadosAntigos $pc)
	{
		$produtosTamanhos = $pc->buscar();
	
		foreach ($produtosTamanhos as $id => $produtoTamanho) {
				
			$stmt = $pc->getPDO()->prepare('INSERT INTO produtos_tamanhos (id, id_produto_cor, id_tamanho) VALUES (:id, :id_produto_cor, :id_tamanho);');
	
			$stmt->bindValue(':id', ($id+1) );
			$stmt->bindValue(':id_produto_cor', $produtoTamanho->getIdProdutoCor() );
			$stmt->bindValue(':id_tamanho', $produtoTamanho->getIdTamanho() );
				
			$stmt->execute();
		}
	
		return true;
	}
	
}