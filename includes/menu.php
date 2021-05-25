<?php
ini_set('display_errors', 1);
ini_set('log_errors', 1);
ini_set('error_log', dirname(__FILE__) . '/error_log.txt');
error_reporting(E_ALL);
?>

	<!-- Menu de Navegação principal do site-->
	<!-- Classe selected são os botões do menu de navegação -->
	<nav id="menu">
		<div id="menu-center">
			<ul id="homebotao">
				<?php foreach($MENU_ARRAY as $chave => $valor){
				echo '<li class="selected">';
				echo '<a href="'.$valor.'">'.$chave.'</a>';
				echo '</li>';
				}?>
			</ul>
		</div>
	</nav>

