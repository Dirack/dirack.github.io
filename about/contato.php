<?php
/*
	Página 'Quem somos nós' do site Dirack's Lounge
    
	Objetivo: Fornecer informações sobre o Grupo de Programação
	Aplicada à Geofísica (GPGEOF) sobre o site Dirack's Lounge
	e sobre o Canal no Youtube, o Geofisicando.
    
	Autor: Rodolfo A. C. Neves  15/03/2018
	
	Email: rodolfo_profissional@hotmail.com
*/
ini_set('display_errors', 1);
ini_set('log_errors', 1);
ini_set('error_log', dirname(__FILE__) . '/error_log.txt');
error_reporting(E_ALL);
$ROOT_PATH="../";
$CSS_PATH="../lounge.css";
$ICON_PATH="../icon.ico";
$MENU_ARRAY=array(
	"HOME"=>"../index.php",
);
?>

<!-- Cabeçalho da página -->
<?php include '../includes/header.php'; ?>

<body>

	<!-- Menu de Navegação principal do site-->
	<!-- Classe selected são os botões do menu de navegação -->
	<?php include '../includes/menu.php'; ?>

<!-- Banner entre o menu de navegação e o corpo da página (Foto do planeta Terra) --> 
<div id="preheader"></div>

<div id="body-text">
<!-- Barra lateral à direita -->
<div id="posts">

	<div id="logo" style="text-align:center; margin: 100px 20px 20px 20px;">
		<img src="../images/logo.png">
	</div>

	<div style="text-align:center;">
	<h3>Bem Vindo ao site do Geofisicando (Dirack's Lounge)</h3>

	<p style="text-align: justify; margin-left:20px; margin-bottom:300px;">
	Nossa missão é compartilhar conhecimento sobre programação aplicada à Geofísica. 
	Fornecemos vários minicursos e tutoriais de programação em FORTRAN, Python, c/c++, Java, Shell Script e sobre o pacote de para  processamento sísmico, 
	Madagascar.
	</p>

	</div>

	<div id="logo" style="text-align:center;">
		<img src="../images/logo2.png" style="width: 250px;";>
	</div>
</div>

<!-- Folha de texto à esquerda com albúm de fotos -->
<div id="canvas">


	<br><br><br><br>
	<h3>Grupo de Programação Apliacada à Geofísica (GPGEOF)</h3>
	<p>
	O nosso Grupo de programação aplicada foi criado em 01/10/2018 por Rodolfo André Cardoso Neves (Dirack),
com o intuito de auxiliar os alunos de Geofísica no estudo da programação. Inspirado nos desenvolvedores dos pacotes
 de processamento sísmico de uso livre e gratuito, MADAGASCAR e SEISMIC UNIX, e nos trabalhos de Sergey Fomel e John
 Claerbout, tem por princípio o compartilhamento de conhecimento e desenvolvimento 'open source'.
	</p><br>

	<h3>O nosso site (Dirack's Lounge)</h3>

	<p> É um site de divulgação científica com o intuito de compartilhar informações
	sobre programação aplicada à geofísica.
	Faz parte de um projeto liderado pelo Grupo de Programação Apliacada à Geofísica (GPGEOF) 
	e coordenado pelo Programa de Pós graduação em Geofísica (CPGF) da Universidade Federal 
	do Pará (UFPA), sob a supervisão dos professores Doutores Cícero Régis e Daniel Leal.</p>

	<!-- Vídeo de apresentação do canal Geofisicando e do site --> 
	<br>
	<div id="video" style="margin-right: 125px;">
		<p>
			<iframe width="560" height="315" src="https://www.youtube.com/embed/Ht5yV3zGfuw" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
		</p>
	</div>

	<br>
	<h3>O geofisicando</h3>

	<p>
	É o nosso canal de divulgação científica no Youtube. Lá postamos video-aulas de tópicos
	variados sobre programação, exercícios resolvidos, disponibilizamos informações
	sobre o curso de graduação e pós graduação em geofísica na UFPA e sobre a profissão
	de Geofísico. 
	O Geofisicando possui um repositório de códigos no Github, de modo que todos possam
	contribuir para os nossos projetos 'open source'.
	</p>

	<br>
	<div id="video" style="margin-right: 125px;">
		<iframe width="560" height="315" src="https://www.youtube.com/embed/mWW7s-Gv08M" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen>
		</iframe>
	</div>

	<br><br><br>



</div>
</div>

<!-- Rodapé da Página -->
<?php include '../includes/rodape.php'; ?>

</body>
</html>
