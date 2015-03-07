<?php

namespace Entidades;

/**
 * @author Tiago Oliveira de Farias
 */
class ProdutosTamanhos {
	
	private $idProdutoCor;
	private $idTamanho;
	
	public function __construct($idProdutoCor, $idTamanho)
	{
		$this->idProdutoCor = is_null($idProdutoCor) ? null : trim($idProdutoCor);
		$this->idTamanho = is_null($idTamanho) ? null : trim($idTamanho);
	}
	
	public function getIdProdutoCor()
	{
		return $this->idProdutoCor;
	}
	
	public function getIdTamanho()
	{
		return $this->idTamanho;
	}
}