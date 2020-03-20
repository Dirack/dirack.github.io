<?php
/*
	sessao.php (PHP) - Página de sessão (logado).

	Objetivo: Essa é a página inicial quando o usuário está logado (escrito em PHP).
	Apresenta um editor de texto para que o usuário possa postar novos textos no Blog.

	Versão 1.0

	Programador: Rodolfo A. C. Neves (Dirack) 29/01/2019

	Email: rodolfo_profissional@hotmail.com

	Licença: Software de uso livre e gratuito.

*/

/* Verificação de login */
session_start();

/* Recebe a variável que verifica se o login foi realizado */
$verifica = $_SESSION['var1'];

/* Se o usuário não está logado, e tentou entrar mesmo assim avise-o */
if ($verifica != "sim"):
	/* Encerra a sessão */
	session_unset();
	session_destroy();
	header('Location: naologado.php');
endif;

?>

<!doctype html>
<!--
	Página inicial do usuário (logado no site)

	Objetivo: Formulário para postar no site. Deve ser uma página que só
	será ativada quando o usuário estiver logado.

	Programador: Rodolfo A. C. Neves (Dirack) 29/01/2019

-->
<header>
	<meta charset="utf-8">
	<title>Dirack's Lounge</title>

	<!--{ Ícone do site }-->
	<link rel="icon" 
	      type="image/png" 
	      href="../icon.ico" />

	<!-- Folha de estilo CSS -->
	<link rel="stylesheet" type="text/css"  href="sessao.css" />

	<!-- JQuery -->
	<script type="text/javascript" src="jquery-3.3.1.min.js"></script>

	<!--Script validação dos formulários-->
	<script type="text/javascript" src="sessao.js"></script>

	<!-- Funções do menu de logout, seta branca do lado da foto de perfil -->
	<script type="text/javascript" src="editor.js"></script>
</header>
<body>

	<!-- Barra de login -->
	<div id="barra">

		<!-- Frase de boas vindas da barra no topo da página -->
		<span id="fraseBoasVindas">Seja bem vindo ao Editor de texto do Dirack's Lounge!</span>

		<!-- Menu de logout: Gerido pelas funções em editor.js -->
		<div id="menuLogout">
			<ul>
				<li>login: dirack</li>
				<li><a href='naologado.php'>Logout</a></li>
			</ul>
		</div>

		
		<span id="imagemPerfil"><img src="../images/perfil.jpg" width="40px" height="40px"><span id="logout"> ▼</span></span>
		
	</div>

	<!-- Aqui irão aparecer os textos salvos no banco de dados
	     que poderão ser carregados com um clique -->
	<div id="barraLateral">

		<h3>Textos salvos:</h3>
	</div>

	<!-- Duas Caixas para ressaltar a área de formulários -->
	<div id="caixa_externa">

		<div id="menuBotao">
			<button id="botaoNovoTexto">Novo</button> <!-- Inserir novo texto no formulário -->
			<button id="botaoSalvarTexto">Salvar</button> <!-- Salvar texto no banco de dados -->
			<button onclick="ver();">Prévia</button> <!-- Ver XML formatado -->
			<button onclick="print();">Printar</button> <!-- Imprimir XML formatado -->
		</div>

		<!-- Ao clicar em 'Novo' um formulário aparecerá aqui para que o usuário
		carregue um texto já existente ou digite um novo texto -->
		<div id="caixa_interna">

				
		</div>
	
	</div>

</body>
</html>
