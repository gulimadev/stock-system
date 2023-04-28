<?php
require_once('dbconfig.php');

function adicionarProduto($nome, $preco, $imagem, $quantidade) {
  include('dbconfig.php');
  $conexao = new mysqli($servidor, $usuario, $senha, $bancodedados);
   // $conexao = obterConexao();
    $nome = mysqli_real_escape_string($conexao, $nome);
    $preco = mysqli_real_escape_string($conexao, $preco);
    $imagem = mysqli_real_escape_string($conexao, $imagem);
    $quantidade = mysqli_real_escape_string($conexao, $quantidade);
  
    $query = "INSERT INTO PRODUTOS (nome, preco, imagem, quantidade) VALUES ('$nome', '$preco',CONCAT( 'img/','$imagem'), '$quantidade')";
    $resultado = mysqli_query($conexao, $query);
  
    $conexao->close();
  
    return $resultado;
  }
  
  function fecharConexao($conexao) {
    require_once('dbconfig.php');
    $conexao->close();
}

  function obterConexao() {
     include('dbconfig.php');
     $conexao = new mysqli($servidor, $usuario, $senha, $bancodedados);
    if ($conexao->connect_error){
      die("falha na comexão: ".$conexao->connect_error);}
    else {
    
    }
    $conexao->close();
    return $conexao;
  }
  
function listarProdutos() {
  include('dbconfig.php');
  $conn = new mysqli($servidor, $usuario, $senha, $bancodedados);
  if ($conn->connect_error){
    die("falha na comexão: ".$conn->connect_error);}else {
      # code...
    }
  $sql = "SELECT * FROM PRODUTOS";
  $result = $conn->query($sql);
  $produtos = array();
  while ($row = mysqli_fetch_assoc($result)) {
   
      $produtos[] = $row;
    
   
  }
  $conn->close();
  return $produtos;
}

function deletarProduto($id) {
  include('dbconfig.php');
  $conn = new mysqli($servidor, $usuario, $senha, $bancodedados);
  $id = mysqli_real_escape_string($conn, $id);
  $query = "DELETE  FROM PRODUTOS WHERE id = '$id'";
  mysqli_query($conn, $query);
  mysqli_close($conn);
}

function atualizarProduto($id, $nome, $preco, $imagem, $quantidade) { 
  include('dbconfig.php');
  $ArrayProdutos=listarProdutos();
  $conexao  = new mysqli($servidor, $usuario, $senha, $bancodedados);
    $id         = mysqli_real_escape_string($conexao, $id); 
    $nome       = mysqli_real_escape_string($conexao, $nome);
    $preco      = mysqli_real_escape_string($conexao, $preco);
    $imagem     = mysqli_real_escape_string($conexao, $imagem);
    $quantidade = mysqli_real_escape_string($conexao, $quantidade);
  
    $query = "UPDATE PRODUTOS SET nome='$nome', preco='$preco', imagem='$imagem', quantidade='$quantidade' WHERE id=$id";
    $resultado = $conexao->query($query);
  
    $conexao->close();
  
    return $resultado;
  }
  
?>
