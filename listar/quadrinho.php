<?php
	
	//verificar se arquivo existe
	if(file_exists("verificalogin.php") )
		include "verificalogin.php";
	else
		include"../verificalogin.php";
	?>

	<div class="container">
		<div class="coluna pr-5px">
			<h1 class="text-center">Listagem Quadrinho
				<a href="cadastros/editora" class="btn btn-success float-right    ">
			<i class="fas fa-file"></i>  Novo
			</a>
			</h1>
			<table class="table table-hover table-striped table-bordered">
				<thead>
					<tr>
						<td width="10%">ID</td>
						<td width="10%">Capa</td>
						<td width="30%">Título do Quadinho</td>
						<td width="10%">Número</td>
						<td width="15%">Data</td>
						<td width="10%">Valor</td>
						<td>Opções</td>
					</tr>
				</thead>
				<tbody>

					<?php 
						//buscar os quadrinhos 
						$sql = "select id,capa,titulo,numero, date_format(data,'%d/%m/%Y') data,valor from quadrinho order by titulo";
						$consulta = $pdo->prepare($sql);
						$consulta->execute();

						while($dados = $consulta->fetch(PDO::FETCH_OBJ ) ){
							$id 	= $dados->id;
							$titulo	= $dados->titulo;
							$numero	= $dados->numero;
							$capa 	= $dados->capa;
							$data 	= $dados->data;
							$valor 	=$dados->valor;
							//formatar valor 
							$valor = number_format($valor,2,',','.');
							//imagem de capa 
							//1234 -> ../fotos/1234.jpg
							$capa = "../fotos/".$capa."p.jpg";

							echo "<tr>
								 <td>$id</td>
								 <td><img src='$capa' width=80%</td>
								 <td>$titulo</td>
								 <td>$numero</td>
								 <td>$data</td>
								 <td class='text-left'>
								 	R$ $valor</td>
								 <td>
								 <a href='cadastros/quadrinho/$id'class='btn btn-success'>
								<i class='fas fa-edit'></i>
								</a>
								<a href='javascript:excluir($id)'class='btn btn-danger'>
								<i class='fas fa-trash'>
								</i>
								</a>

								 </td>
							</tr>";
						}
					?>

				</tbody>
			</table>
		</div><!-- fim da coluna -->

	</div><!-- fim do container -->

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