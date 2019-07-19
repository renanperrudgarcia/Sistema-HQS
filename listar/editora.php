<?php
	
	//verificar se arquivo existe
	if(file_exists("verificalogin.php") )
		include "verificalogin.php";
	else
		include"../verificalogin.php";
	?>
	<div class="container">
		<div class="coluna pr-5px">
			<h1 class="text-center">Listagem Editora
				<a href="cadastros/editora" class="btn btn-success float-right    ">
			<i class="fas fa-file"></i>  Novo
			</a>
			</h1>
			<table class="table table-hover table-striped table-bordered">
				<thead>
					<tr>
						<td width="5%">ID</td>
						<td width="30%">Nome</td>
						<td width="40%">Site</td>
						<td>Opções</td>
					</tr>
				</thead>
				<tbody>
					<?php
					$sql = "select * from Editora order by nome";
					$consulta =$pdo->prepare( $sql);
					$consulta->execute();
					while($linha = $consulta->fetch(PDO::FETCH_OBJ)){
						$id 	= $linha->id;
						$nome 	= $linha->nome;
						$site	= $linha->site;
						echo "<tr>
								<td>$id</td>
								<td>$nome</td>
								<td>$site</td>
								<td>
								<a href='cadastros/editora/$id'class='btn btn-success'>
								<i class='fas fa-edit'></i>
								</a>
								<a href='javascript:excluir($id)'class='btn btn-danger'>
								<i class='fas fa-trash'>
								</i>
								</a>
								</td>
							</tr>
							";
					}

					?>
				</tbody>
			</table>
		</div>
	</div>
	<script type="text/javascript">
		function excluir(id) {
			if(confirm("Deseja mesmo excluir? Tem certeza?")){
				location.href = "excluir/editora/"+id;
			}
		}

		$(document).ready( function () {
    $('.table').DataTable( "language": {
            "lengthMenu": "Display _MENU_ records per page",
            "zeroRecords": "Nothing found - sorry",
            "info": "Showing page _PAGE_ of _PAGES_",
            "infoEmpty": "No records available",
            "infoFiltered": "(filtered from _MAX_ total records)");
} );
	</script>
