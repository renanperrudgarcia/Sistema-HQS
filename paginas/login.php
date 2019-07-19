<?php
	
	$msg = "";
	//verificar se foi dado um $_POST
	if ( $_POST ) {

		$login = $senha = "";

		if ( isset ( $_POST["login"] ) )
			$login = trim ( $_POST["login"] );
		if ( isset ( $_POST["senha"] ) ) 
			$senha = trim ( $_POST["senha"] );

		
		if ( empty ( $login ) ) {
			
			//verificar se o login esta em branco
			$msg = "Preencha o Login";
			mensagem($msg);

		} else if ( empty ($senha ) ) {

			//verificar se a senha está em branco
			mensagem("Preencha a Senha");

		} else {

			//login e a senha foram preenchidos
			//buscar o usuario no banco
			$sql = "select id, nome, login, senha, foto, ativo
				from usuario
				where login = ? 
				limit 1";
			//preparar o sql para execução
			$consulta = $pdo->prepare($sql);
			//passar o parametro
			$consulta->bindParam(1, $login);
			//executar
			$consulta->execute();

			//recuperar os dados da consulta
			$dados = $consulta->fetch(PDO::FETCH_OBJ);

			if ( isset ( $dados->id ) ) {
				//verificar se trouxe algum resultado
				if( !password_verify ($senha, $dados->senha) ){
					//verificar se a senha não é verdadeira
					$msg = "senha invalida";
					mensagem($msg);
				}else{
					//guardar alguns dados na sessao
					$_SESSION["hqs"] = array(
						"id"=>$dados->id,
						"nome"=>$dados->nome,
						"login"=>$dados->login,
						"foto"=>$dados->foto);
				//	print_r( $_SESSION["hqs"]);	
					echo "<script>location.href='paginas/home'</script>";
				}
				

			} else {
				//se nao trouxe resultado
				$msg = "usuario inexistente";
				mensagem($msg);
			}
		}
	}
?>
<div class="login">
	<div class="row">
		<div class="col-6">
			<img src="images/login.png">
			<h1>SCHQs<br>
			Sistema de Controle de HQs</h1>
		</div>
		<div class="col-6">
			<h2>Efetuar Login</h2>
			<form name="formLogin" method="post" data-parsley-validate>
				<input type="text" name="login" class="input" placeholder="Preencha o login" required
				data-parsley-required-message="<i class='fas fa-info-circle'></i> Por favor preencha este campo">

				<input type="password" name="senha" class="input" placeholder="Digite sua senha"
				required
				data-parsley-required-message="<i class='fas fa-info-circle'></i> Por favor preencha este campo">

				<button type="submit">
					<i class="fas fa-check"></i> 
					Efetuar Login
				</button>
			</form>
		</div>
	</div>
</div>