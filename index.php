<!DOCTYPE html>
<html>
<head>
	<title>Minha Loja de Alimentos</title>
	<link rel="stylesheet" type="text/css" href="style.css">
    <!-- add bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>
<body>
	<header>
		<h1>Minha Loja de Alimentos</h1>
		<nav>
			<ul>
				<li><a href="#">Produtos</a></li>
				<li><a href="#">Sobre Nós</a></li>
				<li><a href="#">Contato</a></li>
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
        echo '<div class="col-md-2 produto">';
        echo '<img src="' . $produto['imagem'] . '" alt="' . $produto['nome'] . '" style="max-width: 200px;">';
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
    <!-- add bootstrap -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>
</html>
