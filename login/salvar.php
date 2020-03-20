<?php
/*
	salvar.php (PHP) - Salvar texto no banco de dados.

	Objetivo: Salvar textos no banco de dados identificados pelo título.
	Se for solicitado salvar um texto com um título que já existe, por padrão
	este script sobreescreve.

	Este script foi desenhado para permitir que o usuário vá escrevendo os textos
	para o blog em partes, conforme o seu tempo disponível. Assim, o usuário salva 
	o trabalho desenvolvido até o momento em um banco de dados e depois continua a
	escrever quando lhe convier.

	Versão 1.0

	Email: rodolfo_profissional@hotmail.com

	Programador: Rodolfo A. C. Neves (Dirack) 29/01/2019

	Licença: Software de uso livre e código aberto.
*/

/* Receba as informações pelo método POST */
$fonte = $_POST['fonte'];
$thumb = $_POST['thumb'];
$titulo = $_POST['titulo'];
$autor = $_POST['autor'];
$video = $_POST['video'];
$data = $_POST['data'];
$resumo = $_POST['resumo'];
$texto = $_POST['texto'];

/* Se nenhuma data foi fornecida salve 
com a data atual no formato aceito pelo SQL */ 
if($data==""):
	$dataPost=new DateTime();
	$data=$dataPost->format('Y-m-d');
endif;

/* Todo texto salvo é identificado pelo título.
Portanto, o título é obrigatório */
if ($titulo==""):
	echo "Erro: O título é obrigatório!";
else:


	/* Conexão com o banco de dados */
	include("conect.php");


	/* Se a conexão falhar, avise o usuário */
	if (mysqli_connect_error()):
		echo "Falha na conexão!".mysqli_connect_error();

	else:

		/* Se o texto já está salvo no banco de dados, apague a versão
		   anterior e salve a versão atual */
		$sql = "SELECT titulo FROM salvos WHERE titulo='$titulo';";
		$resultado = mysqli_query($connect,$sql);

		// Apagar versão antiga do texto
		if(mysqli_num_rows($resultado) > 0):

			$sql = "DELETE FROM salvos WHERE titulo='$titulo'";
			$resultado = mysqli_query($connect,$sql);			
		
		endif;

		/////////////////// Salve a nova versão no banco de dados //////////////////
		$sql = "INSERT INTO salvos(fonte,thumb,autor,video,data,resumo,titulo,texto) VALUES('$fonte','$thumb','$autor','$video','$data','$resumo','$titulo','$texto');";
		$resultado = mysqli_query($connect,$sql);

		/* Nenhum erro? informe o usuário! */
		if(mysqli_error($connect)==""):
			
			echo "Texto salvo com sucesso!";

		/* Erro? informe o usuário! */
		else:
			echo "Erro: ".mysqli_error($connect);
		
		endif;
	endif;
endif;
?>
