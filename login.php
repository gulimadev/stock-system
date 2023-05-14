<?php
include('dbconfig.php');
session_start();

if($_SERVER["REQUEST_METHOD"] == "POST") {
 
    $usuario = $_POST['username'];
    $senha = $_POST['password'];
 
    // Conexão com o banco de dados
     
 
 

 
    $conn = new mysqli($servidor, $usuario , $senha , $bancodedados);
//    mysql_query("SET NAMES 'utf8'");
//    mysql_query('SET character_set_connection=utf8');
//    mysql_query('SET character_set_client=utf8');
//    mysql_query('SET character_set_results=utf8');
    
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
        header("Location: admin.php");
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
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Tela de Login</title>
    <link rel="stylesheet" type="text/css" href="./bootstrap/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body class="view">
    <div class="container h-100 d-flex flex-column justify-content-center align-items-center">
        <div class="login-form w-25">
            <h2>Tela de Login</h2>
            <form  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <div class="form-group">
                    <label class="col-form-label">Nome de Usuário:</label>
                    <input class="form-control" type="text" name="username" required>
                </div>    
                <div class="form-group">
                    <label class="col-form-label">Senha:</label>
                    <input class="form-control" type="password" name="password" required>
                </div>
                <button class="btn btn-primary btn-block mt-3 w-100" type="submit">Entrar</button>
            </form>
            <?php if(isset($mensagem)) { ?>
                <div class="error"><?php echo $mensagem; ?></div>
            <?php } ?>
        </div>
    </div>
</body>
</html>
