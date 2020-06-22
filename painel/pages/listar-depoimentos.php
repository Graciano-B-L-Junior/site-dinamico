<?php
	if(isset($_GET['excluir'])){
		$idExcluir = intval($_GET['excluir']);
		Painel::deletar('tb_site',$idExcluir);
		Painel::redirect(INCLUDE_PATH_PAINEL.'listar-depoimentos');
	}

	$paginaAtual = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
	$porPagina=2;
	$depoimentos = Painel::selectAll('tb_site',($paginaAtual-1)*$porPagina,$porPagina*$paginaAtual);
	

?>

<div class="content">
	<h2>Depoimentos cadastrados</h2>

	<table>
		<tr>
			<td>Nome</td>
			<td>Data</td>
			<td>#</td>
			<td>#</td>
			<td>#</td>
			<td>#</td>
		</tr>

		<?php foreach ($depoimentos as $key => $value) {
			# code...
		?>
		<tr>
			<td><?php echo $value['nome']?></td>
			<td><?php echo $value['data']?></td>
			<td><a class="btn-edit" href="<?php echo INCLUDE_PATH_PAINEL ?>editar-depoimento?id=<?php echo 
			$value['id']?>">Editar</a></td>
			<td><a class="btn-delete" href="<?php echo INCLUDE_PATH_PAINEL?>listar-depoimentos?excluir=<?php echo $value['id'];?>">Excluir</a></td>
			<td><a class="btn order" href="<?php echo INCLUDE_PATH_PAINEL?>listar-depoimentos?order=up&id=<?php echo $value['id'];?>">sobe</a></td>
			<td><a class="btn order" href="<?php echo INCLUDE_PATH_PAINEL?>listar-depoimentos?order=down&id=<?php echo $value['id'];?>">desce</a></td>
		</tr>
		<?php } ?>
	</table>

	<div class="paginacao">
		<?php 

			$totalPaginas = ceil(count(Painel::selectAll('tb_site')) / $porPagina );

			for ($i=1;  $i <= $totalPaginas  ; $i++) { 
				# code...
				if($i== $paginaAtual){
					echo '<a class="page-selected href="'.INCLUDE_PATH_PAINEL.'listar-depoimentos?pagina='.$i.'">'.$i.'</a>';
				}else{
					echo '<a href="'.INCLUDE_PATH_PAINEL.'listar-depoimentos?pagina='.$i.'">'.$i.'</a>';
				}
			}

		?>
	</div>
</div>

