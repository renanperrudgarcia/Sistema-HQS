<?php
	
	//verificar se arquivo existe
	if(file_exists("verificalogin.php") )
		include "verificalogin.php";
	
	else
		include"../verificalogin.php";
	//iniciar as variaveis
	$quadrinho_id = $personagem_id = "";
	//recuperar as variaveis
	
	if(isset($p[2] ) )
		$quadrinho_id = trim($p[2]);
	if (isset($p[3] ) ) 
		$personagem_id= trim($p[3]);
	//verificar se algum este em branco
	if ((empty($quadrinho_id ) ) or (empty($personagem_id) ) ) {
		mensagem("erro ao excluir");

	}else{
		$sql="delete from quadrinho_personagem
			  where quadrinho_id = :quadrinho
			  and personagem_id  = :personagem
			  limit 1";
			  $consulta = $pdo->prepare($sql);
			  $consulta->bindValue(":quadrinho",$quadrinho_id);
			  $consulta->bindValue(":personagem",$personagem_id);

			  if ($consulta->execute() ) {
			  	$link = "paginas/salvarpersonagem.php?id=$quadrinho_id";
			  	sucesso("Registro excluido",$link);

			  }else{
			  	mensagem("Erro ao excluir");
			  }
	}