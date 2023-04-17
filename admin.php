<?php
require_once('functions.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  if ($_POST['acao'] === 'adicionar') {
    adicionarProduto($_POST['nome'], $_POST['preco']);
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
  <button type="submit">Adicionar</button>
</form>

<!-- Tabela com a lista de produtos -->
<table>
  <thead>
    <tr>
      <th>ID</th>
      <th>Nome</th>
      <th>Preço</th>
      <th>Ações</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($produtos as $produto): ?>
    <tr>
      <td><?= $produto['id'] ?></td>
      <td><?= $produto['nome'] ?></td>
      <td><?= $produto['preco'] ?></td>
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
  </tbody>
</table>
