<?php
require_once('../model/dbconfig.php');

global $localizarProduto;
function listarProdutos() {
  include('../model/dbconfig.php');
  if (isset($_POST['Pesquisar'])) {
    $localizarProduto = $_POST['Pesquisar'];
  }
  
  $conn = new mysqli($servidor, $usuario, $senha, $bancodedados);
  if ($conn->connect_error){
    die("falha na comexão: ".$conn->connect_error);
  } else {
      # code...
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
<?php
function adicionarProduto($nome, $preco, $imagem, $quantidade, $codbarras) {
  include('../model/dbconfig.php');
    $conexao = new mysqli($servidor, $usuario, $senha, $bancodedados);
   // $conexao = obterConexao();
    $nome = mysqli_real_escape_string($conexao, $nome);
    $preco = mysqli_real_escape_string($conexao, $preco);
    $imagem = mysqli_real_escape_string($conexao, $imagem);
    $quantidade = mysqli_real_escape_string($conexao, $quantidade);
    $codbarras = mysqli_real_escape_string($conexao, $codbarras);
    $query = "INSERT INTO PRODUTOS (nome, preco, imagem, quantidade, codbarras) VALUES ('$nome', '$preco',CONCAT( 'img/','$imagem'), '$quantidade', '$codbarras')";
    $resultado = mysqli_query($conexao, $query);
    $conexao->close();
    return $resultado;
}
?>  
function fecharConexao($conexao) {
  require_once('../model/dbconfig.php');
  $conexao->close();
}

function obterConexao() {
  include('../model/dbconfig.php');
    $conexao = new mysqli($servidor, $usuario, $senha, $bancodedados);
  if ($conexao->connect_error){
    die("falha na comexão: ".$conexao->connect_error);}
  else {  
  }
  $conexao->close();
  return $conexao;
}
  
function localizarProdutos2() {
  include('../model/dbconfig.php');
  $conn = new mysqli($servidor, $usuario, $senha, $bancodedados);
  if ($conn->connect_error){
    die("falha na comexão: ".$conn->connect_error);
  } else {
      # code...
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

function deletarProduto($id) {
  include('../model/dbconfig.php');
    $conn = new mysqli($servidor, $usuario, $senha, $bancodedados);
    $id = mysqli_real_escape_string($conn, $id);
    $query = "DELETE FROM PRODUTOS WHERE id = '$id'";
    mysqli_query($conn, $query);
    mysqli_close($conn);
}

function atualizarProduto($id, $nome, $preco, $imagem, $quantidade, $codbarras) { 
  include('../model/dbconfig.php');
    $ArrayProdutos=listarProdutos();
    $conexao  = new mysqli($servidor, $usuario, $senha, $bancodedados);
    $id         = mysqli_real_escape_string($conexao, $id); 
    $nome       = mysqli_real_escape_string($conexao, $nome);
    $preco      = mysqli_real_escape_string($conexao, $preco);
    $imagem     = mysqli_real_escape_string($conexao, $imagem);
    $quantidade = mysqli_real_escape_string($conexao, $quantidade);
    $codbarras = mysqli_real_escape_string($conexao, $codbarras);
    $query = "UPDATE PRODUTOS SET nome='$nome', preco='$preco', imagem='$imagem', quantidade='$quantidade', codbrras='$codbarras' WHERE id=$id";
    $resultado = $conexao->query($query);
    $conexao->close();
    return $resultado;
}
  
function ultimoCodigo(){
  include('../model/dbconfig.php');
    $conn = new mysqli($servidor, $usuario, $senha, $bancodedados);
    $query = "SELECT MAX(CODIGO) FROM PRODUTOS";
    $resultado = $conexao->query($query);
  return $resultado;
}

?>
