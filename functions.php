<?php
require_once('dbconfig.php');

function adicionarProduto($nome, $preco, $imagem, $quantidade) {
    $conexao = obterConexao();
    $nome = mysqli_real_escape_string($conexao, $nome);
    $preco = mysqli_real_escape_string($conexao, $preco);
    $imagem = mysqli_real_escape_string($conexao, $imagem);
    $quantidade = mysqli_real_escape_string($conexao, $quantidade);
  
    $query = "INSERT INTO produtos (nome, preco, imagem, quantidade) VALUES ('$nome', '$preco', '$imagem', '$quantidade')";
    $resultado = mysqli_query($conexao, $query);
  
    fecharConexao($conexao);
  
    return $resultado;
  }
  
  function fecharConexao($conexao) {
    mysqli_close($conexao);
}

  function obterConexao() {
    require_once 'dbconfig.php';
    $conexao = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    if (mysqli_connect_errno()) {
      echo 'Não foi possível conectar ao banco de dados: ' . mysqli_connect_error();
      exit;
    }
    return $conexao;
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

function atualizarProduto($id, $nome, $preco, $imagem, $quantidade) {
    $conexao = obterConexao();
    $nome = mysqli_real_escape_string($conexao, $nome);
    $preco = mysqli_real_escape_string($conexao, $preco);
    $imagem = mysqli_real_escape_string($conexao, $imagem);
    $quantidade = mysqli_real_escape_string($conexao, $quantidade);
  
    $query = "UPDATE produtos SET nome='$nome', preco='$preco', imagem='$imagem', quantidade='$quantidade' WHERE id=$id";
    $resultado = mysqli_query($conexao, $query);
  
    fecharConexao($conexao);
  
    return $resultado;
  }
  
?>
