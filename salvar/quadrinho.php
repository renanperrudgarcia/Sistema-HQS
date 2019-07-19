<?php
	
	//verificar se arquivo existe
	if(file_exists("verificalogin.php") )
		include "verificalogin.php";
	else
		include"../verificalogin.php";

	/*
	print_r($_POST);
	print_r($_GET);
	print_r($_FILES);
	*/

	//iniciar um transação
	$pdo->beginTransaction();

	//se os dados vieram por POST
	if($_POST){
		//inicar as variaveis 
		$id=$titulo=$resumo=$data=$valor=$numero=$editora_id=$tipo_id=$capa="";

		//recuperar as variaveis 
		foreach ($_POST as $key => $value) {
			//echo"<p>$key $value</P>]
			//$key - nome do campo
			//$value - valor do campo (digitado)
			if(isset($_POST[$key])){
				$$key  = trim($value);
			}
		}
		//formatar o valor 
	 $valor = formataValor($valor);
	
 $data = formataData($data);


	 	//se o id for vazio inserie - se não update!

 	
	if ( empty($id) ) {
		//adicionar um nome de foto de capa 
		$capa = time();
	//insert
	$sql = "insert into quadrinho(id, titulo, numero, valor, resumo, capa, tipo_id, editora_id, data)
			values
			(NULL, :titulo, :numero, :valor, :resumo, :capa, :tipo_id, :editora_id, :data)";

			$consulta = $pdo->prepare($sql);
			$consulta->bindValue(":titulo",$titulo);	
			$consulta->bindValue(":numero",$numero);
			$consulta->bindValue(":valor",$valor);
			$consulta->bindValue(":resumo",$resumo);
			$consulta->bindValue(":capa",$capa);
			$consulta->bindValue(":tipo_id",$tipo_id);
			$consulta->bindValue(":editora_id",$editora_id);
			$consulta->bindValue(":data",$data);
} else{
	//update
	$sql= "update quadrinho set titulo = :titulo,numero = :numero, valor = :valor, resumo = :resumo, capa = :capa, tipo_id = :tipo_id, editora_id = :editora_id, data = :data where id = id limit 1 ";
			$consulta = $pdo->prepare($sql);
			$consulta->bindValue(":titulo",$titulo);	
			$consulta->bindValue(":numero",$numero);
			$consulta->bindValue(":valor",$valor);
			$consulta->bindValue(":resumo",$resumo);
			$consulta->bindValue(":capa",$capa);
			$consulta->bindValue(":tipo_id",$tipo_id);
			$consulta->bindValue(":editora_id",$editora_id);
			$consulta->bindValue(":data",$data);
			$consulta->bindValue(":id", $id);

}
 	//executar
 	if($consulta->execute() ){

 		//se a capa não estiver vazio - copiar 
 		if (!empty ( $_FILES["capa"]["name"])){

 		//copiar o arquivo para a pasta 
 		if( !copy($_FILES["capa"]["tmp_name"],"../fotos/".$_FILES["capa"]["name"])){
	 			$msg= "Erro ao copiar foto ";
	 			mensagem($msg);
	 		}

	 		echo $capa;
	 		$pastaFotos = "../fotos/";
	 		$imagem = $_FILES["capa"]["name"];
	 		redimensionarImagem($pastaFotos, $imagem,$capa);
	 		}
 		//salvar no banco 
 		$pdo->commit();
 		$msg = "Registro inserido com sucesso!";
 		sucesso($msg,"listar/quadrinho");
 	}else{
 		$msg = "Erro ao salvar quadrinho";
 		mensagem($msg);
 	}

	}else{
		//se não veio do fromulario
		$msg="Requisição do fromulario";
		mensagem($msg);
	}


	
