<?php
require_once('dbconfig.php');

function adicionarProduto($nome, $preco) {
  $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
  $nome = mysqli_real_escape_string($conn, $nome);
  $preco = mysqli_real_escape_string($conn, $preco);
  $query = "INSERT INTO produtos (nome, preco) VALUES ('$nome', '$preco')";
  mysqli_query($conn, $query);
  mysqli_close($conn);
}

function listarProdutos() {
  $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
  $query = "SELECT * FROM produtos";
  $result = mysqli_query($conn, $query);
  $produtos = array();
  while ($row = mysqli_fetch_assoc($result)) {
    $produtos[] = $row;
  }
  mysqli_close($conn);
  return $produtos;
}

function deletarProduto($id) {
  $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
  $id = mysqli_real_escape_string($conn, $id);
  $query = "DELETE FROM produtos WHERE id = '$id'";
  mysqli_query($conn, $query);
  mysqli_close($conn);
}

function atualizarProduto($id, $nome, $preco) {
  $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
  $id = mysqli_real_escape_string($conn, $id);
  $nome = mysqli_real_escape_string($conn, $nome);
  $preco = mysqli_real_escape_string($conn, $preco);
  $query = "UPDATE produtos SET nome = '$nome', preco = '$preco' WHERE id = '$id'";
  mysqli_query($conn, $query);
  mysqli_close($conn);
}
?>
