<?php
session_start();

if($_SERVER["REQUEST_METHOD"] == "POST") {
 
    $usuario = $_POST['username'];
    $senha = $_POST['password'];
 
    // Conexão com o banco de dados
    $servername = "172.17.0.3";
    $username = "root";
    $password = "root";
    $dbname = "uniasselvi";
 
    $conn = new mysqli($servername, $username, $password, $dbname);
 
    // Verifica se a conexão foi bem sucedida
    if ($conn->connect_error) {
        die("Conexão falhou: " . $conn->connect_error);
    }
 
    // Verifica se o usuário existe e se a senha está correta
    $sql = "SELECT * FROM usuarios WHERE usuario = '$usuario' and senha = '$senha'";
    $result = $conn->query($sql);
 
    if ($result->num_rows > 0) {
        // Se o usuário e senha estão corretos, cria uma sessão e redireciona para a página principal
        $_SESSION['username'] = $usuario;
        header("Location: index.php");
    } else {
        // Se o usuário ou senha estiver incorreto, mostra uma mensagem de erro
        $mensagem = "Usuário ou senha incorretos.";
    }
 
    $conn->close();
}
?>
 
<!DOCTYPE html>
<html>
<head>
	<title>Tela de Login</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="login-form">
		<h2>Tela de Login</h2>
		<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
			<div class="form-group">
				<label>Nome de Usuário:</label>
				<input type="text" name="username" required>
			</div>    
			<div class="form-group">
				<label>Senha:</label>
				<input type="password" name="password" required>
			</div>
			<button type="submit">Entrar</button>
		</form>
		<?php if(isset($mensagem)) { ?>
			<div class="error"><?php echo $mensagem; ?></div>
		<?php } ?>
	</div>
</body>
</html>
