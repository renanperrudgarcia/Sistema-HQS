<?php
	
	//verificar se arquivo existe
	if(file_exists("verificalogin.php") )
		include "verificalogin.php";
	else
		include"../verificalogin.php";
	$id=$nome=$site='';
	if(isset($p[2])){
		$sql = "select *  from editora where id= ? limit 1";
		$consulta = $pdo->prepare($sql);
		$consulta->bindParam(1,$p[2]);
		$consulta->execute();

		$dados = $consulta->fetch(PDO::FETCH_OBJ);
		$id 	=	$dados->id;
		$nome 	=	$dados->nome;
		$site 	=	$dados->site;
	}
	?>
	<div class="container">
		<div class="coluna">
			<h1 class="float-left"> Cadastro de Editora</h1>
			<div class="float-right">
			<a href="cadastros/editora" class="btn btn-success">
			<i class="fas fa-file"></i>  Novo
			</a>
			<a href="listar/editora" class="btn btn-info">
			<i class="fas fa-search"></i>  Listar
			</a>
		</div>
		<div class="clearfix"></div>
		
		<form name="cadastro" method="post" action="salvar/editora" data-parsley-validate>
			<label for="id" >ID</label>
			<input type="text" name="id" class="form-control" readonly value="<?=$id;?>">
			<label for="nome">Nome</label>
			<input type="text" name="nome" required class="form-control" data-parsley-required-message="<i class='fas fa-info-circle'></i> Prencha este Campo" value="<?=$nome;?>">
			<label for="site">Site</label>
			<input type="text" name="site" required class="form-control" data-parsley-required-message="<i class='fas fa-info-circle'></i> Prencha este Campo" value="<?=$site;?>">
			<br>
			<button type="submit" class="btn btn-success">
				<i class="fas fa-check"></i>Gravar
			</button>
		</form>

		</div>
		
	</div>
