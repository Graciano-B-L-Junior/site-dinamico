<?php
	
	if($_SERVER['REQUEST_URI'] == "/pj_01/"){
		include('./classes/MySql.php');
	}
	
	
	
	class Site{

		public static function updateUsuarioOnline(){
			if(isset($_SESSION['online'])){
				$token = $_SESSION['online'];
				$horarioAtual = date('Y-m-d H:i:s');
				$check = MySql::concectar()->prepare("SELECT `id` FROM `tb_admin.online` WHERE tolkien = ?");
				$check->execute(array($_SESSION['online']));
				if($check->rowCount() ==1){
					$sql = MySql::concectar()->prepare("UPDATE `tb_admin.online` SET ultima_acao = ? WHERE tolkien = ?");
					$sql->execute(array($horarioAtual,$token));
				}
				else{
					$ip = $_SERVER['REMOTE_ADDR'];
					$token = $_SESSION['online'];
					$horarioAtual = date('Y-m-d H:i:s');
					$sql = MySql::concectar()->prepare("INSERT INTO `tb_admin.online` VALUES (null,?,?,?)");
					$sql->execute(array($ip,$horarioAtual,$token));
				}
				


			}else{
				$_SESSION['online'] = uniqid();
				$ip = $_SERVER['REMOTE_ADDR'];
				$token = $_SESSION['online'];
				$horarioAtual = date('Y-m-d H:i:s');
				$sql = MySql::concectar()->prepare("INSERT INTO `tb_admin.online` VALUES (null,?,?,?)");
				$sql->execute(array($ip,$horarioAtual,$token));
			}
		}
			public static function contador(){
				if(!isset($_COOKIE['visita'])){
					setcookie('visita','true',time() + 60*60*24*7);
					$sql = MySql::concectar()->prepare("INSERT INTO `tb_admin.visitas` VALUES(null,?,?)");
					$sql->execute(array($_SERVER['REMOTE_ADDR'],date('Y-m-d')));
				}
			}

		}
?>