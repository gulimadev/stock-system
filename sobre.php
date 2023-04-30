<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Minha Loja de ALimentos</title>
    <link rel="stylesheet" type="text/css" href="./bootstrap/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="style.css">
    <script src=".js/script.js"> </script>
</head>
<body>
	<header>
		<h1>Minha Loja de Alimentos</h1>
		<nav class="navbar-nav">
			<ul class="list-group-flush">
				<li class="nav-item"><a class="dropdown-item" href="index.php">Produtos</a></li>
				<li class="nav-item"><a class="dropdown-item" href="sobre.php">Sobre Nós</a></li>
				<li class="nav-item"><a class="dropdown-item" href="sobre.php">Contato</a></li>
			</ul>
		</nav>
	</header>
<div class="conteudo contato">
<p>
No <b>Supermercado Alimentos Fictícios</b>, estamos comprometidos em oferecer aos nossos clientes uma ampla variedade de produtos frescos e de alta qualidade. Fundado em 2000, temos mais de 20 anos de experiência no fornecimento de alimentos saudáveis e saborosos para a comunidade. Localizado na Rua das Delícias, 123, atendemos mais de 10.000 clientes satisfeitos por mês. Nossas instalações de 5.000 m² abrigam mais de 1.500 produtos, incluindo frutas e vegetais frescos, carnes, laticínios e itens de mercearia. Estamos sempre atualizando nossos produtos e buscando as últimas tendências em alimentos para garantir que nossos clientes encontrem tudo o que precisam para suas famílias. Entre em contato conosco pelo telefone <b>(11) 1234-5678</b> ou envie um e-mail para <b>contato@supermercadoalimentosficticios.com.br </b>para obter mais informações sobre nossos produtos e serviços.

</p>

</div>
<div class="title descricao">
<p> Entre em contato conosco</p>
<form class="formulario envio msg">
<label class="email cliente" for="email-cliente">Digite seu Email: </label>
<input type="text" id="email-cliente" name="email-cliente" require="" placeholder="fulano@email.com">
<label class="assunto" for="assunto">Assunto: </label>
<input type="text" id="assunto" name="assunto" require="" placeholder="Queria o arroz da marca X na loja">
<label class="descricao_contato" for="descricao_contato">Descrição</label>
<input class="descricao_corpo" type="text" id="descricao_contato" name="descricao_contato" require="">
<input class="button_enviar" type="submit" value="Enviar">

</form>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="./bootstrap/bootstrap.js"></script>
</body>

</html>