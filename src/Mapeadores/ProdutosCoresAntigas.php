<?php

namespace Mapeadores;

use Entidades\DadosAntigos;
use Entidades\ProdutosCores;

/**
 * @author Tiago Oliveira de Farias
 */
class ProdutosCoresAntigas extends DadosAntigos{
	
	public function __construct(\PDO $pdo)
	{
		parent::__construct($pdo);
	}
	
	public function buscar()
	{
		$stmt = $this->pdo->prepare("select distinct c.id as 'id_cor', p.id as 'id_produto' from dados_antigos da 
									 inner join Produtos p on p.codigo = da.codigo 
									 inner join cores c on c.titulo = da.cor;");
		$stmt->execute();
		
		$produtosCores = Array();
		while($data = $stmt->fetch()) {
		
			$produtosCores[] = new ProdutosCores($data->id_cor, $data->id_produto);
		}
		
		return $produtosCores;
	}
}