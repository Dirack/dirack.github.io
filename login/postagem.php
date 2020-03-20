<?php
/*
	postagem.php (PHP)
	
	Objetivo: Salva uma nova postagem em posts.xml

	Email: rodolfo_profissional@hotmail.com
	
	Programador: Rodolfo A. C. Neves 16/01/2019
*/
			
	header('Content-Type: text/html; charset=utf-8');

	// Acesse as informações do usuário pelo método GET
	$fonte = $_GET["fonte"];
	$thumb = $_GET["thumb"];
	$titulo = $_GET["title"];
	$autor = $_GET["autor"];
	$data = $_GET["data"];
	$resumo = $_GET["resumo"];
	$video = $_GET["video"];
	$texto = $_GET["texto"];

	// Verifica se o usuário ofereceu um link para vídeo
	if ($video==""):
		$video="none";
	endif;
		

	// Separe o conteúdo dos comentários antigos na variável c
	$conteudo = file_get_contents("../posts.xml");
	$b = explode('<entradas>',$conteudo);
	$c = explode('</entradas>',$b[1]);
		
	// xml receberá o comentário novo
	$xml = '<?xml version="1.0" encoding="UTF-8"?>';

	// A tag <entradas> marca o começo e o fim do arquivo XML
	$xml .= '<entradas>';

	// Os valores fornecidos pelo usuário através do formulário
	// para o comentário novo
	$xml .= "<entrada><fonte>artigos/artigos.html?var=$fonte </fonte>";
	$xml .= "<thumb>thumbs/$thumb </thumb>";
	$xml .= "<titulo> $titulo </titulo>";
	$xml .= "<autor> $autor </autor>";
	$xml .= "<data>$data</data>";
	$xml .= "<resumo>$resumo</resumo></entrada>";

	// Adicione os comentários antigos aos novos
	$xml .= $c[0];

	// Fechamento da tag <entradas> marca o fim do arquivo
	$xml .= '</entradas>';

	//Apaga a versão antiga do arquivo e cria uma nova
	unlink("../posts.xml");

	// Escreve nova versão do arquivo xml
	$fp = fopen('../posts.xml', 'a+');
	fwrite($fp, $xml);
	fclose($fp);

	// Escrever arquivo de texto xml com a postagem integral

	// xml2 receberá o arquivo novo
	$xml2 = '<?xml version="1.0" encoding="UTF-8"?>';

	// Os valores fornecidos pelo usuário através do formulário
	// para o comentário novo
	$xml2 .= "<postagem><titulo> $titulo </titulo>";
	$xml2 .= "<autor> $autor </autor>";
	$xml2 .= "<data>$data</data>";
	$xml2 .= "<video>$video</video>";
	$xml2 .= "<p1>$resumo</p1>";
	$xml2 .= "$texto</postagem>";
	$fp = fopen("../artigos/$fonte.xml", 'a+');
	fwrite($fp, $xml2);
	fclose($fp);

	// Voltar à página original sessao.php
	session_start();

	// Passa uma variável para informar que o usuário ainda está logado
	$verifica = 'sim';
	$_SESSION['var1'] = $verifica;
	
	header('Location: sessao.php');

?>
