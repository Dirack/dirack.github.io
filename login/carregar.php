<?php
/*
	carregar.php (PHP) - Consultar artigos cadastrados no banco de dados.

	Objetivo: Fornecer os arquivos cadastrados no banco de dados organizados
	para a página blog.html. Lê a categoria a partir da variável botao=categoria
	passada pela url (método GET).

	Programador: Rodolfo A. C. Neves (Dirack) 29/01/2019
*/

$titulo = $_GET['titulo'];


include("conect.php");


// Se a conexão falhar, avise o usuário
if (mysqli_connect_error()):
	echo "Falha na conexão!".mysqli_connect_error();

else:
	/////////////////// Consulte o banco de dados //////////////////
	$sql = "SELECT * FROM salvos where titulo='$titulo';";
	$resultado = mysqli_query($connect,$sql);

	// Avise se login e senha foram encontrados
	if (mysqli_num_rows($resultado) > 0):
		
		
		while($linha = mysqli_fetch_array($resultado)):
			$fonte = $linha['fonte'];
			$thumb = $linha['thumb'];
			$titulo = $linha['titulo'];
			$autor = $linha['autor'];
			$video = $linha['video'];
			$data = $linha['data'];
			$resumo = $linha['resumo'];
			$texto = $linha['texto'];
			
			echo $fonte.'§*'.$thumb.'§*'.$titulo.'§*'.$autor.'§*'.$video.'§*'.$data.'§*'.$resumo.'§*'.$texto;
			
		endwhile;


	else:

		echo "<p>$sql</p>";
	endif;
endif;
?>
