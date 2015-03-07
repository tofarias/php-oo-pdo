<?php

namespace Entidades;

use Mapeadores\DB\ISql;

/**
 * @author Tiago Oliveira de Farias
 */
class Cores {
	
	private $titulo;
	
	public function __construct($titulo)
	{
		$this->titulo = is_null($titulo) ? null : trim($titulo);
	}
	
	public function getTitulo()
	{
		return $this->titulo;
	}
	
}