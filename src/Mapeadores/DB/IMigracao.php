<?php

namespace Mapeadores\DB;

use Entidades\DadosAntigos;

/**
 * @author Tiago Oliveira de Farias
 */
interface IMigracao{
	
	public function inserir(DadosAntigos $dadosAntigos);
}