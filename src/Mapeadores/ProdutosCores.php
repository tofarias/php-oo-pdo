<?php

namespace Mapeadores;

use Entidades\DadosAntigos;
use Mapeadores\DB\IMigracao;

/**
 * @author Tiago Oliveira de Farias
 */
class ProdutosCores implements IMigracao{

	public function inserir(DadosAntigos $pc)
	{
		$produtosCores = $pc->buscar();
	
		foreach ($produtosCores as $id => $produtoCor) {
				
			$stmt = $pc->getPDO()->prepare('INSERT INTO produtos_cores (id, id_cor, id_produto) VALUES (:id, :id_cor, :id_produto);');
	
			$stmt->bindValue(':id', ($id+1) );
			$stmt->bindValue(':id_cor', $produtoCor->getIdCor() );
			$stmt->bindValue(':id_produto', $produtoCor->getIdProduto() );
				
			$stmt->execute();
		}
	
		return true;
	}
	
}