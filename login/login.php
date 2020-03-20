<?php
/*
	login.php (PHP) - Consulta banco de dados, verifica login e senha.

	Objetivo: Criar um sistema de login simples que consulte um banco de
	dados SQL para verificar o login e senha (escrito em PHP).
	
	O login e senha são enviados por um formulário html, utilizando o método
	POST. O script PHP faz a conexão com o banco de dados, e verifica login e
	senha de usuário.

	Programador: Rodolfo A. C. Neves (Dirack) 29/01/2019
*/

//////////// Conexão com banco de dados //////////////////
include("conect.php");

// login e senha obtidos do formulário
$login = $_POST["login"];
$senha = $_POST["senha"];

// Senha criptografada
$senha = md5($senha);

// Conexão com o servidor
$connect = mysqli_connect($servername, $username, $password, $db_name);

// Se a conexão falhar, avise o usuário
if (mysqli_connect_error()):
	echo "Falha na conexão!".mysqli_connect_error();
endif;


/////////////////// Verificar Login e senha. Consulte o banco de dados //////////////////
$sql = "SELECT * FROM Login where login='$login' AND senha='$senha'";
$resultado = mysqli_query($connect,$sql);

// Avise se login e senha foram encontrados
if (mysqli_num_rows($resultado) == 1):

	// Usuário encontrado! Exiba a página de login	
	echo "Usuário $login encontrado!";
	
	// Inicializa a sessão
	session_start();

	// Passa uma variável para verificar se o login foi feito
	$verifica = 'sim';
	$_SESSION['var1'] = $verifica;
	
	header('Location: sessao.php');
else:
	echo "<p>Usuário NÃO encontrado!</p>";
	echo "<a href='login.html'>Voltar</a>";
	
endif;



?>
