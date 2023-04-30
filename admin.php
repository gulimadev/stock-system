<?php
require('functions.php');
require_once('dbconfig.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  if ($_POST['acao'] === 'adicionar') {
    adicionarProduto($_POST['nome'], $_POST['preco'], $_POST['imagem'], $_POST['quantidade']);
  } else if ($_POST['acao'] === 'deletar') {
    deletarProduto($_POST['id']);
  } else if ($_POST['acao'] === 'atualizar') {
    atualizarProduto($_POST['id'], $_POST['nome'], $_POST['preco'], $_POST['imagem'], $_POST['nQuantidade']);
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
    <title>Administração</title>
    <link rel="stylesheet" type="text/css" href="./bootstrap/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="style.css">
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
    <button type="submit" class="btn btn-primary">Adicionar</button>
  </form>
  </div>
<!-- Tabela com a lista de produtos -->
<div class="container">
<table class="table table-striped mb-5">
  <thead>
     <tr>
      <th>ID</th>
      <th>Descrição</th>
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
