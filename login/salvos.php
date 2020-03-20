<?php
/*
	salvos.php (PHP) - Carregar a barra lateral à direita da página.

	Objetivo: Fornecer os textos cadastrados no banco de dados à barra lateral
	à direita na página.

	Versão 1.0

	Programador: Rodolfo A. C. Neves (Dirack) 29/01/2019

	Email: rodolfo_profissional@hotmail.com

	Licença: Software de uso livre e código aberto.
*/

//////////// Conexão com banco de dados //////////////////
include("conect.php");

/* Se a conexão falhar, avise o usuário */
if (mysqli_connect_error()):
	echo "Falha na conexão!".mysqli_connect_error();

else:
	/////////////////// Consulte o banco de dados //////////////////
	$sql = "SELECT titulo FROM salvos";
	$resultado = mysqli_query($connect,$sql);

	/* Carregar na página os títulos de todos os textos salvos */
	if (mysqli_num_rows($resultado) > 0):
		
		echo "<ul style='list-style-type: none;'>";
		while($linha = mysqli_fetch_array($resultado)):
			$titulo = $linha['titulo'];
			
			/* A classe textoSalvo identifica os títulos na página */
			echo "<li class='textoSalvo'><u>$titulo</u></li>";
			
		endwhile;
		echo "</ul>";

	/* Nenhum texto salvo? Informe o usuário */
	else:

		echo "<p>Nenhum texto salvo.</p>";
	endif;
endif;
?>
