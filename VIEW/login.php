<?php
include('../MODAL/dbconfig.php');

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = $_POST['username'];
    $pass = $_POST['password'];
 
    // Conexão com o banco de dados
    $conn = new mysqli($servidor, $usuario, $senha, $bancodedados);
    
    // Verifica se a conexão foi bem sucedida
    if ($conn->connect_error) {
        die("Conexão falhou: " . $conn->connect_error);
    }
 
    // Verifica se o usuário existe e se a senha está correta
    $sql = "SELECT * FROM usuarios WHERE usuario = '$user' and senha = '$pass'";
    $result = $conn->query($sql);
 
    if ($result->num_rows > 0) {
        // Se o usuário e senha estão corretos, cria uma sessão e redireciona para a página principal
        $_SESSION['username'] = $user;
        header("Location: ../CONTROLLER/admin.php");
    } else {
        // Se o usuário ou senha estiver incorreto, mostra uma mensagem de erro
        $mensagem = "Usuário ou senha incorretos.";
    }
    $conn->close();
}
?>
 
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Tela de Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="CSS/style.css">
    <link rel="icon" href="./img/icons/icone-chave.png">
</head>
<body class="view marketing">

    <!-- Area de login -->
    <div class="container h-100 d-flex flex-column justify-content-center align-items-center">
        <div class="login-form w-25">
            <h2 class="text-center fw-bold px-1">Tela de Login</h2>
            <form  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <div class="mb-3">
                    <label class="col-form-label">Nome de Usuário:</label>
                    <input class="form-control" type="text" name="username" required>
                </div>    
                <div class="mb-3">
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

<!-- Importando o JavaScript do Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
