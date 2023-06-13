<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nossa loja</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="./VIEW/CSS/style.css">
    <link rel="icon" href="./img/icons/icone-loja.png">
</head>
<header >








 

  <!-- Barra navegação-->
  <nav class="navbar bg-primary">
      <div class="container">
        
        <div class="navbar-header">
		      <a href="#" class="navbar-brand text-white">MINHA LOJA DE ALIMENTOS</a>
        </div>

        <div>
        <ul class="flex-row justify-content-between align-items-center  nav navbar">
          <li class="nav-item "> <a href="#" class="btn btn-outline-light">PRODUTOS</a> </li>
          <li class="nav-item"> <a href="#" class="btn btn-outline-light">QUEM SOMOS</a> </li>
          <li class="nav-item"> <a href="#" class="btn btn-outline-light">CONTATOS</a> </li>
          <li class="nav-item"><a href="./VIEW/login.php" target="_blank" class="btn btn-outline-light">ENTRAR</a></li>
          <li class="nav-item"><a href="#" class="text-white fw-bold fs-4">
          
            <ion-icon name="cart-outline" class="cart-blue"></ion-icon>  
          </a></li>
        </ul>
        </div>
      
		
      </div>
    </nav>
    
</header>
<body class="view">


<!-- ... Código do carrossel ... -->



<div id="myCarousel" class="carousel slide" data-ride="carousel">

  
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
    <li data-target="#myCarousel" data-slide-to="3"></li>
    <li data-target="#myCarousel" data-slide-to="4"></li>
  </ol>

  
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100 carousel-img" src="./VIEW/img/feijão.JPG" alt="Slide 1">
      <div class="carousel-caption">
        <h3>FEIJÃO URBANO PRETINHO SÓ R$8,99</h3>
        <p>FAÇA à SUA MELHOR FEIJOADA COM O FEIJÃO AFRO DESCENDENTE PRETINHO</p>
      </div>
    </div>
    <div class="carousel-item ">
      <img class="d-block w-100 carousel-img" src="./VIEW/img/arroz.JPG" alt="Slide 2">
      <div class="carousel-caption">
        <h3>ARROZ TIO JÕAO R$ 6,99</h3>
        <p>ARROZ TIO JOÃO MELHOR PREÇO DA PRAÇA</p>
      </div>
    </div>
    <div class="carousel-item ">
      <img class="d-block w-100 carousel-img" src="./VIEW/img/sardinha.png" alt="Slide 3">
      <div class="carousel-caption">
        <h3>SARDINHA COQUEIRO R$ 5,59</h3>
        <p>CAVIAR DE POBRE É AQUI CUIDA!!</p>
      </div>
    </div>
    <div class="carousel-item ">
      <img class="d-block w-100 carousel-img" src="./VIEW/img/professor.JPG" alt="Slide 3">
      <div class="carousel-caption">
        <h3>PROFESSOR ZÉ PAULO </h3>
        <p>PROFESSOR ZÉ PAULO LIZO FINAL DO MÊS</p>
      </div>
    </div>
    <div class="carousel-item ">
      <img class="d-block w-100 carousel-img" src="./VIEW/img/professor2.JPG" alt="Slide 3">
      <div class="carousel-caption">
        <h3>PROFESSOR ZÉ PAULO</h3>
        <p>PROFESSOR ZÉ PAULO RECEBENDO BONUS POR APROVAÇÃO DOS ALUNOS</p>
      </div>
    </div>
    <div class="carousel-item ">
      <img class="d-block w-100 carousel-img" src="./VIEW/img/professor3.JPG" alt="Slide 3">
      <div class="carousel-caption">
        <h3>PROFESSOR ZÉ PAULO</h3>
        <p>PROFESSOR ZÉ PAULO SABENDO QUE TODO MUNDO FEZ O PAPPER</p>
      </div>
    </div>
  </div>

  <!-- Botões de navegação -->
  <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">
      <ion-icon name="arrow-back-circle-outline" class="fs-1 fw-bold text-primary"></ion-icon>
    </span>
  </a>
  <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">
      <ion-icon name="arrow-forward-circle-outline" class="fs-1 fw-bold text-primary"></ion-icon>
    </span>
  </a>
</div>
  
  </div>
  
</div>
</form>
        
  </div>
  <br>
  <br>
  
  <form method="POST" action="index.php">
<div class="container ">
  <div class="input-group d-flex align-items-center justify-content-center mb-3">
    
    <div class="search-container d-flex align-items-center justify-content-center">
    <input type="hidden" name="acao" value="localizar">  
        <input  type="text" class="form-control form-control-lg col-1 " name="Pesquisar" id="campo-busca" placeholder="Digite o que deseja buscar...">
        <div class="input-group-append"> 
          <button type="submit" class="btn btn-primary rounded" name="Buscar" id="buscar">Buscar</button>
        </div>
        
  </div>
</div>
</form>
<br>
<main class="container w-100">
  <h2 class="pt-3">PRODUTOS EM DESTAQUE:</h2>
  
  <div class="row justify-content-center">
    <?php
    //consulta se a variávels está vazia, se não ele cria ela
    if (isset($_POST['Pesquisar'])) {
      $localizarProduto = $_POST['Pesquisar'];
    }
      // Conecta ao banco de dados
      require_once('./MODAL/dbconfig.php');
      $conexao = new mysqli($servidor, $usuario, $senha, $bancodedados);

      // Seleciona todos os produtos
      if (empty($_POST['Pesquisar']) ) {
        $sql = "SELECT * FROM PRODUTOS";
      }else {
        $sql = "SELECT * FROM PRODUTOS  WHERE (nome LIKE '%".$localizarProduto."%')";
      }
      
      $resultado = mysqli_query($conexao, $sql);

      // Loop para exibir as informações de cada produto
      while ($produto = mysqli_fetch_assoc($resultado)) {
        echo '<div class="col-md-4 produto">';
        echo '<img src="' .'./VIEW/'. $produto['imagem'] . '" alt="' . $produto['nome'] . '" style="max-width: 180px;">';
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

  <!-- Importando o JavaScript do jQuery -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>

<!-- Importando o JavaScript do Popper.js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>

<!-- Importando o JavaScript do Bootstrap -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

      <!-- icones externos do ionicons -->
  <script  type = "module"  src = "https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js" > </script> 
  <script  nomodule  src = "https://unpkg .com/ionicons@7.1.0/dist/ionicons/ionicons.js" > </script>
</body>
</html>
