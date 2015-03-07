<?php

namespace Entidades;

/**
 * @author Tiago Oliveira de Farias
 */
class ProdutosCores {
	
	private $id;
	private $idCor;
	private $idProduto;
	
	public function __construct($idCor, $idProduto)
	{
		$this->idCor = is_null($idCor) ? null : trim($idCor);
		$this->idProduto = is_null($idProduto) ? null : trim($idProduto);
	}
	
	public function getIdCor()
	{
		return $this->idCor;
	}
	
	public function getIdProduto()
	{
		return $this->idProduto;
	}
}