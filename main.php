
<?php
 if(!isset ($pagina) ){
 	header("Location: index.php");

 }
?>
<header>
	<nav class="navbar navbar-expand-lg fixed-top">
	  <a class="navbar-brand" href="#">
 	
	  	<img src="images/schqs.png" alt="Sistema de Controle de HQs" title="Sistema de Controle de HQs">
	  </a>
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#menu" aria-controls="menu" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon"></span>
	  </button>

	  <div class="collapse navbar-collapse" id="menu">
	    <ul class="navbar-nav ml-auto">
	      <li class="nav-item">
	        <a class="nav-link" href="paginas/home">
	        	<i class="fas fa-tachometer-alt"></i> Dashboard
	        </a>
	      </li>

	      <li class="nav-item dropdown">
	        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	          <i class="fas fa-edit"></i> Cadastros
	        </a>
	        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
	          <a class="dropdown-item" href="cadastros/cidade">Cidade</a>
	          <a class="dropdown-item" href="cadastros/cliente">Clientes</a>
	          <a class="dropdown-item" href="cadastros/editora">Editoras</a>
	          <a class="dropdown-item" href="cadastros/tipo-quadrinho">Tipos de Quadrinhos</a>
	          <a class="dropdown-item" href="cadastros/personagem">Personagens</a>
	          <a class="dropdown-item" href="cadastros/quadrinho">Quadrinhos</a>
	          <a class="dropdown-item" href="cadastros/usuario">Usuário</a>
	        </div>
	      </li>

	      <li class="nav-item dropdown">
	        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	          <i class="fas fa-shopping-cart"></i> Processo
	        </a>
	        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
	          <a class="dropdown-item" href="cadastros/venda">Venda</a>
	        </div>
	      </li>

	      <li class="nav-item dropdown">
	        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	          <i class="fas fa-chart-line"></i> Relatórios
	        </a>
	        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
	          <a class="dropdown-item" href="relatorios/vendas">Vendas</a>
	          <a class="dropdown-item" href="relatorios/quadrinhos">Quadrinhos</a>
	          <a class="dropdown-item" href="relatorio/clientes">Clientes</a>
	        </div>
	      </li>
	    
	      <li class="nav-item menu dropdown">
	        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	          <img src="../fotos/<?=$_SESSION["hqs"]["foto"];?>p.jpg" class="rounded-circle border" title="<?=$_SESSION["hqs"]["nome"];?>">
	          Olá <?=$_SESSION["hqs"]["login"];?>
	        </a>
	        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
	          <a class="dropdown-item" href="paginas/dados">Seus dados</a>
	          <a class="dropdown-item" href="paginas/senha">Mudar senha</a>
	          <a class="dropdown-item" href="sair.php">Sair do Sistema</a>
	        </div>
	      </li>
	    </ul>
	    
	  </div>
	</nav>
</header>
<main>

	<div class="container">
		<?php

			if ( file_exists ( $pagina ) ) include $pagina;
			else include "paginas/erro.php";

		?>
	</div>

	<footer>
		<hr>
		<div class="row">
			<div class="col-6 col-md-6 col-lg-6">
				<p><strong>SCHQs</strong> Sistema de Controle de HQs</p>
			</div>
			<div class="col-6 col-md-6 col-lg-6 text-right">
				<p>Todos os direitos reservados</p>
			</div>
		</div>
	</footer>
</main>