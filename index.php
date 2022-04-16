<?php
/*
    Página Principal do site do Geofisicando
    
    Objetivo: Site para a divulgação científica e blog de
    programação aplicada à geofísica.
    
    Autor: Rodolfo A. C. Neves (Dirack) 15/03/2018
	
    Email (Manutenção): rodolfo_profissional@hotmail.com

*/
ini_set('display_errors', 1);
ini_set('log_errors', 1);
ini_set('error_log', dirname(__FILE__) . '/error_log.txt');
error_reporting(E_ALL);
$ROOT_PATH="./";
$CSS_PATH="lounge.css";
$ICON_PATH="icon.ico";
$MENU_ARRAY=array(
	"HOME"=>"artigos/index.php",
	"TUTORIAIS"=>"artigos/index.php",
	"CURSOS"=>"artigos/index.php",
	"PROGRAMAS"=>"artigos/index.php",
	"JOGOS"=>"artigos/index.php"
);
?>

<!-- Cabeçalho da página -->
<?php include 'includes/header.php'; ?>

<!-- Funções AJAX alimentar a página -->
<script type="text/javascript" src="ajax.js"></script>

<!-- JQUERY -->
<script type="text/javascript" src="login/jquery-3.3.1.min.js"></script>

<!-- menu responsivo -->
<script type="text/javascript" src="mobile.js"></script>

<body onload="ajax();"> 

	<!-- Menu de Navegação principal do site-->
	<!-- Classe selected são os botões do menu de navegação -->
	<?php include 'includes/menu.php'; ?>


<!-- Banner entre o menu de navegação e o corpo da página (Foto do planeta Terra) --> 
<!--<div id="preheader"></div>-->

<div id="body-text">

<!-- Barra lateral à direita -->
<div id="posts">

	<div>
	<h3>Destaques:</h3>
			<ul>
			<li><a href="comercial/shellscript.html">Curso Shell Script Profissional</a></li>
			<li><a href="https://www.youtube.com/watch?v=AlmjeDzNa84">Biblioteca input.h</a></li>
			<li><a href="http://www.geofisica.ufpa.br/" title="curso de graduação em Geofísica (UFPA)">FAGEOF</a></li>
			<li><a href="http://www.cpgf.ufpa.br" title="programa de pós graduação em Geofísica (UFPA)">CPGF</a></li>
			<li><a href="about/contato.html" title="Grupo de Programação Aplicada à Geofísica">GPGEOF</a></li>
		</ul>
	</div>

<br><br>
	<h3>Livros recomendados:</h3>
	<!-- link do livro shell script profissional na Amazon -->
<br><br>
	<iframe style="width:120px;height:240px;" marginwidth="0" marginheight="0" scrolling="no" frameborder="0" src="//ws-na.amazon-adsystem.com/widgets/q?ServiceVersion=20070822&OneJS=1&Operation=GetAdHtml&MarketPlace=BR&source=ac&ref=qf_sp_asin_til&ad_type=product_link&tracking_id=106375-20&marketplace=amazon&amp;region=BR&placement=8575221523&asins=8575221523&linkId=5689da94ac8f28338ea25da639e0e54d&show_border=false&link_opens_in_new_window=false&price_color=333333&title_color=0066c0&bg_color=ffffff">
    	</iframe>

	<!-- link do livro automatize tarefas maçantes com python na Amazon -->
	<iframe style="width:120px;height:240px;" marginwidth="0" marginheight="0" scrolling="no" frameborder="0" src="//ws-na.amazon-adsystem.com/widgets/q?ServiceVersion=20070822&OneJS=1&Operation=GetAdHtml&MarketPlace=BR&source=ac&ref=tf_til&ad_type=product_link&tracking_id=106375-20&marketplace=amazon&amp;region=BR&placement=B075JTQYB7&asins=B075JTQYB7&linkId=a6db1c2ade3040c58442efaab89b08d0&show_border=false&link_opens_in_new_window=false&price_color=333333&title_color=0066c0&bg_color=ffffff">
    	</iframe>

<br><br>
	<!-- link do livro expressões regulares uma abordagem divertida Amazon -->
	<iframe style="width:120px;height:240px;" marginwidth="0" marginheight="0" scrolling="no" frameborder="0" src="//ws-na.amazon-adsystem.com/widgets/q?ServiceVersion=20070822&OneJS=1&Operation=GetAdHtml&MarketPlace=BR&source=ac&ref=qf_sp_asin_til&ad_type=product_link&tracking_id=106375-20&marketplace=amazon&amp;region=BR&placement=8575224743&asins=8575224743&linkId=5ef1bf1f2afc93b2bb63027a5b2e12db&show_border=false&link_opens_in_new_window=false&price_color=333333&title_color=0066c0&bg_color=ffffff">
	</iframe>

	<!-- link do livro linguagem C Amazon -->
	<iframe style="width:120px;height:240px;" marginwidth="0" marginheight="0" scrolling="no" frameborder="0" src="//ws-na.amazon-adsystem.com/widgets/q?ServiceVersion=20070822&OneJS=1&Operation=GetAdHtml&MarketPlace=BR&source=ac&ref=tf_til&ad_type=product_link&tracking_id=106375-20&marketplace=amazon&amp;region=BR&placement=8521615191&asins=8521615191&linkId=4a0df565802ab0adfd9f1acb68d882ae&show_border=false&link_opens_in_new_window=false&price_color=333333&title_color=0066c0&bg_color=ffffff">
	</iframe>

</div>


<!-- Folha de texto à esquerda, onde ficam os posts recentes -->
<div id="canvas" >

	<br><!--<h2>Postagens recentes:</h2>--><br>

	<!-- 
		Aqui serão exibidas as postagens recentes, alimentadas pelo arquivo posts.xml, 
		e obtidas através de solicitação AJAX, em uma função de ajax.js
	-->
	<div id="postagens">

	</div>


</div>

</div>

<!-- Rodapé da Página -->
<?php include 'includes/rodape.php'; ?>

</body>
</html>
