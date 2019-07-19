<?php
	
	//verificar se arquivo existe
	if(file_exists("verificalogin.php") )
		include "verificalogin.php";
	else
		include"../verificalogin.php";
	//verificar se esta sendo enviadoo id 
	if(isset($p[2])){

		 $id =(int) $p[2];
		/*echo "<pre>";
		var_dump($id);
		var_dump($p);*/

		//verificar se existe um quadrinho com este tipo
		$sql = "select id from quadrinho where tipo_id = ? limit 1";
		$consulta = $pdo->prepare( $sql);
		$consulta->bindParam(1,$id);
		$consulta->execute();

		$dados = $consulta->fetch(PDO::FETCH_OBJ);
		//verificar se trouxe algum id 
		if(isset($dados->id)){
			$msg = "este registro não pode ser excluido pois existe um quadrinho relacionado";
			mensagem($msg);
		}
		//excluir
		$sql = "delete from tipo where id = ? limit 1";
		$consulta = $pdo->prepare($sql);
		$consulta->bindParam(1,$id);

		//verificarse o registro foi excluido 
		if( $consulta->execute()){
			$msg = "Registro excluido com Sucesso";
			mensagem($msg);
		}else{
			$msg = "Erro ao excluir registro";
			mensagem($msg);
		}

	}else{
		$msg = "Ocorreu um erro ao excluir";
		mensagem( $msg); 
	}
	?>