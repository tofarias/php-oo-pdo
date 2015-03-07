<?php

ini_set('display_errors', 1);
require_once 'vendor/autoload.php';

use Mapeadores\DB\MySql;
use Mapeadores\ProdutosAntigos;
use Mapeadores\TamanhosAntigos;
use Mapeadores\CoresAntigas;
use Mapeadores\Produtos;
use Mapeadores\Cores;
use Mapeadores\Tamanhos;
use Mapeadores\ProdutosCores;
use Mapeadores\ProdutosCoresAntigas;
use Mapeadores\ProdutosTamanhos;
use Mapeadores\ProdutosTamanhosAntigos;
	
$conn = new MySql('localhost', 3307, 'teste_selecao', 'root', '!@#');
$pdo = $conn->conectar();

try {

	$pdo->beginTransaction();
	
	echo 'Populando a tabela [Produtos]...<br/>';
	$produtos = new Produtos();
	$produtos->inserir( new ProdutosAntigos($pdo) );
	
	echo "<br/>Populando a tabela [Cores]...<br/>";
	$cores = new Cores();
	$cores->inserir( new CoresAntigas($pdo) );
	
	echo "<br/>Populando a tabela [Tamanhos]...<br/>";
	$tamanhos = new Tamanhos();
	$tamanhos->inserir( new TamanhosAntigos($pdo) );
	
	echo "<br/>Populando a tabela [ProdutosCores]...<br/>";
	$produtosCores = new ProdutosCores();
	$produtosCores->inserir( new ProdutosCoresAntigas($pdo) );
	
	echo "<br/>Populando a tabela [ProdutosTamanhos]...<br/>";
	$produtosCores = new ProdutosTamanhos();
	$produtosCores->inserir( new ProdutosTamanhosAntigos($pdo) );

	$pdo->commit();
	
	echo '<br/>Migracao concluida';
	
} catch (\Exception $e) {
	
	$pdo->rollBack();
	echo 'Exception: '.$e->getMessage();
}