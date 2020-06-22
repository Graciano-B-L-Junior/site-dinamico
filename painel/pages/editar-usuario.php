<div class="content">
	<h2>Editar usuário</h2>

	<form method="post" enctype="multipart/form-data">

		<?php
			if(isset($_POST['acao'])){
				
				
				$nome = $_POST['nome'];
				$senha = $_POST['password'];
				$imagem = $_FILES['imagem'];
				$imagem_atual = $_SESSION['img'];

				$usuario = new Usuario();
				if($imagem['name'] != ''){
					if(Painel::imagemValida($imagem)){
						Painel::deleteFile($imagem_atual);
						$imagem = Painel::uploadFile($imagem);
						if($usuario->atualizarUsuario($nome,$senha,$imagem))
						{
							$_SESSION['img'] = $imagem;
							Painel::alert('sucesso','Cadastro realizado com sucesso junto com a imagem');
						}
						else
						{
							Painel::alert('erro','Ocorreu um erro ao atualizar junto com a imagem');
						}
					}
				}else{
					$imagem = Painel::uploadFile($imagem);
					Painel::deleteFile($imagem_atual);
					if($usuario->atualizarUsuario($nome,$senha,$imagem)){
						Painel::aler('sucesso','Cadastro realizado com sucesso');
					}else{
						Painel::aler('erro','Ocorreu um erro ao atualizar');
					}
				}
			}

		?>
		<div class="form-group">
			<label>Nome:</label>
			<input type="text" name="nome" required value="<?php echo $_SESSION['nome'] ?>">
		</div>
		<div class="form-group">
			<label>Senha:</label>
			<input type="password" name="password" required value="<?php echo $_SESSION['password'] ?>">
		</div>
		<div class="form-group">
			<label>Imagem:</label>
			<input type="file" name="imagem" required>
		</div>
		<div class="form-group">
			<input type="submit" name="acao" value="Atualizar">
		</div>
	</form>

</div>