<?php
	session_start();
	define('INCLUDE_PATH', 'http://localhost/pj_01/');
	define('INCLUDE_PATH_PAINEL', INCLUDE_PATH.'painel/');
	define('HOST', 'localhost');
	define('USER', 'root');
	define('PASSWORD','');
	define('DATABASE', 'projeto_01');
	define('BASE_DIR_PAINEL',__DIR__.'/painel');
	define('NOME_EMPRESA', 'Agencia DevCode');

	function pegaCargo($indice){
		
		return Painel::$cargos[$indice];
	}

	function selecionadoMenu($par){
		$url = explode('/',@$_GET['url'])[0];
		if($url == $par){
			echo 'class="menu-active"';
		}
	}

	function verificaPermissaoMenu($permissao){
		if($_SESSION['cargo'] >= $permissao){
			return;
		}else{
			echo 'style="display:none;"';
		}
	}

	function verificaPermissaoPagina($permissao){
		if($_SESSION['cargo'] >= $permissao){
			return;
		}else{
			include('painel/pages/permissao_negada.php');
			die();
		}
	}
?>