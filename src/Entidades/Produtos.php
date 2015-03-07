<?php

namespace Entidades;

use Mapeadores\ProdutosAntigos;

/**
 * @author Tiago Oliveira de Farias
 */
class Produtos{
	
	private $titulo;
	private $codigo;
	
	public function __construct($titulo, $codigo)
	{
		$this->titulo = is_null($titulo) ? null : trim($titulo);
		$this->codigo = is_null($codigo) ? null : trim($codigo);
	}
	
	public function getTitulo()
	{
		return $this->titulo;		
	}
	
	public function getCodigo()
	{
		return $this->codigo;
	}
}