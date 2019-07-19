<?php
	
	//verificar se arquivo existe
	if(file_exists("verificalogin.php") )
		include "verificalogin.php";
	else
		include"../verificalogin.php";
	?>
	
	<div class="container ">
		<div class="coluna ">
			<h1 class="text-center">Listagem de tipo de Quadrinhos 
			<a href="cadastros/tipo-quadrinho" class="btn btn-success   ">
			<i class="fas fa-file"></i>  Novo
			</a>
			</h1>

			<table class="table table-hover table-striped table-bordered">
				<thead>
					<tr>
						<td width="10%">ID</td>
						<td width="60%">Tipo de Quadrinho</td>
						<td>Opções</td>
					</tr>
				</thead>
				<tbody>
					<?php
					//selecionar os dados do tipo 
					$sql = "select * from tipo order by tipo";
					$consulta =$pdo->prepare($sql);
					$consulta->execute();
					//laço de repetição para separa as linhas
					while ($linha = $consulta->fetch(PDO::FETCH_OBJ) ) {
						//separar os dados 
						$id 	 = $linha->id;
						$tipo 	 = $linha->tipo;
						//montar as linhas e colunas da tabela

						echo"<tr>
								<td>$id</td>
								<td>$tipo</td>
								<td>
								<a href='cadastros/tipo-quadrinho/$id'class='btn btn-success'>
								<i class='fas fa-edit'></i>
								</a>	
								<a href='javascript:excluir($id)' class='btn btn-danger'>
								<i class='fas fa-trash'></i>
								</a>
								

								</td>
							</tr>";

					}
					?>
				</tbody>
			</table>
			
		</div>
		
	</div>
	<script type="text/javascript">
		//funcao em javascript para perguntar se quer mesmo excluir 
		function excluir(id) {
			//perguntar
			if( confirm("deseja mesmo excluir? Tem certeza?") ){
				//chamar a tela de exclusão
				location.href = "excluir/tipo-quadrinho/"+id;
			}		}
	</script>