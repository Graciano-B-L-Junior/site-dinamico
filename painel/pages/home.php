<?php
	$usuariosOnline = Painel::listarUsuariosOnline();

	$pegarVisitasTotais = MySql::concectar()->prepare("SELECT * FROM `tb_admin.visitas`");
	$pegarVisitasTotais->execute();
	$pegarVisitasTotais = $pegarVisitasTotais->rowCount();

	$pegarVisitasHoje = MySql::concectar()->prepare("SELECT * FROM `tb_admin.visitas` WHERE dia = ?");
	$pegarVisitasHoje->execute(array(date('Y-m-d')));
	$pegarVisitasHoje = $pegarVisitasHoje->rowCount();
?>
<div class="content">
	<p>Painel de controle</p>
	<div class="box-content w33">
		<p>Usuarios online</p>
		<p><?php echo count($usuariosOnline);?></p>
	</div>

	<div class="box-content w33">
		<p>Total de visitas</p>
		<p><?php echo $pegarVisitasTotais; ?></p>
	</div>
		
	<div class="box-content w33">
		<p>Visitas hoje</p>
		<p><?php echo $pegarVisitasHoje; ?></p>
	</div>
</div>

<div class="content">
	<p>Usuarios online</p>
	<div class="table-responsive">
		<div class="row">
			<div class="col">
				<span>IP</span>
			</div><!--col-->
			<div class="col">
				<span>Ultima ação</span>
			</div><!--col-->
			<div class="clear"></div>
		</div><!--row-->
			<?php foreach ($usuariosOnline as $key => $value) {
				# code...
			?>
		<div class="row">
			<div class="col">
				<span><?php echo $value['ip'];?></span>
			</div><!--col-->
			<div class="col">
				<span><?php echo date('d/m/Y H:i:s',strtotime($value['ultima_acao']));?></span>
			</div><!--col-->
			<div class="clear"></div>
		</div><!--row-->
	<?php } ?>
	</div>
</div>

<div class="content">
	<p>Usuarios do painel</p>
	<div class="table-responsive">
		<div class="row">
			<div class="col">
				<span>Nome</span>
			</div><!--col-->
			<div class="col">
				<span>Cargo</span>
			</div><!--col-->
			<div class="clear"></div>
		</div><!--row-->
			<?php 
			$usuariosPainel = MySql::concectar()->prepare("SELECT * FROM `tb_admin.usuarios`");
			$usuariosPainel->execute();
			$usuariosPainel = $usuariosPainel->fetchAll();
			foreach ($usuariosPainel as $key => $value) {
				# code...
			?>
		<div class="row">
			<div class="col">
				<span><?php echo $value['user'];?></span>
			</div><!--col-->
			<div class="col">
				<span><?php echo pegaCargo($value['cargo']);?></span>
			</div><!--col-->
			<div class="clear"></div>
		</div><!--row-->
	<?php } ?>
	</div>
</div>
