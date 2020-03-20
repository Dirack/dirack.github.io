<?php
/*
	artigos.php (PHP) - Consultar comentários cadastrados no banco de dados.

	Objetivo: Fornecer os arquivos cadastrados no banco de dados organizados
	para a página blog.html. Lê a categoria a partir da variável botao=categoria
	passada pela url (método GET).

	Programador: Rodolfo A. C. Neves (Dirack) 29/01/2019
*/
//header('Content-Type: text/html; charset=UTF-8');
//ini_set('default_charset', 'utf-8');


$pagina = $_GET['var'];

//////////// Conexão com banco de dados //////////////////
include("conect.php");

// Se a conexão falhar, avise o usuário
if (mysqli_connect_error()):
	echo "Falha na conexão!".mysqli_connect_error();

else:
	////////////// Consulte o banco de dados de comentários //////////////////
	$sql = "SELECT * FROM comentarios where pagina='$pagina' order by data desc, hora desc";
	$resultado = mysqli_query($connect,$sql);

	// Avise se login e senha foram encontrados
	if (mysqli_num_rows($resultado) > 0):
		while($linha = mysqli_fetch_array($resultado)):
			$autor = $linha['autor'];
			$email = $linha['email'];
			$data = explode('-',$linha['data']);
			$hora = $linha['hora'];
			$texto = $linha['texto'];

			// Comentário formatado
			echo "<p><strong>$autor</strong><small> ($email)</small></p>";
			echo "<p>$texto</p>";
			echo "<p style='color: #005eff;'><small>Postado em $data[2]/$data[1]/$data[0] às $hora</small></p>";
		endwhile;

	else:
		echo "<p>Nenhum comentário. Seja o primeiro a comentar!</p>";
	endif;
endif;
?>
