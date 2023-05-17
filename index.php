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
<body class="view">
		<!-- Barra navegação -->

    <nav class="navbar bg-primary">
      <div class="container">
        
        <div class="navbar-header">
		      <a href="#" class="navbar-brand text-white">MINHA LOJA DE ALIMENTOS</a>
        </div>
<!--  -->
        <div>
        <ul class="d-flex flex-row justify-content-between align-items-center nav navbar">
          <li class="nav-item"> <a href="#" class="nav-link text-white">PRODUTOS</a> </li>
          <li class="nav-item"> <a href="#" class="nav-link text-white">QUEM SOMOS</a> </li>
          <li class="nav-item"> <a href="#" class="nav-link text-white">CONTATOS</a> </li>
          <li class="nav-item"><a href="#" class="text-white fw-bold fs-3">
            <ion-icon name="cart-outline" class=""></ion-icon>  <!-- icone do carrinho -->
          </a></li>
        </ul>
        </div>
      
		
      </div>
    </nav>

  <aside class="bg-success h-50 w-100">
    <!-- carrosel de imagens -->
  </aside>

	<main class="container w-100">
  <h2 class="pt-3">PRODUTOS EM DESTAQUE:</h2>
  <div class="row justify-content-center">
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
        echo '<img src="' . $produto['imagem'] . '" alt="' . $produto['nome'] . '" style="max-width: 200px;">';
       
        echo '<div class="status-produto border w-100">';
        echo '<h3 class="fw-bold">' . $produto['nome'] . '</h3>';
        echo '<p class="fw-bold">R$ ' . $produto['preco'] . '</p>';
        echo '<a href="#" class="botao-comprar btn btn-primary btn-block w-100 fw-bold">Comprar</a>';
        echo '</div>';
        echo '</div>';
      }

      // Fecha a conexão com o banco de dados
      mysqli_close($conexao);
    ?>
  </div>
</main>


	<footer class="bg-primary d-flex flex-row justify-content-evenly">
    <div>
      <span class="text-white fw-bold">&copy; 2023 Minha Loja de Alimentos</span><br>
      <span class="text-white fw-bold">CNPJ:12.345.678/0001-90</span>
    </div>
    <div>
      <span class="text-white fw-bold">Termos de uso</span><br>
      <span class="text-white fw-bold">Política de privacidade</span>
    </div>
	</footer>
  <script src="./bootstrap/bootstrap.js"></script>
  <script src="funcoes.js"></script>
      <!-- icones externos do ionicons -->
  <script  type = "module"  src = "https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js" > </script> 
  <script  nomodule  src = "https://unpkg .com/ionicons@7.1.0/dist/ionicons/ionicons.js" > </script>
</body>
</html>
