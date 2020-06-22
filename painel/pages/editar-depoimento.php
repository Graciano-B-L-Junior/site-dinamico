<?php
	if(isset($_GET['id'])){
		$id= (int)$_GET['id'];
		$depoimento = Painel::select('tb_site','id=?',array($id));
	}else{
		Painel::alert('sucesso','Depoimento editado com sucesso');
		die();
	}

?>
<div class="content">
	<h2>Editar depoimento</h2>

	<form method="post" enctype="multipart/form-data">

		<?php
			if(isset($_POST['acao'])){
				if(Painel::update($_POST)){
					Painel::alert('sucesso','Depoimento editado com sucesso');
					$depoimento = Painel::select('tb_site','id=?',array($id));
				}else{
					Painel::alert('sucesso','Campos vazios não são permitidos');
				}
				
			}
		?>

		<div class="form-group">
			<label>Nome:</label>
			<input type="text" name="nome" value="<?php echo $depoimento['nome'];?>" >
		</div>
		<div class="form-group">
			<label>Depoimento:</label>
			<textarea name="depoimento"><?php echo $depoimento['depoimento'];?></textarea>
		</div>

		<div class="form-group">
			<label>Data:</label>
			<input type="text" name="data" value="<?php echo $depoimento['data'];?>">
		</div>
		
		<div class="form-group">
			<input type="hidden" name="id" value="<?php echo $depoimento['id'];?>">
			<input type="hidden" name="nome_tabela" value="tb_site">
			<input type="submit" name="acao" value="Atualizar">
		</div>
	</form>

</div>

