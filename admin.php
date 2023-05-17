<?php
require('functions.php');
require_once('dbconfig.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  if ($_POST['acao'] === 'adicionar') {
    
    if ( empty($_POST['nome'])  || empty($_POST['preco']) ||empty($_POST['quantidade']) || empty($_POST['codbarras'])) {
       
      echo '<script>alert("POR FAVOR PREENCHA TODOS OS CAMPOS!!");</script>';}
      else {
        adicionarProduto($_POST['nome'], $_POST['preco'], $_POST['imagem'], $_POST['quantidade'], $_POST['codbarras']);
      }
  } else if ($_POST['acao'] === 'deletar') {
    deletarProduto($_POST['id']);

  } else if ($_POST['acao'] === 'atualizar') {

    if ( empty($_POST['nome']) || empty($_POST['preco']) ||empty($_POST['nQuantidade']) ) {
       
      echo '<script>alert("POR FAVOR PREENCHA TODOS OS CAMPOS!!");</script>';}
      else { 
    atualizarProduto($_POST['id'], $_POST['nome'], $_POST['preco'], $_POST['imagem'], $_POST['nQuantidade'], $_POST['codbarras']);
    }
  
  }
  
}

$produtos = listarProdutos();

?>
<!-- add bootstrap -->
<!DOCTYPE html>
<html lang="pt-br">  
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administração | Loja de produtos</title>
    <link rel="stylesheet" type="text/css" href="./bootstrap/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="icon" href="./img/icons/icon-adm.png">
  </head> 
<!-- Formulário para adicionar um produto -->
<body class="view">
  <div class="container d-flex flex-column justify-content-center align-items-center mt-5 mb-5 border-bottom border-primary">
  <form method="POST" class="d-flex flex-column w-50 mb-5">
    <h2 class="font-weight-bold text-center">Adição de Produtos</h2>
    <input type="hidden" name="acao" value="adicionar">
    <input type="text" name="nome" placeholder="Nome">
    <input type="number" step="any" name="preco" placeholder="Preço">
    <input type="file" name="imagem" >
    <input type="number" name="quantidade" placeholder="Quantidade">
    <input type="text" name="codbarras" id="codigoDeBarras" placeholder="Codigo de Barras">
    <button type="button" id="gerarCodigoBtn" class="btn btn-primary">Gerar Codigo</button>
    <script type="module">
      function GerarCodigo(){
        let cod = 7891020301;
        let sorteio = 999;
        let random = function sortearNumero() { return Math.floor(Math.random() * sorteio + 100); }
        let codigo = cod + "" + random();
        return codigo;
      }
      const gerarCodigoBtn = document.querySelector('#gerarCodigoBtn');
      const codigoDeBarras = document.querySelector('#codigoDeBarras');

      gerarCodigoBtn.addEventListener('click', function() {
        const codigoGerado = GerarCodigo();
        codigoDeBarras.value = codigoGerado;
      });
    </script>
    <button type="submit" class="btn btn-primary">Adicionar</button>
    <input type="text" id="campo-busca" placeholder="Digite o que deseja buscar...">

  </form>
  </div>

<!-- Tabela com a lista de produtos -->
<div class="container">
<table class="table table-striped mb-5">
  <thead>
     <tr>
      <th>ID</th>
      <th>Descrição</th>
      <th>Cod. Barras</th>
      <th>Preço</th>
      <th>Imagem</th>
      <th>Quantidade</th>
      <th>Ações</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($produtos as $produto): ?>
    <tr>
      <td><?= $produto['id'] ?></td>
      <td><?= $produto['nome'] ?></td>
      <td><?= $produto['codbarras'] ?></td>
      <td><?= $produto['preco'] ?></td>
      <td ><img src="<?= $produto['imagem'] ?>" alt="" style="max-width: 450px; max-height: 150px;"></td>
      <td><?= $produto['quantidade'] ?></td>
      <td>
        <form method="post" class="d-flex flex-column w-100">
          <input type="hidden" name="acao" value="atualizar">
          <input type="hidden" name="id" value="<?= $produto['id'] ?>">
          <input type="text" name="nome" placeholder="Novo nome">
          <input type="number" step="any"  name="preco" placeholder="Novo preço">
          <input type="number" name="nQuantidade" placeholder="Nova quantidade">


          <input type="hidden" name="imagem" value="<?= $produto['imagem'] ?>">
          <input type="hidden" name="nquantidade" value="<?= $produto['quantidade'] ?>">
          <button type="submit" class="btn btn-success">Atualizar</button>
        </form>
        <form method="post" class="d-flex flex-column w-100">
          <input type="hidden" name="acao" value="deletar">
          <input type="hidden" name="id" value="<?= $produto['id'] ?>">
          <button type="submit" class="btn btn-danger">Deletar</button>
        </form>
      </td>
    </tr>
        <?php endforeach ?>
  </tbody>
</table>
</div>
<footer>
		<p>&copy; 2023 Minha Loja de Alimentos</p>
</footer>
</body>
</html>
