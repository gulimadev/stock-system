<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loja de produtos | Artigos</title>
    <link rel="stylesheet" type="text/css" href="./bootstrap/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="icon" href="./img/icons/icone-loja.png">
</head>
<body>
	<header>
		<h1>Minha Loja de Alimentos</h1>
		<nav class="navbar-nav">
			<ul class="list-group-flush">
				<li class="nav-item"><a href="#" class="btn btn-outline-light ml-4">Produtos</a></li>
				<li class="nav-item"><a href="#" class="btn btn-outline-light ml-4">Sobre Nós</a></li>
				<li class="nav-item"><a href="#" class="btn btn-outline-light ml-4">Contato</a></li>
        <li class="nav-item"><a href="login.php" target="_blank" class="btn btn-outline-light ml-4">Entrar</a></li>
			</ul>
		</nav>
	</header>

	<main>
  <h2>Produtos em Destaque</h2>
  <div class="row">
    <?php
      // Conecta ao banco de dados
      require_once('dbconfig.php');
      $conexao = new mysqli($servidor, $usuario, $senha, $bancodedados);

      // Seleciona todos os produtos
      $sql = "SELECT * FROM PRODUTOS";
      $resultado = mysqli_query($conexao, $sql);

      // Loop para exibir as informações de cada produto
      while ($produto = mysqli_fetch_assoc($resultado)) {
        echo '<div class="col-md-4 produto">';
        echo '<img src="' . $produto['imagem'] . '" alt="' . $produto['nome'] . '" style="max-width: 180px;">';
        echo '<h3>' . $produto['nome'] . '</h3>';
        echo '<p>R$ ' . $produto['preco'] . '</p>';
        echo '<a href="#" class="botao-comprar">Adicionar ao carrinho</a>';
        echo '</div>';
      }

      // Fecha a conexão com o banco de dados
      mysqli_close($conexao);
    ?>
  </div>
</main>


	<footer>
		<p>&copy; 2023 Minha Loja de Alimentos</p>
	</footer>
</body>
</html>
