<?php
require_once('../MODAL/dbconfig.php');
//Variável global extraida da página
global $localizarProduto;

// Função que lista produtos
function listarProdutos() {
  include('../MODAL/dbconfig.php');
  if (isset($_POST['Pesquisar'])) {
    $localizarProduto = $_POST['Pesquisar'];
  }

  $conn = new mysqli($servidor, $usuario, $senha, $bancodedados);
  if ($conn->connect_error){
    die("falha na comexão: ".$conn->connect_error);
  } else {
  }

  if (empty($_POST['Pesquisar']) ) {
    $sql = "SELECT * FROM PRODUTOS";
  }else {
    $sql = "SELECT * FROM PRODUTOS  WHERE (nome LIKE '%".$localizarProduto."%')";
  }

  $result = $conn->query($sql);
  $produtos = array();
  while ($row = mysqli_fetch_assoc($result)) {
      $produtos[] = $row;
  }
  $conn->close();
  return $produtos;
}

// Função que adiciona produtos
function adicionarProduto($nome, $preco, $imagem, $quantidade, $codbarras) {
  include('../MODAL/dbconfig.php');
  $conexao = new mysqli($servidor, $usuario, $senha, $bancodedados);
   
    $nome = mysqli_real_escape_string($conexao, $nome);
    $preco = mysqli_real_escape_string($conexao, $preco);
    $imagem = mysqli_real_escape_string($conexao, $imagem);
    $quantidade = mysqli_real_escape_string($conexao, $quantidade);
    $codbarras = mysqli_real_escape_string($conexao, $codbarras);

    $query = "INSERT INTO PRODUTOS (nome, preco, imagem, quantidade, codbarras) VALUES ('$nome', '$preco',CONCAT( '../VIEW/img/','$imagem'), '$quantidade', '$codbarras')";
    $resultado = mysqli_query($conexao, $query);
  
    $conexao->close();
    return $resultado;
  }
  
// Função que busca produtos
function localizarProdutos2() {
  include('../MODAL/dbconfig.php');
  $conn = new mysqli($servidor, $usuario, $senha, $bancodedados);
  if ($conn->connect_error){
    die("falha na comexão: ".$conn->connect_error);
  } else {
  }
  $sql = "SELECT PRO.nome FROM PRODUTOS PRO WHERE (PRO.nome =$localizarProduto)";
  $sqlLocalizar="SELECT * FROM PRODUTOS";
  $result = $conn->query($sql);
  $Lprodutos = array();

  while ($row = mysqli_fetch_assoc($result)) {
      $Lprodutos[] = $row;
  }
  $conn->close();
  return $Lprodutos;
}

// Função que deleta produtos
function deletarProduto($id) {
  include('../MODAL/dbconfig.php');
  $conn = new mysqli($servidor, $usuario, $senha, $bancodedados);
  $id = mysqli_real_escape_string($conn, $id);
  $query = "DELETE FROM PRODUTOS WHERE id = '$id'";
  mysqli_query($conn, $query);
  mysqli_close($conn);
}
// Função que atualiza os produtos 
function atualizarProduto($id, $nome, $preco, $imagem, $quantidade, $codbarras) { 
  include('../MODAL/dbconfig.php');
  $ArrayProdutos=listarProdutos();
  $conexao  = new mysqli($servidor, $usuario, $senha, $bancodedados);
    $id         = mysqli_real_escape_string($conexao, $id); 
    $nome       = mysqli_real_escape_string($conexao, $nome);
    $preco      = mysqli_real_escape_string($conexao, $preco);
    $imagem     = mysqli_real_escape_string($conexao, $imagem);
    $quantidade = mysqli_real_escape_string($conexao, $quantidade);
    $codbarras = mysqli_real_escape_string($conexao, $codbarras);

    $query = "UPDATE PRODUTOS SET nome='$nome', preco='$preco', imagem='$imagem', quantidade='$quantidade', codbarras='$codbarras' WHERE id=$id";
    $resultado = $conexao->query($query);
    $conexao->close();
    return $resultado;
  }

// Função que seleciona produtos pelo codigo de barras
function ultimoCodigo(){
  include('../MODAL/dbconfig.php');
  $conn = new mysqli($servidor, $usuario, $senha, $bancodedados);
  $query = "SELECT MAX(CODIGO) FROM PRODUTOS";
  $resultado = $conexao->query($query);
  return $resultado;
} 

// Função que analisa o status do link com o banco de dados
function obterConexao() {
 include('../MODAL/dbconfig.php');
 $conexao = new mysqli($servidor, $usuario, $senha, $bancodedados);
if ($conexao->connect_error){
  die("falha na comexão: ".$conexao->connect_error);}
else {
}
$conexao->close();
return $conexao;
}

// Função que fecha a porta de conexão ao banco de dados
function fecharConexao($conexao) {
  require_once('../MODAL/dbconfig.php');
  $conexao->close();
}
?>
