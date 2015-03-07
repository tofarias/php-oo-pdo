<?php

namespace Mapeadores;

use Mapeadores\DB\ISql;
use Entidades\DadosAntigos;
use Entidades\ProdutosTamanhos;

/**
 * @author Tiago Oliveira de Farias
 */
class ProdutosTamanhosAntigos extends DadosAntigos{

	public function __construct(\PDO $pdo)
	{
		parent::__construct($pdo);
	}
	
	public function buscar()
	{
		$stmt = $this->pdo->prepare("select pc.id as 'id_produto_cor', t.id as 'id_tamanho' from dados_antigos da
									 inner join Produtos p on p.codigo = da.codigo
									 inner join cores c on c.titulo = da.cor
									 inner join produtos_cores pc on (pc.id_cor = c.id and pc.id_produto = pc.id_produto)
									 inner join tamanhos t on t.titulo = da.tamanho;");
		$stmt->execute();
		
		$produtosTamanhos = Array();
		while($data = $stmt->fetch()) {
			
			$produtosTamanhos[] = new ProdutosTamanhos($data->id_produto_cor, $data->id_tamanho);
		}
		
		return $produtosTamanhos;
	}
	
}