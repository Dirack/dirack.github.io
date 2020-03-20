<?php
/*
	query.php (PHP) - Consultar artigos cadastrados no banco de dados.

	Objetivo: Fornecer os arquivos cadastrados no banco de dados organizados
	para a página blog.html. Lê a categoria a partir da variável botao=categoria
	passada pela url (método GET).

	Programador: Rodolfo A. C. Neves (Dirack) 29/01/2019
*/

$autor = $_POST['autor'];
$email = $_POST['email'];
$texto = $_POST['texto'];
$var = $_POST['var'];

//////////// Conexão com banco de dados //////////////////
include("conect.php");

// Se a conexão falhar, avise o usuário
if (mysqli_connect_error()):
	echo "Falha na conexão!".mysqli_connect_error();

else:
	/////////////////// Insira no banco de dados //////////////////
	$sql = "INSERT INTO comentarios(autor,email,texto,pagina,data,hora) values('$autor','$email','$texto','$var',CURRENT_DATE(),CURRENT_TIME());";

	mysqli_query($connect,$sql);

	$data=new DateTime();
        $hora=$data->format('H:i:s'); 
	$hoje=$data->format('d/m/Y');

	// Comentário formatado
	echo "<p><strong>$autor</strong><small> ($email)</small></p>";
	echo "<p>$texto</p>";
	echo "<p style='color: #005eff;'><small>Postado em $hoje  às $hora</small></p>";	

endif;
?>

