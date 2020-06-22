<?php include('config.php');?>
<?php include('./classes/Site.php');
?>
<?php Site::updateUsuarioOnline();?>
<?php Site::contador();?>
<!DOCTYPE html>
<html>
<head>
	<title>Projeto 01</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="<?php echo INCLUDE_PATH;?>css/style.css">
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
	<link href="<?php echo INCLUDE_PATH;?>css/all.css" rel="stylesheet">
</head>
<body>
	<?php
		$url = isset($_GET['url'])? $_GET['url'] : 'home';
		switch ($url) {
			case 'sobre':
				echo '<target target="sobre" />';
				break;

			case 'servico':
				echo '<target target="servico" />';
				break;	
			
		}
	?>

	<header>
		<div class="center">
		<div class="logo left">Logomarca</div>
		<div class="desktop right">
			<ul>
				<li><a href="<?php echo INCLUDE_PATH;?>">Home</a></li>
				<li><a href="<?php echo INCLUDE_PATH;?>sobre">Sobre</a></li>
				<li><a href="<?php echo INCLUDE_PATH;?>servico">Serviços</a></li>
				<li><a href="<?php echo INCLUDE_PATH;?>contato">Contato</a></li>
			</ul>
		</div><!--desktop-->
		<div class="mobile right">
			<div class="botao-menu-mobile">
				<i class="fas fa-bars"></i>
			</div>
			<ul>
				<li><a href="<?php echo INCLUDE_PATH;?>">Home</a></li>
				<li><a href="<?php echo INCLUDE_PATH;?>sobre">Sobre</a></li>
				<li><a href="<?php echo INCLUDE_PATH;?>servico">Serviços</a></li>
				<li><a href="<?php echo INCLUDE_PATH;?>contato">Contato</a></li>
			</ul>
		</div><!--mobile-->
		<div class="clear"></div>
	</div><!--center-->
	</header>

	<?php
		

		if(file_exists('pages/'.$url.'.php')){
			include('pages/'.$url.'.php');
		}else{
			if($url !='sobre' && $url !='servico'){
				$pagina404 = true;
				include('pages/404.php');
			}else{
				include('pages/home.php');
			}
			
		}

	?>
	<footer <?php if(isset($pagina404) && $pagina404 == true) echo 'class="fixed"';?>>
		<div class="center">
			<p>Todos os direitos reservados</p>
		</div><!--center-->
	</footer>

	<script src="<?php echo INCLUDE_PATH;?>js/jquery.js"></script>
	<script src="<?php echo INCLUDE_PATH;?>js/scripts.js"></script>
	<?php
		if($url=='home' || $url ==''){
	?>
	<script src="<?php  echo INCLUDE_PATH;?>js/slider.js"></script>
	<?php } ?>
	<?php
		if($url=='contato'){
	?>
	<script src='https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyDHPNQxozOzQSZ-djvWGOBUsHkBUoT_qH4'></script>
	<!--<script src="<?php echo INCLUDE_PATH;?>js/map.js"></script>-->
	<?php }?>
</body>
</html>