<?php 
	verificaPermissaoPagina(2);
	
?>

<div class="content">
	<h2>Adicionar usuario</h2>

	<form method="post" enctype="multipart/form-data">

		<?php
			if(isset($_POST['acao'])){
				$login = $_POST['login'];
				$nome = $_POST['nome'];
				$senha = $_POST['password'];
				$imagem = $_FILES['imagem'];
				$cargo = $_POST['Cargo'];

				if(Usuario::userExist($login)){
					Painel::alert('erro','O login já existe, selecione outro por favor');
				}else{
					$usuario = new Usuario();
					$imagem = Painel::uploadFile($imagem);
					$usuario->cadastrarUsuario($login,$senha,$imagem,$nome,$cargo);
					Painel::alert('sucesso','Cadastro realizado com sucesso');
				}
				
			}
		?>

		<div class="form-group">
			<label>Login:</label>
			<input type="text" name="login" required >
		</div>
		<div class="form-group">
			<label>Nome:</label>
			<input type="text" name="nome" required >
		</div>
		<div class="form-group">
			<label>Senha:</label>
			<input type="password" name="password" required >
		</div>

		<div class="form-group">
			<label>Cargo:</label>
			<select name="Cargo">
				<?php
					foreach (Painel::$cargos as $key => $value) {
						if($key < $_SESSION['cargo']) echo '<option value="'.$key.'">'.$value.'</option>';
					}
				?>
			</select>
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