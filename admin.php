<?php
require_once('functions.php');
require_once('dbconfig.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  if ($_POST['acao'] === 'adicionar') {
    adicionarProduto($_POST['nome'], $_POST['preco'], $_POST['imagem'], $_POST['quantidade']);
  } else if ($_POST['acao'] === 'deletar') {
    deletarProduto($_POST['id']);
  } else if ($_POST['acao'] === 'atualizar') {
    atualizarProduto($_POST['id'], $_POST['nome'], $_POST['preco']);
  }
}

$produtos = listarProdutos();
?>

<!-- Formulário para adicionar um produto -->
<form method="post">
  <input type="hidden" name="acao" value="adicionar">
  <input type="text" name="nome" placeholder="Nome">
  <input type="number" name="preco" placeholder="Preço">
  <input type="file" name="imagem">
<button type="submit">Adicionar</button>

  <input type="number" name="quantidade" placeholder="Quantidade">
  <button type="submit">Adicionar</button>
</form>

<!-- Tabela com a lista de produtos -->
<table>
  <thead>
    <!-- add bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
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
          <button type="submit">Atualizar</button>
        </form>
      </td>
    </tr>
    <?php endforeach ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  </tbody>
</table>
