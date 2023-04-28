<?php
require('functions.php');
require_once('dbconfig.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  if ($_POST['acao'] === 'adicionar') {
    adicionarProduto($_POST['nome'], $_POST['preco'], $_POST['imagem'], $_POST['quantidade']);
  } else if ($_POST['acao'] === 'deletar') {
    deletarProduto($_POST['id']);
  } else if ($_POST['acao'] === 'atualizar') {
    atualizarProduto($_POST['id'], $_POST['nome'], $_POST['preco'], $_POST['imagem'], $_POST['quantidade']);
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
    <link rel="stylesheet" type="text/css" href="./bootstrap/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="style.css">
  </head> 
<!-- Formulário para adicionar um produto -->
<<<<<<< HEAD
  <body>
    <form method="post">
      <input type="hidden" name="acao" value="adicionar">
      <input type="text" name="nome" placeholder="Nome">
      <input type="number" name="preco" placeholder="Preço">
      <input type="file" name="imagem">
=======
<form method="POST">
  <input type="hidden" name="acao" value="adicionar">
  <input type="text" name="nome" placeholder="Nome">
  <input type="number" step="any" name="preco" placeholder="Preço">
  <input type="file" name="imagem" >
>>>>>>> Renato

      <input type="number" name="quantidade" placeholder="Quantidade">
      <button type="submit">Adicionar</button>
    </form>

<<<<<<< HEAD
    <!-- Tabela com a lista de produtos -->
    <table>
      <thead>
        <tr>
          <th>ID</th>
          <th>Nome</th>
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
          <td><?= $produto['imagem'] ?></td>
          <td><?= $produto['quantidade'] ?></td>
          <td>
            <form method="post">
              <input type="hidden" name="acao" value="deletar">
              <input type="hidden" name="id" value="<?= $produto['id'] ?>">
              <button type="submit">Deletar</button>
            </form>
            <form method="post">
      <input type="hidden" name="acao" value="atualizar">
      <input type="hidden" name="id" value="<?= $produto['id'] ?>">
      <input type="text" name="nome" placeholder="Novo nome">
      <input type="number" name="preco" placeholder="Novo preço">
      <input type="hidden" name="imagem" value="<?= $produto['imagem'] ?>">
      <input type="hidden" name="quantidade" value="<?= $produto['quantidade'] ?>">
      <button type="submit">Atualizar</button>
    </form>
=======
<!-- Tabela com a lista de produtos -->
<table>
  <thead>
     <tr>
      <th>ID</th>
      <th>Nome</th>
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
        <form method="post">
          <input type="hidden" name="acao" value="deletar">
          <input type="hidden" name="id" value="<?= $produto['id'] ?>">
          <button type="submit">Deletar</button>
        </form>
        <form method="post">
  <input type="hidden" name="acao" value="atualizar">
  <input type="hidden" name="id" value="<?= $produto['id'] ?>">
  <input type="text" name="nome" placeholder="Novo nome">
  <input type="number" step="any"  name="preco" placeholder="Novo preço">
  <input type="hidden" name="imagem" value="<?="img/". $produto['imagem'] ?>">
  <input type="hidden" name="quantidade" value="<?= $produto['quantidade'] ?>">
  <button type="submit">Atualizar</button>
</form>
>>>>>>> Renato

          </td>
        </tr>
        <?php endforeach ?>

      </tbody>
    </table>
  </body>
</html>
