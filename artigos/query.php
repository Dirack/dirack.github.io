<?php
/*
	query.php (PHP) - Consultar artigos cadastrados no banco de dados.

	Objetivo: Fornecer os arquivos cadastrados no banco de dados organizados
	para a página blog.html. Lê a categoria a partir da variável botao=categoria
	passada pela url (método GET).

	Programador: Rodolfo A. C. Neves (Dirack) 29/01/2019
*/

$categoria = $_POST['botao'];

//////////// Conexão com banco de dados //////////////////
include("conect.php");

// Se a conexão falhar, avise o usuário
if (mysqli_connect_error()):
	echo "Falha na conexão!".mysqli_connect_error();

else:
	/////////////////// Consulte o banco de dados //////////////////
	$sql = "SELECT * FROM artigos where categoria='$categoria' order by data desc";
	$resultado = mysqli_query($connect,$sql);

	// Avise se login e senha foram encontrados
	if (mysqli_num_rows($resultado) > 0):
		while($linha = mysqli_fetch_array($resultado)):
			$nome = $linha['nome'];
			$titulo = $linha['titulo'];
			$autor = $linha['autor'];
			$data = explode('-',$linha['data']);

			echo "<p><a href='./artigos.html?var=$nome'><b>$titulo</b></a></p>";
			echo "<p><small>Por <i>$autor</i> em $data[2]/$data[1]/$data[0] </small></p>";
		endwhile;

	else:

		echo "<p>Não há artigo publicado com esta categoria ainda!</p>";
		echo "<p>Seja o primeiro, escreva para: rodolfo_profissional@hotmail.com</p>";
	endif;
endif;
?>
