<?php
	if(isset($_GET['loggout'])){
		Painel::loggout();
		Painel::redirect();
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Painel de controle</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="<?php echo INCLUDE_PATH_PAINEL;?>css/style.css">
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
	<link href="<?php echo INCLUDE_PATH;?>css/all.css" rel="stylesheet">
</head>
<body>
	<div class="menu">
		<div class="menu-wraper">
			<div class="box-usuario">
					<?php
						if($_SESSION['img'] ==''){
					?>
					<div class="avatar-usuario">
						<i class="fas fa-user"></i>
					</div>
					<?php }else{?>
						<div class="imagem-usuario">
						<img src="<?php echo INCLUDE_PATH_PAINEL ?>uploads/<?php echo $_SESSION['img']; ?>">
					<?php }?>
					<div class="nome-usuario">
						<p><?php echo $_SESSION['nome'];?></p>
						<p><?php echo pegaCargo($_SESSION['cargo']);?></p>
					</div>
				</div>
			</div>
			<div class="items-menu">
				<h2>Cadastro</h2>
				<a <?php selecionadoMenu('cadastrar-depoimento'); ?> href="<?php echo INCLUDE_PATH_PAINEL ?>cadastrar-depoimento">Cadastrar depoimento</a>
				<a <?php selecionadoMenu('cadastrar-servico'); ?> href="">Cadastrar serviço</a>
				<a <?php selecionadoMenu('cadastrar-slide'); ?> href="">Cadastrar slides</a>
				<h2>Gestão</h2>
				<a <?php selecionadoMenu('listar-depoimento'); ?> href="<?php echo INCLUDE_PATH_PAINEL ?>listar-depoimentos">Listar depoimentos</a>
				<a <?php selecionadoMenu('listar-servicos'); ?> href="">Listar serviços</a>
				<a <?php selecionadoMenu('listar-slides'); ?> href="">Listar slides</a>
				<h2>Administração do Painel</h2>
				<a <?php selecionadoMenu('editar-usuario'); ?> href="<?php echo INCLUDE_PATH_PAINEL ?>editar-usuario">Editar Usuário</a>
				<a <?php selecionadoMenu('adicionar-usuário'); ?> <?php verificaPermissaoMenu(2); ?> href="<?php echo INCLUDE_PATH_PAINEL ?>adicionar-usuario">Adicionar Usuário</a>
				<h2>Configuração Geral</h2>
				<a <?php selecionadoMenu('editar-site'); ?> href="">Editar</a>
			</div>
		</div>
		</div>	
		<header>
			<div class="center">
				<div class="menu-btn">
					<i class="fas fa-bars"></i>
				</div>
				<div class="loggout">
					<a href="<?php echo INCLUDE_PATH_PAINEL;?>?loggout"><span>Sair </span><i class="fas fa-window-close"></i></a>
				</div>
			</div>
			<div class="clear"></div>

		</header>
		
			<?php echo Painel::carregarPagina(); ?>;

		
<script src="<?php echo INCLUDE_PATH ?>js/jquery.js"></script>
<script src="<?php echo INCLUDE_PATH_PAINEL ?>js/main.js"></script>
</body>
</html>