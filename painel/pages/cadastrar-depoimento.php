<div class="content">
	<h2>Adicionar depoimentos</h2>

	<form method="post" enctype="multipart/form-data">

		<?php
			if(isset($_POST['acao'])){
				if(Painel::insert($_POST)){
					Painel::alert('sucesso','Cadastro realizado com sucesso');
				}else{
					Painel::alert('erro','Ocorreu um erro ao cadastrar');
				}

				

			}
		?>

		<div class="form-group">
			<label>Nome:</label>
			<input type="text" name="nome" required >
		</div>
		<div class="form-group">
			<label>Depoimento:</label>
			<textarea name="depoimento"></textarea>
		</div>

		<div class="form-group">
			<label>Data:</label>
			<input type="text" name="data">
		</div>
		
		<div class="form-group">
			<input type="hidden" name="nome_tabela" value="tb_site">
			<input type="submit" name="acao" value="Atualizar">
		</div>
	</form>

</div>

