<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="./bootstrap/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<header>
		<h1>Minha Loja de Alimentos</h1>
		<nav class="navbar-nav">
			<ul class="list-group-flush">
				<li class="nav-item"><a class="dropdown-item" href="#">Produtos</a></li>
				<li class="nav-item"><a class="dropdown-item" href="#">Sobre Nós</a></li>
				<li class="nav-item"><a class="dropdown-item" href="#">Contato</a></li>
			</ul>
		</nav>
	</header>

	<main>
  <h2>Produtos em Destaque</h2>
  <div class="row">
    <?php
      // Conecta ao banco de dados
      require_once('dbconfig.php');
      $conexao = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

      // Seleciona todos os produtos
      $sql = "SELECT * FROM produtos";
      $resultado = mysqli_query($conexao, $sql);

      // Loop para exibir as informações de cada produto
      while ($produto = mysqli_fetch_assoc($resultado)) {
        echo '<div class="col-md-4 produto">';
        echo '<img src="img/' . $produto['imagem'] . '" alt="' . $produto['nome'] . '" style="max-width: 200px;">';
        echo '<h3>' . $produto['nome'] . '</h3>';
        echo '<p>R$ ' . $produto['preco'] . '</p>';
        echo '<a href="#" class="botao-comprar">Comprar</a>';
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
